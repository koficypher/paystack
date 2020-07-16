<?php

namespace KofiCypher\PayStack\Config;

use KofiCypher\PayStack\Contracts\ConfigContract as ConfigInterface;

use Dotenv\Dotenv;

class Config implements ConfigInterface {

  /**
   * Array key store
   *
   * @var array
   */
   private static $keys = [
     'secret_key' => null,
     'public_key' => null,
     'base_url' => null,
     'env_flag' => null
   ];

   private static function loadconfig(string $seckey = null)
   {
     if($seckey == null) {
       $dotenv = Dotenv::createImmutable(__DIR__.'/../../');
       $dotenv->load();
       $dotenv->required('PAYSTACK_SECRET_KEY')->notEmpty();
       self::buildconfig();
       return true;
     }

     self::$keys['secret_key'] = $seckey;
     self::buildconfig();
     return true;
   }

   private static function buildconfig()
   {
     if(self::$keys['secret_key'] == null) {
        self::$keys = [
          'secret_key' => $_SERVER['PAYSTACK_SECRET_KEY'], 
          'public_key' => $_SERVER['PAYSTACK_PUBLIC_KEY'], 
          'base_url' => $_SERVER['PAYSTACK_BASE_URL'], 
          'env_flag' => $_SERVER['PAYSTACK_ENV_FLAG']
        ];
        
       return true;
     }

     self::$keys = [
        'secret_key' => self::$keys['secret_key'],
        'public_key' => null,
        'base_url' => 'https://api.paystack.co',
        'env_flag' => false
      ];

    return true;
   }



    
   public static function get_config(string $seckey = null): array
   {
     self::loadconfig($seckey);
     return self::$keys;
   }


   public static function get_key(string $key = null)
   {
     if($key == null){
       return self::$keys;
     }

     return self::$keys[$key];
   }


}