<?php

namespace App\Base\Part;

class ViewHelper {

    function menuAdmin($menu) {
        $uri_atual = $_SERVER['REQUEST_URI'];

        $active = function($uri_menu) use ($uri_atual) {
            if (substr($uri_atual, 0, strlen($uri_menu)) == $uri_menu) {
                return 'active';
            }
            return null;
        };

        $html = '<ul class="sidebar-menu">';
        $html.='<li class="header">Menu de Navegação</li>';
        foreach ($menu as $m) {
            $act = null;
            $url = isset($m['url']) ? $m['url'] : '#';
            if (!empty($m['sub'])) {
                foreach ($m['sub'] as $s) {
                    $act .= $active($s['url']);
                }
            } else {
                $act .= $active($url);
            }

            $html.='<li class="' . $act . ' treeview">
          <a href="' . $url . '">';

            if (!empty($m['icon'])) {
                $html.='<i class="fa ' . $m['icon'] . '"></i>';
            }
            $html.= '<span>' . $m['desc'] . '</span>';
            if (!empty($m['sub'])) {
                $html.= '<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>';
            }
            $html.= '</a>';
            if (!empty($m['sub'])) {

                $html.= '<ul class="treeview-menu">';
                foreach ($m['sub'] as $s) {
                    $act = $active($s['url']);
                    $html.= '<li class="' . $act . '"><a href="' . $s['url'] . '">
                   <i class="fa fa-circle-o"></i>' . $s['desc'] . '</a></li>';
                }
                $html.= '</ul>';
            }
            $html.='</li>';
        }
        return $html;
    }

    function formAdmin($elem) {
        $html = '<div class="row">';
        $attr = function($array) {
            $at = '';
            foreach ($array as $name => $val) {
                $at .= ' ' . $name . '="' . $val . '" ';
            }
            return $at;
        };

        $html.= '<form ' . $attr($elem['_form']) . '>';
        unset($elem['_form']);

        foreach ($elem as $name => $e) {
            $col = isset($e['col']) ? $e['col'] : 12;
            $label = isset($e['label']) ? $e['label'] : null;
            $desc = isset($e['desc']) ? $e['desc'] : null;
            $id = isset($e['id']) ? $e['id'] : $name;
            $type = isset($e['type']) ? $e['type'] : 'text';
            $val = isset($e['val']) ? $e['val'] : null;
            $at = isset($e['attr']) ? $e['attr'] : array();
            $option = isset($e['option']) ? $e['option'] : array();
            $db = isset($e['db']) ? $e['db'] : false;

            $html.='<div class="col-md-' . $col . '" >';
            $html.='<div class="form-group" >';

            if ($type == 'text') {
                $html.='<label>' . $label . '</label>';
                $html.='<input ' . $attr($at) . ' type="text" class="form-control" name="' . $name . '" id="' . $id . '" placeholder="' . $desc . '" value="' . $val . '">';
            }

            if ($type == 'password') {
                $html.='<label>' . $label . '</label>';
                $html.='<input ' . $attr($at) . ' type="password" class="form-control" name="' . $name . '" id="' . $id . '" placeholder="' . $desc . '" value="' . $val . '">';
            }
            if ($type == 'textarea') {
                $html.='<label>' . $label . '</label>';
                $html.='<textarea ' . $attr($at) . ' class="form-control" name="' . $name . '" id="' . $id . '" placeholder="' . $desc . '">' . $val . '</textarea>';
            }
            if ($type == 'select') {
                $html.='<label>' . $label . '</label>';
                $html.='<select ' . $attr($at) . ' class="form-control" name="' . $name . '" id="' . $id . '">';
                //Obtem dados do banco
                $html.='<option value=""></option>';

                if ($db) {
                    $model = new $db[0]();

                    $option = call_user_func([$model, $db[1]]);

                    foreach ($option as $r) {
                        $selected = null;
                        if ($val == $r['value']) {
                            $selected = 'selected';
                        }
                        $html.='<option value="' . $r['value'] . '" ' . $selected . '>' . $r['text'] . '</option>';
                    }
                } else {
                    foreach ($option as $value => $name) {
                        $selected = null;
                        if ($val == $value) {
                            $selected = 'selected';
                        }
                        $html.='<option value="' . $value . '" ' . $selected . '>' . $name . '</option>';
                    }
                }
                $html.= '</select>';
            }
            if ($type == 'submit') {
                $html.='<button ' . $attr($at) . ' class="btn btn-primary" name="' . $name . '" id="' . $id . '">' . $desc . '</button>';
            }

            $html.='</div></div>';
        }
        $html.='</form>';
        $html.='</div>';
        return $html;
    }

    function menuSite($menu) {
        $uri_atual = $_SERVER['REQUEST_URI'];

        $active = function($uri_menu) use ($uri_atual) {
//            if (substr($uri_atual, 0, strlen($uri_menu)) == $uri_menu) {
            if ($uri_atual == $uri_menu) {
                return 'active';
            }
            return null;
        };

        $html = '<ul class="menuzord-menu">';
        foreach ($menu as $m) {
            $act = null;
            $url = isset($m['url']) ? $m['url'] : '#';
            if (!empty($m['sub'])) {
                foreach ($m['sub'] as $s) {
                    $act .= $active($s['url']);
                }
            } else {
                $act .= $active($url);
            }

            $html.='<li class="' . $act . '">
          <a href="' . $url . '">';
            $html.= $m['desc'];
            if (!empty($m['sub'])) {
                $html.= '<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>';
            }
            $html.= '</a>';
            if (!empty($m['sub'])) {

                $html.= '<ul class="treeview-menu">';
                foreach ($m['sub'] as $s) {
                    $act = $active($s['url']);
                    $html.= '<li class="' . $act . '"><a href="' . $s['url'] . '">
                   <i class="fa fa-circle-o"></i>' . $s['desc'] . '</a></li>';
                }
                $html.= '</ul>';
            }
            $html.='</li>';
        }
        return $html;
    }

    function msg() {
        if (!isset($_SESSION)) {
            session_start();
        }

        $html = '<div class="alert %s alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                %s
              </div>';
        $msg = '';
        if (isset($_SESSION['msg_erro'])) {
            foreach ($_SESSION['msg_erro'] as $m) {
                $msg .= sprintf($html, 'alert-danger', $m);
            }
            unset($_SESSION['msg_erro']);
        }
        if (isset($_SESSION['msg_sucesso'])) {
            foreach ($_SESSION['msg_sucesso'] as $m) {
                $msg .= sprintf($html, 'alert-success', $m);
            }
            unset($_SESSION['msg_sucesso']);
        }
        if (isset($_SESSION['msg_aviso'])) {
            foreach ($_SESSION['msg_aviso'] as $m) {
                $msg .= sprintf($html, 'alert-warning', $m);
            }
            unset($_SESSION['msg_aviso']);
        }
        return $msg;
    }

    function auth() {
        return new \App\Usuario\Service\Auth();
    }

    function descData($data, $hora = false) {
        $t = null;
        if ($hora) {
            $t = ' às %T';
        }
        return strftime('%A, %d de %B de %Y ' . $t, strtotime($data));
    }

    function date($date) {
        $obj = date_create($date);
        return date_format($obj, "d/m/Y H:i:s");
    }

    function avatar() {
        return "/img/avatar.png";
    }

    function countNotificacoes() {
        $noty = new \App\Usuario\Model\Notificacao();
        $id_usuario = $this->auth()->getIdUsuario();
        return $noty->countNew($id_usuario);
    }

    function getConfig($chave) {
        $model = new \App\Admin\Model\Config();
        return $model->getConfig($chave);
    }

}
