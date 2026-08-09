<?php

require_once '../core/services/UserService.php';
require_once '../core/services/AuthService.php';

class Auth extends Controller {

    public function __construct() {
        $this->userService = new UserService();
        $this->authService = new AuthService();
    }

    public function token() {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
            $this->methodNotAllowed();
        $body = json_decode(file_get_contents('php://input'), true);
        $data = $this->userService->login($body);
        if ($data['success']) {
            $token = $this->authService->generateToken($data['user']->username, $data['user']->email, $data['user']->role);
            echo json_encode(['success' => true, 'token' => $token]);                
        } else {
            http_response_code(401);
            echo json_encode($data);
        }
    }

}
