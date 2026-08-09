<?php
class UserValidator {

    public static function validateCreate($data) {
        $errors = [];
        if (empty($data['username']))
            $errors['username_error'] = 'Username é um campo obrigatório';
        if (empty($data['password']))
            $errors['password_error'] = 'Senha é um campo obrigatório';
        else if (strlen($data['password']) < 6)
            $errors['password_error'] = 'Senha deve ter no mínimo 6 caracteres';
        if (empty($data['confirm_password']))
            $errors['confirm_password_error'] = 'Confirmar a senha é um campo obrigatório';
        else if ($data['password'] != $data['confirm_password'])
            $errors['confirm_password_error'] = 'A senha não está compatível com a confirmação';
        if (empty($data['first_name']))
            $errors['first_name_error'] = 'Nome é um campo obrigatório';
        if (empty($data['last_name']))
            $errors['last_name_error'] = 'Sobrenome é um campo obrigatório';
        if (empty($data['email']))
            $errors['email_error'] = 'E-mail é um campo obrigatório';
        if (empty($data['phone']))
            $errors['phone_error'] = 'Telefone é um campo obrigatório';
        return $errors;
    }

    public static function validateLogin($data) {
        $errors = [];
        if (empty($data['username']))
            $errors['username_error'] = 'Username é um campo obrigatório';
        if (empty($data['password']))
            $errors['password_error'] = 'Senha é um campo obrigatório';
        return $errors;
    }

}