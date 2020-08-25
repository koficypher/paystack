<?php

namespace KofiCypher\PayStack\Client;

use KofiCypher\PayStack\Config\Config;
use KofiCypher\PayStack\Contracts\ClientContract as Request;
use KofiCypher\PayStack\Misc\Response;
use GuzzleHttp\Client;

 abstract class Executor implements Request  {


    private function makeClient(string $seckey = null)
    {
      $config = Config::get_config($seckey);

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

    public function getRequest(string $url, array $params = null, string $seckey = null)
    {
       $client = $this->makeClient($seckey);
       if(!is_null($params)) {

         $response = $client->request('GET', $url, ['query' => $params]);
         
       } else {

        $response =  $client->request('GET', $url);

       }

       if($response->getStatusCode() == 200){
           return $response->getBody()->getContents();
        } else {
           return $response->getBody()->getContents();
        }
    }


    public function postRequest(string $url, array $data, array $param = null, string $seckey = null)
    {
        $client = $this->makeClient($seckey);
        if(!is_null($param)) {
            $response = $client->request('POST', $url, ['query' => $params], ['json' => $data]);
          } else {
           $response =  $client->request('POST', $url, ['json' => $data]);
          }
   
         if($response->getStatusCode() == 200){
            return $response->getBody()->getContents();
         } else {
           return $response->getBody()->getContents();
         }

    }


    public function putRequest(string $url, array $data, array $param = null, string $seckey = null)
    {
      $client = $this->makeClient($seckey);
      if(!is_null($param)) {
          $response = $client->request('PUT', $url, ['query' => $params], ['json' => $data]);
        } else {
         $response =  $client->request('PUT', $url, ['json' => $data]);
        }
 
       if($response->getStatusCode() == 200){
          return $response->getBody()->getContents();
       } else {
         return $response->getBody()->getContents();
       }
    }


}