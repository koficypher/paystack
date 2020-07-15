<?php

namespace KofiCypher\Paystack\Client;

use KofiCypher\PayStack\Config\Config;
use KofiCypher\PayStack\Contracts\ClientContract as Request;
use KofiCypher\PayStack\Misc\Response;
use GuzzleHttp\Client;

 abstract class Executor implements Request  {


    private function makeClient()
    {
      $config = Config::get_config();

      return new Client([
            'base_uri' => $config['base_url'],
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '. $config['secret_key'],
            ],
            'http_errors' => false,
            'verify' => $config['env_flag'] == true ? true : false  // $this->env_flag == 'true' ? true : false
      ]);

    }

    public function getRequest(string $url, array $params = null): string
    {
       $client = $this->makeClient();
       if(!is_null($params)) {

         $response = $client->request('GET', $url, ['query' => $params]);
         
       } else {

        $response =  $client->request('GET', $url);

       }

        return $response->getBody();
    }


    public function postRequest(string $url, array $data, array $param = null): string
    {
        $client = $this->makeClient();
        if(!is_null($param)) {
            $response = $client->request('POST', $url, ['query' => $params], ['json' => $data]);
          } else {
           $response =  $client->request('POST', $url, ['json' => $data]);
          }
   
         if($response->getStatusCode() == 200){
            return $response->getBody()->getContents();
         }

    }


}