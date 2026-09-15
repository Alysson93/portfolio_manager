<?php
class SessionManager {

    public static function salvarToken($token, $username) {
        $_SESSION['token'] = $token;
        $_SESSION['username'] = $username;
    }

    public static function destruirToken() {
        unset($_SESSION['token']);
        unset($_SESSION['username']);
        session_destroy();
    }

}