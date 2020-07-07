<?php

namespace KofiCypher\PayStack\Config;

use Dotenv\Dotenv;

class Config {

    protected $dotenv;

    public function __construct()
    {
        $this->dotenv = Dotenv::createImmutable(__DIR__.'/../../'); 
        $this->dotenv->load();

        $this->dotenv->required('PAYSTACK_SECRET_KEY')->notEmpty();
    }


    protected function getAllVars(): array
    {
      return [
        'secret_key' => $_SERVER['PAYSTACK_SECRET_KEY'], 
        'public_key' => $_SERVER['PAYSTACK_PUBLIC_KEY'], 
        'base_url' => $_SERVER['PAYSTACK_BASE_URL'], 
        'env_flag' => (bool) $_SERVER['PAYSTACK_ENV_FLAG']
      ];
    }


}