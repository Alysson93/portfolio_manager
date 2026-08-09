<?php
class SessionManager {

    public static function salvarToken($token) {
        $_SESSION['token'] = $token;
    }

    public static function destruirToken() {
        unset($_SESSION['token']);
        session_destroy();
    }

}