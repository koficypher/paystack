<?php

namespace KofiCypher\PayStack\Config;

use KofiCypher\Contracts\ConfigContract as ConfigInterface;

use Dotenv\Dotenv;

class Config implements ConfigInterface {
   private $keys = [];


    public function __construct(string $seckey = null)
    {
      // if($seckey = null){
      //   $dotenv = Dotenv::createImmutable(__DIR__.'/../../'); 
      //   $dotenv->load();

      //   $dotenv->required('PAYSTACK_SECRET_KEY')->notEmpty();
      // } else {

      // }

      
    }


    protected function getconfig(): array
    {
      return [
        'secret_key' => $_SERVER['PAYSTACK_SECRET_KEY'], 
        'public_key' => $_SERVER['PAYSTACK_PUBLIC_KEY'], 
        'base_url' => $_SERVER['PAYSTACK_BASE_URL'], 
        'env_flag' => $_SERVER['PAYSTACK_ENV_FLAG']
      ];
    }


}