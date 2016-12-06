<?php

namespace App\Base\Model;

abstract class Model {

    /**
     * @var type \PDO
     */
    private $db;
    private $lastInsertId;

    public function __construct() {
        $config = $GLOBALS['APP_CONFIG']['connect'];

        $options = isset($config['options']) ? $config['options'] : [];
        $this->db = new \PDO(
                'mysql:host=' . $config['host'] . ':3306;dbname=' . $config['db'], $config['user'], $config['pass'], $options
        );

        $this->parDefault(); //attrubui o valor default para diferenciar as alteracoes
    }

    /**
     * @return \PDO
     */
    function getDb() {
        return $this->db;
    }

    function setDb(\PDO $db) {
        $this->db = $db;
    }

    function getLastInsertId() {
        return $this->lastInsertId;
    }

    function setLastInsertId($lastInsertId) {
        $this->lastInsertId = $lastInsertId;
        return $this;
    }

    function insert() {
        $db = $this->db;
        $dados = $this->dados();

        foreach ($dados as $col => $val) {
            if ($val == '__default__') {
                unset($dados[$col]);
            }
        }

        $colunas = array_keys($dados);
        $values = array_values($dados);

        $sql_colunas = implode(',', $colunas);
        $sql_param = ':' . implode(',:', $colunas);

        $sql_colunas.=',created';
        $sql_param.=',now()';

        $sql = 'INSERT INTO ' . $this->_table . '(' . $sql_colunas . ') VALUES (' . $sql_param . ')';
        $prepare = $db->prepare($sql);

        foreach ($dados as $key => $val) {
            $prepare->bindValue(':' . $key, $val);
        }
        $this->exec($prepare);
        $id = $db->lastInsertId();
        $this->setLastInsertId($id);
    }

    function update($where = null, $par = array()) {
        $db = $this->db;
        $dados = $this->dados();

        foreach ($dados as $col => $val) {
            if ($val == '__default__') {
                unset($dados[$col]);
            }
        }

        $upt_col = [];


        $sql = 'UPDATE ' . $this->_table . ' SET ';

        foreach ($dados as $col => $val) {
            $upt_col[] = $col . '=:' . $col;
        }
        $sql.= implode(',', $upt_col);
        $sql.=' WHERE ' . $where;

        $prepare = $db->prepare($sql);

        foreach (array_merge($dados, $par) as $key => $val) {
            $prepare->bindValue(':' . $key, $val);
        }
        $this->exec($prepare);
    }

    function delete($where = null, $par = array()) {
        $db = $this->db;

        $sql = 'DELETE FROM ' . $this->_table . ' ';

        $sql.=' WHERE ' . $where;

        $prepare = $db->prepare($sql);

        foreach ($par as $key => $val) {
            $prepare->bindValue(':' . $key, $val);
        }
        $this->exec($prepare);
    }

    function dados() {
        $dados = get_object_vars($this);
        unset($dados['_table'], $dados['db'], $dados['id'], $dados['lastInsertId']);
        return $dados;
    }

    function exec($prepare, $par = null) {
        if (is_array($par)) {
            foreach ($par as $name => $val) {
                if (is_integer($val)) {
                    $type = \PDO::PARAM_INT;
                } else {
                    $type = \PDO::PARAM_STR;
                }
                $prepare->bindValue(':' . $name, $val, $type);
            }
        }
        if (!$prepare->execute()) {
            if (DEBUG) {
                echo $prepare->queryString;
                print_r($prepare->errorInfo());
//                exit();
            }
        }
    }

    function query($sql, $par = null) {
        $db = $this->getDb();
        $prepare = $db->prepare($sql);
        $this->exec($prepare, $par);
        $rs = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        return $rs;
    }

    private function parDefault() {
        $d = $this->dados();
        foreach ($d as $key => $val) {
            $this->{$key} = '__default__';
        }
    }

    function hydrate($dados) {
        foreach ($dados as $name => $value) {
            $part = explode('_', $name);
            $uc = array_map(function($word) {
                return ucfirst($word);
            }, $part);

            $func = implode('', $uc);
            $method = 'set' . $func;
            if (method_exists($this, $method)) {
                $this->{$method}($value);
            }
        }
    }

    function findAll($where = null) {
        $sql = 'SELECT * FROM ' . $this->_table;
        if (is_array($where)) {
            $sql .=' WHERE ';
            foreach ($where as $col => $val) {
                $sql_where[] = $col . '=:' . $col;
            }
            $sql.= ' ' . implode(' AND ', $sql_where);
        }
        $sql.= ' ORDER BY id DESC';
        $rs = $this->query($sql, $where);
        return $rs;
    }

}
