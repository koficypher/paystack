<?php

namespace KofiCypher\PaStack;

use KofiCypher\PayStack\Client\Executor;
use KofiCypher\PayStack\Misc\Response;
use KofiCypher\PayStack\Abstractions\Endpoint;


class Plan extends Executor {

    /**
     * Create a Plan on a integration
     *
     * @param array $data - data body fields according to the api documentation
     * @param string $seckey - account secret key
     * @return object - the response object
     */
    public function createPlan(array $data, string $seckey = null): Response
    {
        return new Response($this->postRequest(Endpoint::Plan, $data, null, $seckey));
    }

    /**
     * List plans on an integration
     *
     * @param array $params - parameter fields according to the api documentation
     * @param string $seckey - 
     * @return object - the response object
     */
    public function listPlans(array $params, string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Plan, $params, $seckey));
    }

    /**
     * Fetches a plan on an integration
     *
     * @param string $id_or_code - id or code of the plan
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function fetchPlan(string $id_or_code, string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Plan.'/'.$id_or_code, null, $seckey));
    }

    /**
     * Updates a plan on an integration
     *
     * @param string $id_or_code - id or code of the plan
     * @param array $data - data body fields according to the api documentation
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function updatePlan(string $id_or_code, array $data, string $seckey = null): Response
    {
        return new Response($this->putRequest(Endpoint::Plan.'/'.$id_or_code, $data, null, $seckey));
    }
    
}