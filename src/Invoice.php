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

    public function viewInvoice(string $id_or_code, string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Invoice.'/'.$id_or_code, null, $seckey));
    }

    public function verifyInvoice(string $code, string $seckey = null): Response 
    {
        return new Response($this->getRequest(Endpoint::verifyInvoice.'/'.$code, null, $seckey));
    }

    public function sendNotification(string $code, string $seckey = null): Response
    {
        return new Response($this->postRequest(Endpoint::notifyInvoice.'/'.$code, null, null, $seckey));
    }

    public function invoiceTotals(string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Invoice.'/totals', null, $seckey));
    }

    public function finalizeInvoice(string $code, string $seckey = null): Response 
    {
        return new Response($this->postRequest(Endpoint::finalizeInvoice.'/'.$code, null, null, $seckey));
    }

    public function updateInvoice(string $id_or_code, array $data, string $seckey = null): Response 
    {
        return new Response($this->putRequest(Endpoint::Invoice.'/'.$id_or_code, null, null, $seckey));
    }

    public function archiveInvoice(string $code, string $seckey = null): Response 
    {
        return new Response($this->postRequest(Endpoint::archiveInvoice.'/'.$code, null, null, $seckey));
    }
}