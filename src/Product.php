<?php

namespace KofiCypher\PayStack;

use KofiCypher\Paystack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;
use KofiCypher\PayStack\Misc\Response;

class Product extends Executor {


    /**
     * Create a product on an integration
     *
     * @param array $data - data body fields according to api docs
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function createProduct(array $data, string $seckey = null): Response
    {
      return new Response($this->postRequest(Endpoint::Product, $data, null, $seckey));
    }

    /**
     * Lists all products on an integration
     *
     * @param array $params - field params according to api docs
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function listProducts(array $params, string $seckey = null): Response
    {
      return new Response($this->getRequest(Endpoint::Product, null, $seckey));
    }


    /**
     * Get a single product on integration
     *
     * @param string $id - id of the product you want to retrieve
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function fetchProduct(string $id, string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Product.'/'.$id, null, $seckey));
    }

    /**
     * Update a Product on an integration
     *
     * @param string $id - Product id to update
     * @param array $data - data body fields according to api docs
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function updateProduct(string $id, array $data, string $seckey = null): Response
    {
        return new Response($this->putRequest(Endpoint::Product.'/'.$id, $data, null, $seckey));
    }
}