<?php

namespace KofiCypher\PayStack\Contracts;

interface ClientContract {

    /**
     * Performs a get request with the supplied arguments 
     *
     * @param string $url
     * @param array $params
     * @return string $paylaod
     */
    public function getRequest(string $url, array $params = null): string;

    /**
     * Performs a post request with  the supllied arguments
     *
     * @param string $url
     * @param array $data
     * @param array $params
     * @return string $payload
     */
    public function postRequest(string $url,array $data, array $params=null): string;
}