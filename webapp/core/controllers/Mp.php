<?php
class Mp extends Controller {

    public function index($username) {
        $this->auth();
        $request = new Request();
        $data = $request->get('/users/'.$username, [], $token = $_SESSION['token']);
        $this->view('profile', $data['user']);
    }

}
