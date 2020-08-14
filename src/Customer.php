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

    /**
     * Fetchs and returns a customer on an integration
     *
     * @param string $email_or_code - email or code of the customer
     * @param string $seckey - account secret key
     * @return object - the response object
     */
    public function fetchCustomer(string $email_or_code, string $seckey = null)
    {
      return new Response($this->getRequest(Endpoint::Customer.'/'.$email_or_code, null, null, $seckey));
    }

    /**
     * Updates a customer's record or details on an integration
     *
     * @param string $code - customer code
     * @param array $data - data body fields according to the documentation
     * @param string $seckey - account secret key
     * @return object - the response object
     */
    public function updateCustomer(string $code, array $data, string $seckey = null)
    {
      return new Response($this->postRequest(Endpoint::Customer.'/'.$code, $data, null, $seckey));
    }


    
}