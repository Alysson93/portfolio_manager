<?php
class Acesso extends Controller {

    public function __construct() {
        if (isset($_SESSION['token']))
            Redirect::redirecionar('mp/'.$_SESSION['username']);
    }

    public function index() {
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($data)) {
            $request = new Request();
            $body = [
                'username' => $data['username'],
                'password' => $data['password'],
                'confirm_password' => $data['confirm_password'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone']
            ];
            $resultado = $request->post('/users', $body);
            if ($resultado['status'] == 201)
                Redirect::redirecionar('acesso');
            else 
                $data['signup_errors'] = $resultado['body']['errors'];
        }
        $this->view('signup', $data);
    }

    public function entrar() {
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($data)) {
            $request = new Request();
            $body = [
                'username' => $data['username'], 
                'password' => $data['password']
            ];
            $resultado = $request->post('/auth/token', $body);
            if ($resultado['status'] == 200) {
                SessionManager::salvarToken($resultado['body']['token'], $data['username']);
                Redirect::redirecionar('mp/'.$data['username']);
            } else {
                $data['erros'] = $resultado['body']['errors'];
            }
        }
        $this->view('signin', $data);
    }

    public function sair() {
        SessionManager::destruirToken();
        Redirect::redirecionar();
    }

}