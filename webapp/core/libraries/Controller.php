<?php
class Controller {

    protected function view($view, $data=[]) {
        require_once '../core/views/'.$view.'.php';
    }

    protected function auth() {
        if (!isset($_SESSION['token']))
            Redirect::redirecionar();
    }

}