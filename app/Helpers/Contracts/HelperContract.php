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
        public function getDeals($category,$q="");
        public function getDeadline($baseTimeStamp,$offset);
        public function getDealData($sku);
        public function getDealImages($sku);
        public function getCart($user);
        public function getDeal($sku);
        public function getWallet($user);
        public function getDashboard($user);
        public function getTransactions($user);
}
 ?>