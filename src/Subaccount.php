<?php 

namespace KofiCypher\PayStack;

use KofiCypher\Paystack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;
use KofiCypher\PayStack\Misc\Response;

class Subaccount extends Executor {

    /**
     * Creates a subaccount on an integration
     *
     * @param array $data - data body fields according to the api docs
     * @param string $seckey - account secret key
     * @return object - response object
     */
    public function createAccount(array $data, string $seckey = null)
    {
      return new Response($this->postRequest(Endpoint::Subaccount, $data, null, $seckey));
    }
    
}