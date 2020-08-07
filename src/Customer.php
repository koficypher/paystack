<?php

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;
use KofiCypher\PayStack\Misc\Response;


class Customer extends Executor {

    /**
     * Create a customer on an integration account
     *
     * @param array $data - body field data according to api docs
     * @param string $seckey
     * @return object - the response object
     */
    public function createCustomer(array $data, string $seckey = null)
    {
      return new Response($this->postRequest(Endpoint::Customer, $data, null, $seckey));
    }
    
}