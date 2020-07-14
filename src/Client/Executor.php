<?php

namespace KofiCypher\Paystack\Client;

use KofiCypher\PayStack\Config\Config;
use KofiCypher\PayStack\Contracts\ClientContract as Request;
use GuzzleHttp\Client;

 class Executor extends Config implements Request  {

    private  $client;

    protected $env_keys = [];

    protected $sec_key;

    protected $env_flag;

    protected $base_url;

    public function __construct() 
    {
      $this->env_keys = (new Config())->getAllVars();
      $this->sec_key = $this->env_keys['secret_key'];
      $this->base_url = $this->env_keys['base_url'];
      $this->env_flag =  $this->env_keys['env_flag'];

      $this->client = new Client(
                           [
                            'base_uri' => $this->base_url,
                            'headers' => [
                                'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer '. $this->sec_key,
                            ],
                            'http_errors' => false,
                            'verify' => $this->env_flag == 'true' ? true : false
                            ]
                        );
    }

    public function getRequest(string $url, array $params = null)
    {
       if(!is_null($params)) {

         $response = $this->client->request('GET', $url, ['query' => $params]);
         
       } else {

        $response =  $this->client->request('GET', $url);

       }

        return $response->getBody();
    }


    public function postRequest(string $url, array $data, array $param = null)
    {
        if(!is_null($param)) {
            $response = $this->client->request('POST', $url, ['query' => $params], ['json' => $data]);
          } else {
           $response =  $this->client->request('POST', $url, ['json' => $data]);
          }
   
         if($response->getStatusCode() == 200){
            return $response->getBody()->getContents();
         }

    }


}