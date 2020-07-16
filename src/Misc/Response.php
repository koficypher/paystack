<?php
namespace KofiCypher\PayStack\Misc;

class Response {

    public bool $status;

    public string  $message;

    public array  $data = [];

    public function __construct(string $response_data) 
    {
        $payload = json_decode($response_data, true);

        $this->status = $payload['status'];
        $this->message = $payload['message'];
        $this->data = isset($payload['data']) ? $payload['data']:[];
      
    }

}