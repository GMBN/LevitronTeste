<?php

namespace App;

class App {

    protected $module;
    protected $currentModule;
    protected $currentTemplate;
    protected $route = array();
    protected $requestUri;
    protected $controller;
    protected $controllerName;
    protected $action;
    protected $param = array();
    protected $template;
    protected $config = array();

//    public function __construct() {
//        $this->module = $_GET['module'];
//        $this->route = $_GET['route'];
//    }

    function run() {
        //Obtem todos os modulos ativos
        $modules = require __DIR__ . '/modules.php';

        foreach ($modules as $m) {

            //Obtem as configuracoes do modulo
            $config = require __DIR__ . '/' . $m . '/config.php';

            //Obtem as rotas do modulo
            foreach ($config['route'] as $alias => $controller) {
                $this->route[$alias] = $controller;
                $this->module[$alias] = $m;
            }

            //Obtem o template do modulo
            $this->template[$m] = $config['template'];
        }

        //Obtem os parametros da url acessada
        $request = explode('?', $_SERVER['REQUEST_URI']);
        $this->requestUri = $request[0];
        $uri = explode('/', $this->requestUri);

        $params = array();


        foreach ($this->route as $alias => $controller) {

            $route = explode('/', $alias);

            if (count($route) == count($uri)) {

                $notFound = false;

                foreach ($uri as $key => $val) {

                    $par = $route[$key];
                    if (substr($par, 0, 1) == "$") {
                        $name = str_replace('$', '', $par);
                        $params[$name] = $val;
                    } else if ($val != $par) {
                        $notFound = true;
                    }
                }
                if (!$notFound) {
                    $array_controller = explode(':', $controller);
                    $m = $this->module[$alias];
                    $this->currentModule = $m;
                    $this->currentTemplate = $this->template[$m];
                    $this->controller = "App\\{$m}\\Controller\\" . $array_controller[0];
                    $this->controllerName = $array_controller[0];
                    $this->action = $array_controller[1];
                    $this->param = $params;
                    return $this->exec(); //Executa o controller
                }
            }
        }
        return $this->notFound();
    }

    function checkAuth() {
        $config = require __DIR__ . '/config.php';
        return (new \App\Usuario\Controller\Auth())->check($config);
    }

    function exec() {
        if ($this->checkAuth()) {
            $par = array_values($this->param);
            $class = new $this->controller();
            $dados = call_user_func_array(array($class, $this->action), $par);
            return $this->render($dados);
        } else {
            return $this->notAllow();
        }
    }

    function render($dados) {
        $view = __DIR__ . '/' . $this->currentModule . '/View/' . strtolower($this->controllerName) . '/' . $this->action . '.php';
        if (file_exists($this->currentTemplate.'.php')) {
            $template = $this->currentTemplate.'.php';
        } else {
            $template = __DIR__ . '/' . $this->currentModule . '/View/template/' . $this->currentTemplate . '.php';
        }
        $service = new \App\Base\Service\View();
        return $service->render($dados, $view, $template);
    }

    function notAllow() {
        $view = __DIR__ . '/Base/View/notAllow.php';
        $template = __DIR__ . '/' . $this->currentModule . '/View/template/' . $this->currentTemplate . '.php';
        $service = new \App\Base\Service\View();
        return $service->render([], $view, $template);
    }

    function notFound() {
        http_response_code(404);
        exit();
        $view = __DIR__ . '/Base/View/notFound.php';
        $template = __DIR__ . '/' . $this->currentModule . '/View/template/' . $this->currentTemplate . '.php';
        $service = new \App\Base\Service\View();
        return $service->render([], $view, $template);
    }

}
