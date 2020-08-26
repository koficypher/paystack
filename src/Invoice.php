<?php

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;
use KofiCypher\PayStack\Misc\Response;

class Invoice extends Executor {

    /**
     * Create Invoice
     *
     * @param array $data - data body fields according to api docs
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function createInvoice(array $data, string $seckey = null): Response
    {
        return new Response($this->postRequest(Endpoint::Invoice, $data, null, $seckey));
    }

    /**
     * List all invoices
     *
     * @param array $params - data param fields according to api docs
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function listInvoices(array $params, string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Invoice, $params, $seckey));
    }

}