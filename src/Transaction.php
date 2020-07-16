<?php 

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;
use KofiCypher\PayStack\Misc\Response;

class Transaction extends Executor {

    /**
     * Initialize a transaction with email and amount
     *
     * 
     * @param array $data
     * @param array $params
     * @param string $seckey
     * @return object Response
     */
    public function initialize(array $data, array $params = null, string $seckey = null)
    {

        $response = $this->postRequest(Endpoint::InitializeUrl, $data, $params, $seckey);

        return new Response($response);
    }

    public function verify($reference)
    {
        $response = $this->getRequest(Endpoint::VerifyUrl.'/'.$reference);

        return new Response($response);
    }

    public function list()
    {
        $response = $this->getRequest(Endpoint::ListUrl);

        return new Response($response);
    }

    public function fetch($id)
    {
        $response = $this->getRequest(Endpoint::ListUrl.'/'.$id);

        return new Response($response);
    }

    public function charge_authorization(array $data, string $seckey = null)
    {
        $response = $this->postRequest(Endpoint::ChargeAuthUrl, $data, null, $seckey);

        return new Response($response);

    }

    public function check_authorization(array $data, string $seckey = null)
    {
        $response = $this->postRequest(Endpoint::CheckAuthUrl, $data,null, $seckey);

        return new Response($response);
    }

    public function view_trans_timeline(string $id_or_reference)
    {
        $response = $this->getRequest(Endpoint::ViewTransTimeline.'/'.$id_or_reference);

        return new Response($response);
    }

    public function trans_totals(int $per_page = 50, int $page = 1) // TODO: Add the to and from datetimes
    {
        $response = $this->getRequest(Endpoint::TransTotals.'/'.$per_page.'/'.$page);

        return new Response($response);
    }

    public function export_trans(int $per_page = 50, int $page = 1) // TODO: Add other path params
    {
        $response = $this->getRequest(Endpoint::ExportTrans.'/'.$per_page.'/'.$page);

        return new Response($response);
    }

    public function partial_debit(array $data, string $seckey = null)
    {
        $response = $this->postRequest(Endpoint::PartialDebit, $data, null, $seckey);

        return new Response($response);
    }

}