<?php
class Acesso extends Controller {

    public function index() {
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        if (isset($data)) {
            $request = new Request();
            if (isset($data['signin'])) {
                $body = ['username' => $data['username'], 'password' => $data['password']];
                $resultado = $request->post('/auth/token', $body);
                if ($resultado['status'] == 200) {
                    SessionManager::salvarToken($resultado['body']['token'], $data['username']);
                    Redirect::redirecionar('mp/'.$data['username']);
                } else
                    $data['error'] = $resultado['status'] == 401 ? $resultado['body']['errors']['login_error'] : 'Erro interno';
        
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
                if ($resultado['status'] == 201)
                    Redirect::redirecionar('acesso');
                else 
                    $data['errors'] = $resultado['body']['errors'];
            }
        }
        $this->view('sign', $data);
    }

    public function sair() {
        SessionManager::destruirToken();
        Redirect::redirecionar();
    }

}