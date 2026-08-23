<?php
class Redirect {

    public static function redirecionar($url = ''){
        header("Location:".WEB_URL.DIRECTORY_SEPARATOR.$url);
    }

}
