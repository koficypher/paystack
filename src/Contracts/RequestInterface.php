<?php

namespace KofiCypher\PayStack\Contracts;

interface RequestInterface {

    public function getRequest(string $url, array $params = null);

    public function postRequest(string $url,array $data, array $params=null);
}