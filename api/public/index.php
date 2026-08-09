<?php

require_once '../core/consts.php';
require_once '../core/libraries/Controller.php';
require_once '../core/libraries/Router.php';
require_once '../core/libraries/Database.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: http://localhost:8002");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

date_default_timezone_set('America/Recife');

$router = new Router();
