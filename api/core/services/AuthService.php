<?php
class AuthService {

    private string $secret = 'chave-super-secreta';

    public function generateToken($username, $email, $role) {
        $payload = [
            'username' => $username,
            'email' => $email,
            'role' => $role,
            'iat' => time(),
            'exp' => time() + 3600
        ];
        $header = base64_encode(json_encode(['typ' => 'JWT', 'alg' => 'HS256']));
        $payload = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', "$header.$payload", $this->secret, true);
        $signature = base64_encode($signature);
        return "$header.$payload.$signature";
    }

    public function authorize($allowedRoles = []) {
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Authorization header missing']);
            exit;
        }
        $token = str_replace('Bearer ', '', $headers['Authorization']);
        $user = $this->validateToken($token);
        if (!$user) {
            http_response_code(401);
            echo json_encode(['error' => 'Invalid or expired token']);
            exit;
        }
        if (count($allowedRoles) > 0) {
            if (!in_array($user['role'], $allowedRoles)) {
                http_response_code(403);
                echo json_encode(['error' => 'Forbidden: insufficient permissions']);
                exit;
            }
        }
        return $user;
    }

    private function validateToken($token) {
        $parts = explode('.', $token);
        if (count($parts) !== 3) return false;
        [$header, $payload, $signature] = $parts;
        $expected = base64_encode(hash_hmac('sha256', "$header.$payload", $this->secret, true));
        if (!hash_equals($expected, $signature)) return false;
        $data = json_decode(base64_decode($payload), true);
        if ($data['exp'] < time()) return false;
        return $data;
    }

}
