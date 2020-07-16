<?php

namespace KofiCypher\PayStack\Contracts;

interface ClientContract {

    /**
     * Performs a get request with the supplied arguments 
     *
     * @param string $url
     * @param array $params
     * @return mixed $paylaod
     */
    public function getRequest(string $url, array $params = null, string $seckey = null);

    /**
     * Performs a post request with  the supllied arguments
     *
     * @param string $url
     * @param array $data
     * @param array $params
     * @param string $seckey
     * @return mixed $payload
     */
    public function postRequest(string $url,array $data, array $params=null, string $seckey = null);
}