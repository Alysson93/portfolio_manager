<?php

require_once '../core/services/AuthService.php';
require_once '../core/services/UserService.php';

class Users extends Controller {

    public function __construct() {
        $this->auth = new AuthService();
        $this->service = new UserService();
    }

    protected function post() {
        $user = json_decode(file_get_contents('php://input'), true);
        $user = $this->service->createUser($user);
        if ($user['success']) {
            http_response_code(201);
        } else {
            http_response_code(400);
        }
        echo json_encode($user);
    }

    protected function get() {
        $user = $this->auth->authorize(['admin']);
        $limit = filter_input(INPUT_GET, 'limit', FILTER_VALIDATE_INT);
        $offset = filter_input(INPUT_GET, 'offset', FILTER_VALIDATE_INT);

        $limit = $limit ? $limit : 25;
        $offset = $offset ? $offset : 0;

        $users = $this->service->getAllUsers($limit, $offset);

        echo json_encode([
            'success' => 'true',
            'users' => $users
        ]);
    }

    protected function getBy(string $username) {
        $user = $this->auth->authorize();
        if ($username !== $user['username'] && $user['role'] !== 'admin') {
            http_response_code(403);
            echo json_encode(['error' => 'Forbidden: insufficient permissions']);
            exit;
        }
        $return = $this->service->getUser($username);
        if (!$return) {
            http_response_code(404);
            echo json_encode(['error' => 'User not found']);
            exit;
        }
        echo json_encode([
            'success' => true,
            'user' => $return
        ]);
    }

}
