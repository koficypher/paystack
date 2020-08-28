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

    /**
     * View details of an invoice on an integration
     *
     * @param string $id_or_code - id or code of the invoice 
     * @param string $seckey - secret key of the account
     * @return Response - the response object
     */
    public function viewInvoice(string $id_or_code, string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Invoice.'/'.$id_or_code, null, $seckey));
    }

    /**
     * Verify the details of an invoice on an integration
     *
     * @param string $code - code of the invoice
     * @param string $seckey - secret key of the invoice
     * @return Response - the response object
     */
    public function verifyInvoice(string $code, string $seckey = null): Response 
    {
        return new Response($this->getRequest(Endpoint::verifyInvoice.'/'.$code, null, $seckey));
    }

    /**
     * Send notification of an invoice to a  customer
     *
     * @param string $code - invoice code 
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function sendNotification(string $code, string $seckey = null): Response
    {
        return new Response($this->postRequest(Endpoint::notifyInvoice.'/'.$code, null, null, $seckey));
    }

    /**
     * Get invoice metrics for your dashboard
     *
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function invoiceTotals(string $seckey = null): Response
    {
        return new Response($this->getRequest(Endpoint::Invoice.'/totals', null, $seckey));
    }

    /**
     * Finalize a draft invoice
     *
     * @param string $code - invoice code
     * @param string $seckey - account secret key
     * @return Response - the response object
     */
    public function finalizeInvoice(string $code, string $seckey = null): Response 
    {
        return new Response($this->postRequest(Endpoint::finalizeInvoice.'/'.$code, null, null, $seckey));
    }

    /**
     * Update the details on a invoice
     *
     * @param string $id_or_code - id or code of the invoice
     * @param array $data - body fields according to the api docs
     * @param string $seckey - account secret key
     * @return Response - the repsonse object
     */
    public function updateInvoice(string $id_or_code, array $data, string $seckey = null): Response 
    {
        return new Response($this->putRequest(Endpoint::Invoice.'/'.$id_or_code, null, null, $seckey));
    }

    /**
     * Archive an invoice. Invoice will no longer be fetched on list or returned on verify
     *
     * @param string $code - invoice code
     * @param string $seckey - the account secret key
     * @return Response - the response object
     */
    public function archiveInvoice(string $code, string $seckey = null): Response 
    {
        return new Response($this->postRequest(Endpoint::archiveInvoice.'/'.$code, null, null, $seckey));
    }
}