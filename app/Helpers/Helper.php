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
use App\Auctions;

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
               $type = isset($data['type']) ? $data['type'] : "deal";
               
           	$ret = Deals::create(['name' => $data['name'],                                                                                                          
                                                      'sku' => $sku, 
                                                      'type' => $type,  
                                                      'category' => $data['category'], 
                                                      'status' => "active", 
                                                      'rating' => "0", 
                                                      'deadline' => "", 
                                                      ]);
                                                      
                 $data['sku'] = $ret->sku;                         
                $dealData = $this->createDealData($data);
                $images = explode(",",$data['images']); 
                foreach($images as $i) $this->createDealImage(['sku' => $data['sku'], 'url' => $i]);
                return $ret;
           }
           function createDealData($data)
           {
           	$ret = DealData::create(['sku' => $data['sku'],                                                                                                          
                                                      'description' => $data['description'], 
                                                      'amount' => $data['amount'],                                                      
                                                      'in_stock' => "yes", 
                                                      'min_bid' => isset($data['min_bid']) ? $data['min_bid'] : "0"                                                  
                                                      ]);
                                                      
                return $ret;
           }
         
           function createDealImage($data)
           {
           	$ret = DealImages::create(['sku' => $data['sku'],                                                                                                          
                                                      'url' => $data['url'], 
                                                      ]);
                                                      
                return $ret;
           }
           function createTransaction($data)
           {
           	$ret = Transactions::create(['deal_id' => $data['deal_id'],                                                                                                          
                                                      'type' => $data['type'], 
                                                      'user_id' => $data['user_id'],
                                                      'amount' => $data['amount'],
                                                      ]);
                                                      
                return $ret;
           }
           function createAuction($data)
           {
           	$ret = Auctions::create(['days' => $data['days'],                                                                                                          
                                                      'hours' => $data['hours'], 
                                                      'minutes' => $data['minutes'],
                                                      'status' => $data['status'],
                                                      'bids' => $data['bids'],
                                                      ]);
                                                      
                return $ret;
           }
           
           function getDeadline($baseTimeStamp,$offset)
           {
           	$ret = null; 
               if(count($offset) > 0){$ret = baseTimeStamp; }
               
               if($ret != null){
               	
               if(isset($offset['days']) && $offset['days'] > 0)
               {
                    $ret->addDays($offset['days']);
               }
               if(isset($offset['hours']) && $offset['hours'] > 0)
               {
                    $ret->addHours($offset['hours']);
               }
               if(isset($offset['minutes']) && $offset['minutes'] > 0)
               {
                    $ret->addMinutes($offset['minutes']);
               }
               
               }
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
                   	$temp['id'] = $d->id; 
                       $temp['images'] = $this->getDealImages($d->sku);    
                       $temp['data'] = $this->getDealData($d->sku);
                   	$temp['name'] = $d->name; 
                   	$temp['sku'] = $d->sku; 
                   	$temp['type'] = $d->type; 
                   	$temp['category'] = $d->category; 
                   	$temp['status'] = $d->status; 
                   	$temp['rating'] = $d->rating;
                       if($temp['type'] == "auction")
                       {
                       	$a = $this->getAuction($d->id);
                           if(count($a) > 0)
                           {                         	
                       	   $offset = ['hours' => $a['hours'],
                                             'minutes' => $a['minutes'], 
                                             'days' => $a['days']
                                            ];
                       	   $did = $this->getDeadline($d->created_at,$offset);
                              $temp['deadline'] = ($did == null) ? "" : $did->format("js F, Y h:i A");                          
                           }
                      }
                       
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
                   	$temp['id'] = $i->id; 
                   	$temp['url'] = $i->url; 
                       array_push($ret, $temp); 
                   }
               }                                 
                                                      
                return $ret;
           }	
         
           function getCart($user)
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
           function getDeal($sku)
           {
           	$ret = [];
               $d = Deals::where('sku',$sku)->first();
 
              if($d != null)
               {
               	$dealData = DealData::where('sku',$d->sku)->first();
               	$ret['id'] = $d->id; 
               	$ret['images'] = $this->getDealImages($d->sku);               
                   $ret['data'] = $this->getDealData($d->sku);               
               	$ret['name'] = $d->name; 
               	$ret['sku'] = $d->sku; 
               	$ret['type'] = $d->type; 
               	$ret['category'] = $d->category; 
               	$ret['status'] = $d->status; 
               	$ret['rating'] = $d->rating;
               }                                 
                                                      
                return $ret;
           }		  
           function getWallet($user)
           {
           	$ret = [];
               $wallet = Wallet::where('user_id',$user->id)->first();
 
              if($wallet != null)
               {
               	$ret['id'] = $wallet->id; 
                   $ret['balance'] = $wallet->balance;                  
               }                                 
                                                      
                return $ret;
           }		  
           function getDashboard($user)
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
           function getTransactions($user)
           {
           	$ret = [];
               $transactions = Transactions::where('user_id',$user->id)->get();
 
              if($transactions != null)
               {
               	foreach($transactions as $t)
                   {
                   	$temp = [];
                   	$temp['id'] = $t->id; 
                       $deal = Deals::where('id',$t->deal_id)->first();
                   	$temp['deal'] = ($deal == null) ? "" : $deal->name; 
                       $temp['type'] = $t->type; 
                       $temp['amount'] = $t->amount; 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }		
           
           function adminGetTransactions()
           {
           	$ret = [];
               $transactions = Transactions::all();
 
              if($transactions != null)
               {
               	foreach($transactions as $t)
                   {
                   	$temp = [];
                   	$temp['id'] = $t->id; 
                       $temp['type'] = $t->type; 
                       
                       $deal = Deals::where('id',$t->deal_id)->first();
                   	$temp['deal'] = ($deal == null) ? "" : $deal->sku;
 
                       $u = User::where('id',$t->user_id)->first();
                       $temp['user'] = ($u == null) ? "" : $u->fname." ".$u->lname; 
                       $activity = "";
                       
                       if($temp['type'] == "sale")
                       {
                       	$activity = $temp['user']." purchased a deal (SKU: ".$deal->sku.")";
                       }
                       else if($temp['type'] == "refund")
                       {
                       	$activity = $temp['user']." received a refund";
                       }                                          	
                       
                       $temp['activity'] = $activity; 
                       $temp['amount'] = $t->amount; 
                       $temp['date'] = $t->created_at->format("jS F, Y"); 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }		

           function getAuctions($category,$q="")
           {
           	$ret = [];
               $auctions = null; 
           	if($q == "") $auctions = Auctions::where('type',$category)->get();
               else $auctions = Auctions::where('type',$category)->where('category',$q)->get();            
 
              if($auctions != null)
               {
               	foreach($auctions as $a)
                   {
                   	$temp = [];
                   	$temp['id'] = $a->id; 
                       $temp['days'] = $a->days; 
                       $temp['hours'] = $a->hours; 
                       $temp['minutes'] = $a->minutes; 
                       $temp['status'] = $a->status; 
                       $temp['bids'] = $a->bids; 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }	

          function getAuction($dealID)
           {
           	$ret = [];
               $auction = Auctions::where('deal_id',$dealID)->first();
 
              if($auction != null)
               {
               	$ret['id'] = $auction->id; 
                   $ret['days'] = $auction->days; 
                   $ret['hours'] = $auction->hours; 
                   $ret['minutes'] = $auction->minutes; 
                   $ret['status'] = $auction->status; 
                   $ret['bids'] = $auction->bids; 
               }                                 
                                                      
                return $ret;
           }		

          function adminGetUsers()
           {
           	$ret = [];
               $users = User::where('id','>',2)->get();
 
              if($users != null)
               {
               	foreach($users as $u)
                   {
                   	$temp = [];
                   	$temp['fname'] = $u->fname; 
                       $temp['lname'] = $u->lname; 
                       $wallet = Wallet::where('user_id',$u->id)->first();
                   	$temp['balance'] = ($wallet == null) ? "NA" : $wallet->balance; 
                       $temp['phone'] = $u->phone; 
                       $temp['email'] = $u->email; 
                       $temp['role'] = $u->role; 
                       $temp['status'] = $u->status; 
                       $temp['id'] = $u->id; 
                       $temp['date'] = $u->created_at->format("jS F, Y"); 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }

          function adminGetDeals()
           {
           	$ret = [];
           	$deals = Deals::where('id','>','0')->get();
 
              if($deals != null)
               {
               	foreach($deals as $d)
                   {
                   	$temp = [];
                   	$temp['id'] = $d->id; 
                   	$temp['name'] = $d->name; 
                   	$temp['sku'] = ; 
                   	$temp['type'] = $d->type; 
                   	$temp['data'] = $this->getDealData($d->sku); 
                   	$temp['images'] = $this->getDealImages($d->sku);               
                       array_push($ret, $temp); 
                   }
               }                                 
                                                      
                return $ret;
           }

     function adminGetAuctions()
           {
           	$ret = [];
               #$transactions = Transactions::all();
               $auctions = null; 
              if($auctions != null)
               {
               	foreach($transactions as $t)
                   {
                   	$temp = [];
                   	$temp['id'] = $t->id; 
                       $deal = Deals::where('id',$t->deal_id)->first();
                   	$temp['deal'] = ($deal == null) ? "" : $deal->name; 
                       $temp['type'] = $t->type; 
                       $temp['amount'] = $t->amount; 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }			  			  			  	   
           
}
?>
