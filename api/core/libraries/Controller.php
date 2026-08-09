<?php
class Controller {

    public function index($username = '') {
        switch($_SERVER['REQUEST_METHOD']) {
            case('GET'):
                if ($username !== '') {
                    $this->getBy($username);
                    break;
                } else {
                    $this->get();
                    break;
                }
            case('POST'):
                $this->post(); 
                break;
            default:
                $this->methodNotAllowed();
                break;
        }
    }

    protected function get() {
        $this->methodNotAllowed();
    }

    protected function getBy(string $username) {
        $this->methodNotAllowed();
    }

    protected function post() {
        $this->methodNotAllowed();
    } 

    protected function methodNotAllowed() {
        http_response_code(405);
        echo json_encode(['msg' => 'Method Not Allowed']);
        exit;
    }

}