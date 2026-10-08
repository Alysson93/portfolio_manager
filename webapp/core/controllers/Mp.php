<?php
class Mp extends Controller {

    public function index($username) {
        $this->auth();
        $request = new Request();
        $response = $request->get('/users/'.$username, [], $token = $_SESSION['token']);
        if ($response['status'] == 200)
            $this->view('profile', $response['body']['user']);
        else $this->view('notFound');
    }

}
