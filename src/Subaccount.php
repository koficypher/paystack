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
    public function createSubaccount(array $data, string $seckey = null)
    {
      return new Response($this->postRequest(Endpoint::Subaccount, $data, null, $seckey));
    }


    /**
     * Lists all subaccounts on a integration
     *
     * @param array $params - data param fields according to the api docs
     * @param string $seckey - account secret key
     * @return object - the response object
     */
    public function listSubaccounts(array $params, string $seckey = null)
    {
      return new Response($this->getRequest(Endpoint::Subaccount, $params, $seckey ));
    }

    /**
     * Fetch a single subaccount on a integration
     *
     * @param string $id_or_code -id or code of subaccount
     * @param string $seckey - account secret key
     * @return object - the response object
     */
    public function fetchSubaccount(string $id_or_code, string $seckey = null)
    {
      return new Response($this->getRequest(Endpoint::Subaccount.'/'.$id_or_code, null, $seckey));
    }

    /**
     * Update details of a subaccount
     *
     * @param string $id_or_code - id or code of a subaccount
     * @param array $data - data body fields on a 
     * @param string $seckey - secret key of the account
     * @return object - the response object
     */
    public function updateSubaccount(string $id_or_code, array $data, string $seckey = null)
    {
      return new Response($this->putRequest(Endpoint::Subaccount.'/'.$id_or_code, null, $data, $seckey));
    }
    
}