<?php
namespace App\Helpers;

use App\Helpers\Contracts\HelperContract; 
use Crypt;
use Carbon\Carbon; 
use Mail;
use Auth;
use App\User;
use App\ShippingDetails;
use App\Wallet;
use App\Transactions;
use App\Deals;
use App\DealData;
use App\DealImages;

class Helper implements HelperContract
{
	
   	public $categories= [
			                       "phones-tablets" => "Phones & Tablets",
			                       "tv-electronics" => "TV & Electronics",
								   "fashion" => "Fashion",
								   "computers" => "Computers",
								   "groceries" => "Groceries",
								   "unique-bundles" => "Unique Bundles",
								   "health-beauty" => "Health & Beauty",
								   "home-office" => "Home & Office",
								   "babies-kids-toys" => "Babies, Kids & Toys",
								   "games-consoles" => "Games & Consoles",
								   "watches-sunglasses" => "Watches & Sunglasses",
								   "others" => "Other Categories"
			];  

          /**
           * Sends an email(blade view or text) to the recipient
           * @param String $to
           * @param String $subject
           * @param String $data
           * @param String $view
           * @param String $image
           * @param String $type (default = "view")
           **/
           function sendEmail($to,$subject,$data,$view,$type="view")
           {
                   if($type == "view")
                   {
                     Mail::send($view,$data,function($message) use($to,$subject){
                           $message->from('info@worldlotteryusa.com',"Admin");
                           $message->to($to);
                           $message->subject($subject);
                          if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
						  $message->getSwiftMessage()
						  ->getHeaders()
						  ->addTextHeader('x-mailgun-native-send', 'true');
                     });
                   }

                   elseif($type == "raw")
                   {
                     Mail::raw($view,$data,function($message) use($to,$subject){
                           $message->from('info@worldlotteryusa.com',"Admin");
                           $message->to($to);
                           $message->subject($subject);
                           if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
                     });
                   }
           }    


           function createUser($data)
           {
           	$ret = User::create(['fname' => $data['fname'], 
                                                      'lname' => $data['lname'], 
                                                      'email' => $data['email'], 
                                                      'phone' => $data['phone'], 
                                                      'role' => $data['role'], 
                                                      'status' => $data['status'], 
                                                      'password' => bcrypt($data['pass']), 
                                                      ]);
                                                      
                return $ret;
           }
           function createShippingDetails($data)
           {
           	$ret = ShippingDetails::create(['user_id' => $data['user_id'],                                                                                                          
                                                      'company' => "", 
                                                      'zipcode' => "",                                                      
                                                      'address' => "", 
                                                      'city' => "", 
                                                      'state' => "", 
                                                      ]);
                                                      
                return $ret;
           }
           function createWallet($data)
           {
           	$ret = Wallet::create(['user_id' => $data['user_id'], 
                                                      'balance' => "0",                                                                                                            
                                                      ]);                                                     
                return $ret;
           }		
           function createDeal($data)
           {
           	$sku = "KTK".rand(999,99999)."LD".rand(999,9999);
           
           	$ret = Deals::create(['name' => $data['name'],                                                                                                          
                                                      'sku' => $sku, 
                                                      'type' => "deal",                                                      
                                                      'status' => "active", 
                                                      'rating' => "0", 
                                                      ]);
                                                      
                 $data['sku'] = $ret->sku;                         
                $dealData = $this->createDealData($data);                                    
                return $ret;
           }
           function createDealData($data)
           {
           	$ret = DealData::create(['sku' => $data['sku'],                                                                                                          
                                                      'description' => $data['description'], 
                                                      'amount' => $data['amount'],                                                      
                                                      'in_stock' => "yes", 
                                                      'rating' => "0", 
                                                      ]);
                                                      
                return $ret;
           }
         
           function createDealImage($data)
           {
           	$ret = Deals::create(['sku' => $data['sku'],                                                                                                          
                                                      'url' => $data['url'], 
                                                      ]);
                                                      
                return $ret;
           }
           /**	   
           function getBankDetails($id)
           {
           	$ret = [];

           	$bd = BankAccounts::where('user_id',$id)->first();
               if($bd != null)
               {
               	$ret['id'] = $bd->user_id; 
                   $ret['balance'] = $bd->balance; 
                   $ret['initial_balance'] = $bd->initial_balance; 
                   $ret['last_deposit_name'] = $bd->last_deposit_name; 
                   $ret['last_deposit'] = $bd->last_deposit; 
                   $ret['account_number'] = $bd->account_number; 
                   $ret['address'] = $bd->address; 
               }                                 
                                                      
                return $ret;
           }		   
           **/
}
?>
