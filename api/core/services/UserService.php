<?php

require_once '../core/validators/UserValidator.php';
require_once '../core/repositories/UserRepository.php';

class UserService {

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function login($data) {
        $response = ['success' => false];
        $errors = UserValidator::validateLogin($data);
        if (count($errors) > 0)
            $response['errors'] = $errors;
        else {
            $user = $this->repository->checkCredentials($data['username'], $data['password']);
            if ($user) $response = ['success' => true, 'user' => $user];
            else $response['errors'] = ['login_error' => 'Username ou senha incorretos;'];
        }
        return $response;
    }

    public function createUser($data) {
        $response = ['success' => false];
        $errors = UserValidator::validateCreate($data);
        if (count($errors) > 0)
            $response['errors'] = $errors;
        else if ($this->repository->findBy($data['username'], 'username'))
            $response['errors'] = ['username_error' => 'Já existe um usuário com este username.'];
        else if ($this->repository->findBy($data['email'], 'email'))
            $response['errors'] = ['email_error' => 'Já existe um usuário com este e-mail'];
        else {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $user = $this->repository->create($data);
            if ($user) 
                $response = ['success' => true, 'user' => $user];
            else $response['errors'] = ['server_error' => 'Erro ao armazenar usuário'];
        }
        return $response;
    }

    public function getAllUsers(int $limit, int $offset) {
        return $this->repository->findAll($limit, $offset);
    }

    public function getUser($username) {
        $user = $this->repository->findBy($username, 'username');
        return $user;
    }

}
