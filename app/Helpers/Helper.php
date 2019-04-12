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
                                                      'category' => $data['category'], 
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
                                                      'min_bid' => isset($data['min_bid']) ? $data['min_bid'] : "0";                                                    
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
             
           function getDeals($category,$q="")
           {
           	$ret = [];
               $deals = null; 
           	if($q == "") $deals = Deals::where('type',$category)->get();
               else $deals = Deals::where('type',$category)->where('category',$q)->get();
 
              if($deals != null)
               {
               	foreach($deals as $d)
                   {
                   	$temp = [];
                   	$temp['id'] = $deals->id; 
                   	$temp['name'] = $deals->name; 
                   	$temp['sku'] = $deals->sku; 
                   	$temp['type'] = $deals->type; 
                   	$temp['category'] = $deals->category; 
                   	$temp['status'] = $deals->status; 
                   	$temp['rating'] = $deals->rating; 
                       array_push($ret, $temp); 
                   }
               }                                 
                                                      
                return $ret;
           }		   
           
           function getDealData($sku)
           {
           	$ret = [];
               $dealData = DealData::where('sku',$sku)->first();
 
              if($dealData != null)
               {
               	$ret['id'] = $dealData->id; 
                   $ret['description'] = $dealData->description; 
                   $ret['amount'] = $dealData->amount; 
                   $ret['in_stock'] = $dealData->in_stock; 
                   $ret['min_bid'] = $dealData->min_bid; 
               }                                 
                                                      
                return $ret;
           }		   
           
           function getDealImages($sku)
           {
           	$ret = [];
               $img = DealImages::where('sku',$sku)->get();
 
              if($img != null)
               {
               	foreach($img as $i)
                   {
                   	$temp = [];
                   	$temp['id'] = $img->id; 
                   	$temp['url'] = $img->url; 
                       array_push($ret, $temp); 
                   }
               }                                 
                                                      
                return $ret;
           }		   
           
}
?>
