<?php 

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;
use KofiCypher\PayStack\Misc\Response;

class Transaction extends Executor {

    /**
     * Initialize a transaction with email and amount
     *
     * @param string $amount
     * @param string $email
     * @param array ...$options
     * @return object Response
     */
    public function initialize(string $amount, string $email, array ...$options)
    {
        if ($options){
            $pre_data['email'] = $email;
            $pre_data['amount'] = $amount;

            $data = array_merge($data, $options);
        }

        $data['email'] = $email;
        $data['amount'] = $amount;

       // var_dump($data);

        $response = $this->postRequest(Endpoint::InitializeUrl, $data);

        return new Response($response);
    }

    public function verify()
    {
        
    }
}