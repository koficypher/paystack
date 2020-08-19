<?php

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Misc\Response;
use KofiCypher\PayStack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;

class Subscription extends Executor {
    
    /**
     * Create a subscription on a integration account
     *
     * @param array $data - data body fields according to the api docs
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function createSubscription(array $data, string $seckey = null): Response 
    {
        return new Response($this->postRequest(Endpoint::Subsription, $data, null, $seckey));
    }

    /**
     * List all subscriptions on an integration
     *
     * @param array $param - param fields according to the api docs
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function listSubscriptions(array $params = null, string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Subscription, $params, $seckey));
    }

    /**
     * Fetch a single subscription on a integration
     *
     * @param string $id_or_code - id or code of the subscription
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function fetchSubscription(string $id_or_code, string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Subscription.'/'.$id_or_code));
    }

    /**
     * Enable subscription on an account for a customer
     *
     * @param string $code - subsription code
     * @param string $token - email token of a customer
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function enableSubscription(string $code, string $token, string $seckey = null): Response 
    {
        return new Response($this->postRequest(Endpoint::Subscription.'/enable', ['code' => $code, 'token' => $token], null, $seckey));
    }

    /**
     * Disable subscription on an account for a customer
     *
     * @param string $code - subscription code
     * @param string $token - email token of the customer
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function disableSubscription(string $code, string $token, string $seckey = null): Response
    {
        return new Response($this->postRequest(Endpoint::Subscription.'/disable', ['code' => $code, 'token' => $token], null, $seckey));
    }
}