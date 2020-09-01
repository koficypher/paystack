<?php

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;
use KofiCypher\PayStack\Misc\Response;

class Settlements extends Executor {

    /**
     * Fetch settlements made to your settlement accounts
     *
     * @param array $params - param fields according to the api docs
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function fetchSettlements(array $params, string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Settlement, $params, $seckey));
    }

    /**
     * Get the transactions that make up a particular settlement
     *
     * @param array $params - param fields according to the api docs
     * @param string $id - settlement id you want to fetch its transactions
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function fetchSettlementsTransactions(array $params, string $id, string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Settlement.'/'.$id. '/transactions', $params, $seckey));
    }

}