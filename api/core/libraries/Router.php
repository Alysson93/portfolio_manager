<?php
class Router {

    private $controller = '';
    private $method = 'index';
    private $params = [];

    public function __construct() {
        $url = $this->request();
        unset($url[0]);

        if (isset($url[1])) {
            $file = '../core/controllers/'.ucwords($url[1]).'.php';
            if (file_exists($file)) {
                require_once $file;
                $this->controller = ucwords($url[1]);
                $this->controller = new $this->controller();
                unset($url[1]);
                if (isset($url[2]) && method_exists($this->controller, $url[2])) {
                    $this->method = $url[2];
                    unset($url[2]);
                }
                $this->params = $url ? array_values($url) : [];
                call_user_func_array([$this->controller, $this->method], $this->params);
            } else $this->response('notFound');
        } else {
            $this->response(200, 'Olá, mundo!');
        }
    }

    private function request() {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = trim(rtrim($url, '/'));
        $url = explode('/', $url);
        return $url;
    }

    private function response(int $status, string $message) {
        http_response_code($status);
        echo json_encode(['msg' => $message]);
    }

}