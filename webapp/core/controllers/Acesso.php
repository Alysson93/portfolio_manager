<?php
class Acesso extends Controller {

    public function index() {
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($data)) {
            $request = new Request();
            if (isset($data['signin'])) {
                $body = ['username' => $data['username'], 'password' => $data['password']];
                $resultado = $request->post('/auth/token', $body);
                SessionManager::salvarToken($resultado['token']);
            } else if (isset($data['signup'])) {
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
                var_dump($resultado);
            }
        }
        $this->view('sign', $data);
    }

}