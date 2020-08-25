<?php 

namespace KofiCypher\PayStack;

use KofiCypher\PayStack\Client\Executor;
use KofiCypher\PayStack\Abstractions\Endpoint;
use KofiCypher\PayStack\Misc\Response;

class PaymentPages extends Executor {

   public function createPage(array $data, string $seckey = null): Response
   {
      return new Response($this->postRequest(Endpoint::Page, $data, null, $seckey ));
   }

   public function listPages(array $params, string $seckey = null): Response
   {
      return new Response($this->getRequest(Endpoint::Page, $params, $seckey));
   }

   public function fetchPage(string $id_or_code, string $seckey = null): Response 
   {
       return new Response($this->getRequest(Endpoint::Page.'/'.$id_or_code, null, $seckey));
   }

   public function updatePage(string $id_or_code, array $data, string $seckey = null): Response 
   {
      return new Response($this->putRequest(Endpoint::Page.'/'.$id_or_code, $data, null, $seckey));
   }

   public function checkSlugAvailability(string $slug, string $seckey = null): Response
   {
      return new Response($this->getRequest(Endpoint::PageAvailable.'/'.$slug, null, $seckey));
   }

   public function addProductToPage(int $page_id, array $data, string $seckey = null)
   {
      return new Response($this->postRequest(Endpoint::Page.'/'.$page_id.'/product', $data, nyll, $seckey));
   }

}