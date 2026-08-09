<?php
class Request {

    private string $baseUrl;

    public function __construct(string $baseUrl = API_URL) {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function post(string $endpoint, array $data = [], ?string $token = null): array {
        return $this->request('POST', $endpoint, $data, $token);
    }

    public function get(string $endpoint, array $query = [], ?string $token = null): array {
        if (!empty($query)) {
            $endpoint .= '?' . http_build_query($query);
        }
        return $this->request('GET', $endpoint, $token);
    }

    public function put(string $endpoint, array $data = [], ?string $token = null): array
    {
        return $this->request('PUT', $endpoint, $data, $token);
    }

    public function delete(string $endpoint, ?string $token = null): array
    {
        return $this->request('DELETE', $endpoint, $token);
    }

    private function request(
        string $method,
        string $endpoint,
        ?array $data = null,
        ?string $token = null
    ): array {

        $headers = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        if (isset($token))
            $headers[] = 'Authorization: Bearer ' . $token;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->baseUrl . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_TIMEOUT => 30,
        ]);

        if ($data !== null && in_array($method, ['POST', 'PUT', 'PATCH'])) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($curl);

        if ($response === false) {
            throw new Exception(curl_error($curl));
        }

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        $body = json_decode($response, true);

        if ($httpCode >= 400) {
            throw new Exception(
                $body['message'] ?? "Erro HTTP {$httpCode}"
            );
        }

        return $body ?? [];
    }

}