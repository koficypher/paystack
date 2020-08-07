<?php

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Misc\Response;
use KofiCypher\Paystack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;



class Split extends Executor {


    /**
     * Creates a split transaction between one or more subaccounts
     *
     * @param array $data - data body fields in accordance to the api docs but in array form
     * @param string $seckey - secret key of the account issuing the split
     * @return object a response object
     */
    public function createSplit(array $data, string $seckey = null)
    {
       $response = $this->postRequest(Endpoint::Split, $data, null, $seckey);

       return new Response($response);
    }

    /**
     * List all splits available on an account integration
     *
     * @param string $seckey - account secret key
     * @return object the response object
     */
    public function listSplit(string $seckey = null)
    {
      $response = $this->getRequest(Endpoint::Split, null, $seckey);

      return new Response($response);
    }


    /**
     * Get details of a split on an account integration
     *
     * @param string $id - id of the split 
     * @param string $seckey -account secret key
     * @return object -response object
     */
    public function fetchSplit(string $id, string $seckey = null)
    {
        $response = $this->getRequest(Endpoint::Split.'/'.$id, $seckey);

        return new Response($response);
    }

    /**
     * Update a split transaction on an account integration
     *
     * @param string $id - split id
     * @param array $data - data body fields according to the api docs
     * @param string $seckey - account secret key
     * @return object the response object
     */
    public function updateSplit(string $id, array $data, string $seckey = null)
    {
        $response = $this->putRequest(Endpoint::Split.'/'.$id, $data, null, $seckey);

        return new Response($response);
    }

    /**
     * Update or add a subaccount to a split created on an integration account
     *
     * @param string $id - id of the split to update
     * @param array $data - data body fields according to the api docs
     * @param string $seckey - secret key of the account
     * @return object - the response object
     */
    public function updateSplitSubAccount(string $id, array $data, string $seckey = null)
    {
        $response = $this->postRequest(Endpoint::Split.'/'.$id.'/subaccount/add', $data, null, $seckey);

        return new Response($response);
    }

    /**
     * Removes a split from a subaccount
     *
     * @param string $id - split id to delete
     * @param array $data -data body fields according to the api docs
     * @param string $seckey - account secret key
     * @return object - the response object
     */
    public function removeSplitFromSubAccount(string $id, array $data, string $seckey = null)
    {
       $response = $this->postRequest(Endpoint::Split.'/'.$id.'/subaccount/remove', $data, null, $seckey );

       return new Response($response);
    }
}