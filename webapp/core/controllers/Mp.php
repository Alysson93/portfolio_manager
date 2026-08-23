<?php
class Mp extends Controller {

    public function index($username) {
        $request = new Request();
        $user = $request->get('/users/'.$username, [], $token = $_SESSION['token']);
        var_dump($user);
    }

}
