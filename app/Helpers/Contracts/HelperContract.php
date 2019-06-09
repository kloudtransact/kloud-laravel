<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmail($to,$subject,$data,$view,$type);
        public function createUser($data);
        public function createShippingDetails($data);
        public function addToCart($data);
        public function createDeal($data);
        public function createDealData($data);
        public function createDealImage($data);
        public function createAuction($data);
        public function createWallet($data);
        public function createTransaction($data);
        public function createOrder($data);
        public function createOrderDetails($data);
        public function createRating($data);
        public function createComment($data);
        public function createCoupon($data);
        public function generateSKU();
        public function generateOrderNumber($type);
        public function getDeals($category,$q="");
        public function getDeadline($baseTimeStamp,$offset);
        public function getDealData($sku);
        public function getDealImages($sku);
        public function getCart($user);
        public function getCartTotals($cart);
        public function updateCart($cart, $quantities);
        public function removeFromCart($user, $asf);
        public function getDeal($sku);
        public function getUser($email);
        public function getShippingDetails($user);
        public function updateShippingDetails($user,$data);
        public function getWallet($user);
        public function getDashboard($user);
        public function getTransactions($user);
        public function getAuctions($category,$q="");
        public function getAuction($dealID);        
        public function adminGetTransactions();
        public function adminGetUsers();
        public function adminGetDeals();
        public function adminGetAuctions();
        public function adminGetStats();
        public function getHottestDeals();
        public function getNewArrivals();
        public function getBestSellers();
        public function getHotCategories();
        public function getRating($deal,$user);
        public function getComments($deal);
        public function getOrders($user);
        public function getInvoice($on);
        public function getUserInvoice($user,$on);
        public function fundWallet($data);
        public function transferFunds($user, $data);
        public function checkout($user, $data);
}
 ?>