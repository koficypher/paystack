<?php

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;
use KofiCypher\PayStack\Misc\Response;


class Customer extends Executor {

    /**
     * Create a customer on an integration account
     *
     * @param array $data - body fields data according to api docs
     * @param string $seckey - Paystack secret key
     * @return object - the response object
     */
    public function createCustomer(array $data, string $seckey = null)
    {
      return new Response($this->postRequest(Endpoint::Customer, $data, null, $seckey));
    }


    /**
     * List all customers on an integration
     *
     * @param array $params - parameter fields according to the api docs
     * @param string $seckey - 
     * @return object - the response object
     */
    public function listCustomers(array $params = null, string $seckey = null)
    {
      return new Response($this->getRequest(Endpoint::Customer, null, $params, $seckey));
    }
    
}