<?php
namespace KofiCypher\PayStack\Misc;

class Response {

    public  $status;

    public  $message;

    public  $data;

    public function __construct(string $response_data) 
    {
        $payload = json_decode($response_data, true);

        $this->status = $payload['status'];
        $this->message = $payload['message'];
        $this->data = $payload['data'];
      
    }

}