<?php
class Controller {

    protected function view($view, $data=[]) {
        require_once '../core/views/'.$view.'.php';
    }

}