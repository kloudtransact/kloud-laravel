<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmail($to,$subject,$data,$view,$type);
        public function createUser($data);
        public function createBankAccount($data);
        public function getBankDetails($id);
}
 ?>