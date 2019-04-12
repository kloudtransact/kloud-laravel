<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmail($to,$subject,$data,$view,$type);
        public function createUser($data);
        public function createShippingDetails($data);
        public function createDeal($data);
        public function createDealData($data);
        public function createDealImage($data);
}
 ?>