<?php 

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;
use KofiCypher\PayStack\Misc\Response;

class PaymentPages extends Executor {

   /**
    * Create a payment page
    *
    * @param array $data - body data fields according to the api docs
    * @param string $seckey - account secret key
    * @return Response - the response object
    */
   public function createPage(array $data, string $seckey = null): Response
   {
      return new Response($this->postRequest(Endpoint::Page, $data, null, $seckey ));
   }

   /**
    * List payment pages
    *
    * @param array $params - query params according to api docs
    * @param string $seckey - account secret key
    * @return Response - the response body object
    */
   public function listPages(array $params, string $seckey = null): Response
   {
      return new Response($this->getRequest(Endpoint::Page, $params, $seckey));
   }

   /**
    * Fetch a single page
    *
    * @param string $id_or_code - the id or slug of the page you want to fetch
    * @param string $seckey - account secret key
    * @return Response - the response object
    */
   public function fetchPage(string $id_or_slug, string $seckey = null): Response 
   {
       return new Response($this->getRequest(Endpoint::Page.'/'.$id_or_code, null, $seckey));
   }

   /**
    * Update payment page details
    *
    * @param string $id_or_slug - the id or slug of the page you want to update
    * @param array $data - body data fields according api docs
    * @param string $seckey - account secret key
    * @return Response - the response object
    */
   public function updatePage(string $id_or_slug, array $data, string $seckey = null): Response 
   {
      return new Response($this->putRequest(Endpoint::Page.'/'.$id_or_code, $data, null, $seckey));
   }

   /**
    * Check the availability of a slug for a payment page
    *
    * @param string $slug - the slug you want to check its availability
    * @param string $seckey - the account secret key
    * @return Response - the response object
    */
   public function checkSlugAvailability(string $slug, string $seckey = null): Response
   {
      return new Response($this->getRequest(Endpoint::PageAvailable.'/'.$slug, null, $seckey));
   }

   /**
    * Add Procucts to the Page
    *
    * @param integer $page_id - id of the page to add products to
    * @param array $data - array of product ids to add to the page
    * @param string $seckey - account secret key
    * @return Response - the response object
    */
   public function addProductToPage(int $page_id, array $data, string $seckey = null): Response
   {
      return new Response($this->postRequest(Endpoint::Page.'/'.$page_id.'/product', $data, nyll, $seckey));
   }

}