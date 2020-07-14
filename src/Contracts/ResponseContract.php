<?php

class ResponseContract {

    public boolean $status;

    public string $message;

    public mixed $data;

    public function __construct(string $response_data) 
    {
        $payload = json_decode($response_data, true);

        $this->status = (bool) $payload['status'];
        $this->message = $payload['message'];
        $this->data = $payload['data'];
      
    }

}