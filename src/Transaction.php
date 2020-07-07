<?php 

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Client\Executor;

class Transaction extends Executor {

    public function initialize(string $amount, string $email, array ...$options)
    {
        $url = '/transaction/initialize';

        if ($options){
            $pre_data['email'] = $email;
            $pre_data['amount'] = $amount;

            $data = array_merge($data, $options);
        }

        $data['email'] = $email;
        $data['amount'] = $amount;

       // var_dump($data);

        return $this->postRequest($url, $data);
    }
}