<?php
class UserRepository {

    public function __construct() {
        $this->db = new Database();
        $this->responseDTO = "SELECT id, username, first_name, last_name, email, phone, role, created_at, updated_at FROM users";
    }

    public function findAll(int $limit, int $offset) {
        $this->db->query("$this->responseDTO LIMIT :limit OFFSET :offset");
        $this->db->bind("limit", $limit);
        $this->db->bind("offset", $offset);
        $result = $this->db->results();
        if ($result) return $result;
        return false;
    }

    public function findBy(string $value, $column = 'id') {
        $this->db->query("$this->responseDTO where $column = :value");
        $this->db->bind("value", $value);
        $result = $this->db->result();
        if ($result) return $result;
        return false;
    }


    public function checkCredentials(string $username, string $password) {
        $this->db->query("SELECT username, email, password, role FROM users WHERE username = :username");
        $this->db->bind("username", $username);
        $user = $this->db->result();
        if ($user && password_verify($password, $user->password)) {
            unset($user->password);
            return $user;
        }
        return false;
    }

    public function create($data) {
        $this->db->query("INSERT INTO users(username, password, first_name, last_name, email, phone, role) VALUES (:username, :password, :first_name, :last_name, :email, :phone, :role);");
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", $data['password']);
        $this->db->bind("first_name", $data['first_name']);
        $this->db->bind("last_name", $data['last_name']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("phone", $data['phone']);
        $this->db->bind("role", 'client');
        if ($this->db->execute()) return $this->findBy($data['username'], 'username');
        return false;
    }

}