<?php
namespace App\Helpers;

use App\Helpers\Contracts\HelperContract; 
use Crypt;
use Carbon\Carbon; 
use Mail;
use Auth;
use App\User;
use App\Carts;
use App\ShippingDetails;
use App\Wallet;
use App\Transactions;
use App\Deals;
use App\DealData;
use App\DealImages;
use App\Auctions;
use App\Ratings;
use App\Comments;
use App\Coupons;
use App\Orders;
use App\OrderDetails;

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
			
			public $states = [
			                       'abia' => 'Abia',
			                       'adamawa' => 'Adamawa',
			                       'akwa-ibom' => 'Akwa Ibom',
			                       'anambra' => 'Anambra',
			                       'bauchi' => 'Bauchi',
			                       'bayelsa' => 'Bayelsa',
			                       'benue' => 'Benue',
			                       'borno' => 'Borno',
			                       'cross-river' => 'Cross River',
			                       'delta' => 'Delta',
			                       'ebonyi' => 'Ebonyi',
			                       'enugu' => 'Enugu',
			                       'edo' => 'Edo',
			                       'ekiti' => 'Ekiti',
			                       'gombe' => 'Gombe',
			                       'imo' => 'Imo',
			                       'jigawa' => 'Jigawa',
			                       'kaduna' => 'Kaduna',
			                       'kano' => 'Kano',
			                       'katsina' => 'Katsina',
			                       'kebbi' => 'Kebbi',
			                       'kogi' => 'Kogi',
			                       'kwara' => 'Kwara',
			                       'lagos' => 'Lagos',
			                       'nasarawa' => 'Nasarawa',
			                       'niger' => 'Niger',
			                       'ogun' => 'Ogun',
			                       'ondo' => 'Ondo',
			                       'osun' => 'Osun',
			                       'oyo' => 'Oyo',
			                       'plateau' => 'Plateau',
			                       'rivers' => 'Rivers',
			                       'sokoto' => 'Sokoto',
			                       'taraba' => 'Taraba',
			                       'yobe' => 'Yobe',
			                       'zamfara' => 'Zamfara',
			                       'fct' => 'FCT'  
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
           
           function addToCart($data)
           {
           	$ret = Carts::create(['user_id' => $data['user_id'],
                                          'sku' => $data['sku'],  
                                          'qty' => $data['qty'],                                                                          
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
           	$sku = $this->generateSKU();
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
           function createAuction($data)
           {
           	$ret = Auctions::create(['deal_id' => $data['deal_id'],                                                                                                          
                                                      'days' => $data['days'], 
                                                      'hours' => $data['hours'],                                                    
                                                      'minutes' => $data['minutes'], 
                                                      'status' => $data['status'], 
                                                      'bids' => $data['bids'], 
                                                      ]);
                                                      
                return $ret;
           }
           function createTransaction($data)
           {
           	$ret = Transactions::create(['description' => $data['description'],                                                                                                          
                                                      'type' => $data['type'], 
                                                      'user_id' => $data['user_id'],
                                                      'amount' => $data['amount'],
                                                      ]);
                                                      
                return $ret;
           }
           
           function createOrder($data)
           {
           	$ref = (isset($data['reference'])) ? $data['reference'] : "none"; 
           	$ret = Orders::create(['number' => $this->generateOrderNumber($data['type']),                                                                                                          
                                                      'user_id' => $data['user_id'], 
                                                      'total' => $data['total'],
                                                      'reference' => $ref,
                                                      'comment' => $data['comment'],
                                                      'status' => 'active'
                                                      ]);
                                                      
                return $ret;
           }
           
           function createOrderDetails($data)
           {
           	$ret = OrderDetails::create(['order_id' => $data['order_id'],                                                                                                          
                                                      'deal_id' => $data['deal_id'], 
                                                      'qty' => $data['qty']
                                                      ]);
                                                      
                return $ret;
           }
           
           function createRating($data)
           {
           	$ret = Ratings::create(['user_id' => $data['user_id'],                                                                                                          
                                                      'deal_id' => $data['deal_id'], 
                                                      'stars' => $data['stars'],
                                                      'status' => $data['status'],
                                                      ]);
                                                      
                return $ret;
           }
           
           function createComment($data)
           {
           	$ret = Comments::create(['user_id' => $data['user_id'],                                                                                                          
                                                      'deal_id' => $data['deal_id'], 
                                                      'comment' => $data['comment'],
                                                      'status' => $data['status'],
                                                      ]);
                                                      
                return $ret;
           }
           
           function createCoupon($data)
           {
           	$ret = Coupons::create(['code' => $data['code'],                                                                                                          
                                                      'discount' => $data['discount'], 
                                                      'status' => $data['status']
                                                      ]);
                                                      
                return $ret;
           }  

           function generateSKU()
           {
           	$ret = "KTK".rand(999,99999)."LD".rand(999,9999);
                                                      
                return $ret;
           }
           
           function generateOrderNumber($type)
           {
           	$tt = '';
               if($tt == 'checkout') $tt = 'CKT'; 
               else if($tt == 'deposit') $tt = 'DPT'; 
           	$ret = $tt.rand(1,999)."KLD".rand(29,4999).rand(date("md"),99999);
                                                      
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
               $cart = Carts::where('user_id',$user->id)->get();
 
              if($cart != null)
               {
               	foreach($cart as $c) 
                    {
                    	$temp = [];
               	     $temp['id'] = $c->id; 
                        $temp['deal'] = $this->getDeal($c->sku);
                        $temp['qty'] = $c->qty; 
                        array_push($ret, $temp); 
                   }
               }                                 
                                                      
                return $ret;
           }		
          function getCartTotals($cart)
           {
           	$ret = ["subtotal" => 0, "delivery" => 0, "total" => 0, "md" => []];
               $md = ['order-id' => $this->generateOrderNumber("checkout"),
                         ];
               $mmd = '';
               
              if($cart != null && count($cart) > 0)
               {           	
               	foreach($cart as $c) 
                    {
                    	$deal = $c['deal'];
                       $amount = $deal['data']['amount'];
               	     $qty = $c['qty']; 
                        $mmd .= $deal['name']." x".$qty."<br>";
               
                        $ret['subtotal'] += ($amount * $qty);
                   }
                   
                   $md["items"] = $mmd;
                   $ret["md"] = $md;
                   $ret['delivery'] = 5000;
                   $ret['total'] = $ret['subtotal'] + $ret['delivery'];
               }                                 
                                                      
                return $ret;
           }	
	       function updateCart($cart, $quantities)
           {
           	#$ret = ["subtotal" => 0, "delivery" => 0, "total" => 0];
              
              if($cart != null && count($cart) > 0)
               {
               	for($c = 0; $c < count($quantities); $c++) 
                    {
                    	$ccc = $cart[$c];
                    	$cc = Carts::where('id', $ccc['id'])->first();
                   
                        if($cc != null)
                        {
                        	$cc->update(['qty' => $quantities[$c] ]);
                        }
                   }
                   
                   return "ok";
               }                                 
                                                      
                return $ret;
           }	
           function removeFromCart($user, $asf)
           {
           	#$ret = ["subtotal" => 0, "delivery" => 0, "total" => 0];
              
              if($user != null)
               {
                    	$cc = Carts::where('user_id', $user->id)
                                       ->where('sku', $asf)->first();
                   
                        if($cc != null)
                        {
                        	$cc->delete();
                        }
                   
                   return "ok";
               }                                 
                                                      
                return $ret;
           }	
           function getDeal($sku)
           {
           	$ret = [];
               $d = Deals::where('sku',$sku)
                             ->orWhere('id',$sku)->first();
 
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
           function getUser($email)
           {
           	$ret = [];
               $u = User::where('email',$email)->first();
 
              if($u != null)
               {
                   	$temp['fname'] = $u->fname; 
                       $temp['lname'] = $u->lname; 
                       $temp['wallet'] = $this->getWallet($u);
                       $temp['phone'] = $u->phone; 
                       $temp['email'] = $u->email; 
                       $temp['role'] = $u->role; 
                       $temp['status'] = $u->status; 
                       $temp['id'] = $u->id; 
                       $temp['date'] = $u->created_at->format("jS F, Y"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	  
           function getShippingDetails($user)
           {
           	$ret = [];
               $sd = ShippingDetails::where('user_id',$user->id)->first();
 
              if($sd != null)
               {
                   	$temp['company'] = $sd->company; 
                       $temp['address'] = $sd->address; 
                       $temp['city'] = $sd->city;
                       $temp['state'] = $sd->state; 
                       $temp['zipcode'] = $sd->zipcode; 
                       $temp['id'] = $sd->id; 
                       $temp['date'] = $sd->created_at->format("jS F, Y"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	  
           
           function updateShippingDetails($user, $data)
           {
           	$sd = ShippingDetails::where('user_id',$user->id)->first();
 
              if($sd != null)
               {
               	   $sd->update(['company' => $data['company'],
                                          'address' => $data['address'],
                                          'city' => $data['city'],
                                          'state' => $data['state'],
                                          'zipcode' => $data['zip']
                      ]);               
               }
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
                       $temp['amount'] = $t->amount; 
                       $temp['type'] = $t->type; 
                       
                       switch($temp['type'])
                       {
                       	case 'paid':
                             $desc = explode(',',$t->description);   
                             $iu = url('invoice').'?on='.$desc[0]; #invoice url
                             $pm = ($desc[1] == 'wallet') ? 'KloudPay Wallet' : 'Credit/debit card'; #payment method 
                             $temp['description'] = 'Paid for order <a href="'.$iu.'" target="_blank">'.$desc[0].'</a> via '.$pm; 
                             $temp['badgeClass'] = 'badge-success'; 
                           break; 
                           
                           case 'refund':
                             $desc = explode(',',$t->description);   
                             $iu = url('invoice').'?on='.$desc[0]; #invoice url
                             $pm = ($desc[1] == 'wallet') ? 'KloudPay Wallet' : 'Credit/debit card'; #payment method 
                             $temp['description'] = 'Refund for order <a href="'.$iu.'" target="_blank">'.$desc[0].'</a> to '.$pm; 
                             $temp['badgeClass'] = 'badge-danger'; 
                           break; 
                           
                           case 'transfer':
                             $u = User::where('id',$t->description)->first();
                             $un = ($u != null) ? $u->username : 'Unknown'; #recipient username
                             $temp['description'] = "Transferred to ".$un."'s KloudPay Wallet"; 
                             $temp['badgeClass'] = 'badge-primary'; 
                           break; 
                           
                           case 'deposit':
                             $temp['description'] = 'Deposited to KloudPay Wallet'; 
                             $temp['badgeClass'] = 'badge-info'; 
                           break; 
                       }
                       
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
                       $u = User::where('id',$t->user_id)->first();
                       $temp['user'] = ($u != null) ? $u->username : 'Unknown'; 
                       $temp['amount'] = $t->amount; 
                       $temp['type'] = $t->type; 
                       
                      switch($type)
                       {
                       	case 'paid':
                             $desc = explode(',',$t->description);   
                             $iu = url('invoice').'?on='.$desc[0]; #invoice url
                             $pm = ($desc[1] == 'wallet') ? 'KloudPay Wallet' : 'Credit/debit card'; #payment method 
                             $temp['description'] = 'Paid for order <a href="'.$iu.'" target="_blank">'.$desc[0].'</a> via '.$pm; 
                             $temp['badgeClass'] = 'badge-success'; 
                           break; 
                           
                           case 'refund':
                             $desc = explode(',',$t->description);   
                             $iu = url('invoice').'?on='.$desc[0]; #invoice url
                             $pm = ($desc[1] == 'wallet') ? 'KloudPay Wallet' : 'Credit/debit card'; #payment method 
                             $temp['description'] = 'Refund for order <a href="'.$iu.'" target="_blank">'.$desc[0].'</a> to '.$pm; 
                             $temp['badgeClass'] = 'badge-danger'; 
                           break; 
                           
                           case 'transfer':
                             $u = User::where('id',$t->description)->first();
                             $un = ($u != null) ? $u->username : 'Unknown'; #recipient username
                             $temp['description'] = "Transferred to ".$un."'s KloudPay Wallet"; 
                             $temp['badgeClass'] = 'badge-primary'; 
                           break; 
                           
                           case 'deposit':
                             $temp['description'] = 'Deposited to KloudPay Wallet'; 
                             $temp['badgeClass'] = 'badge-info'; 
                           break; 
                       }
                       
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
                   	$temp['sku'] = $d->sku; 
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

        function adminGetStats()
           {
           	$ret = ['totalUsers' => User::all()->count(),
                         'totalSales' => 0,
                         'totalDeals' => Deals::all()->count(),
                        ];                                                                                 
                return $ret;
           }			  

           function getHottestDeals()
           {
           	$ret = $this->getDeals("deal");                                                                                 
                return $ret;
           }		
           function getNewArrivals()
           {
           	$ret = $this->getDeals("deal");                                                                                 
                return $ret;
           }		
           function getBestSellers()
           {
           	$ret = $this->getDeals("deal");                                                                                  
                return $ret;
           }		
           function getHotCategories()
           {
           	$ret = $this->getDeals("deal");                                                                                  
                return $ret;
           }

           function getRating($deal,$user)
           {
           	$ret = [];
           	$rating = Ratings::where('deal_id',$deal['id'])
                                      ->where('user_id',$user->id)->first();   
               
                if($rating !== null) 
                {
                	$ret['rating'] = $rating->stars; 
                }       
                return $ret;
           }	
           
           function getComments($deal)
           {
           	$ret = [];
           	$comments = Comments::where('deal_id',$deal['id'])->get();   
               
                if($comments !== null) 
                {
                   foreach($comments as $c)
                   {
                   	if($c->status =="approved")
                       {
                   	   $temp = [];
                      	$temp['id'] = $c->id; 
                          $user = User::where('id',$c->user_id)->first();
                      	$temp['user'] = ($user == null) ? "Anonymous" : $user->fname." ".$user->lname; 
                          $temp['comment'] = $c->comment; 
                          array_push($ret, $temp); 
                       }
                   }
                }       
                return $ret;
           }	

           function getOrders($user)
           {
           	$ret = [];
           	$orders = Orders::where('user_id',$user->id)->get();   
               
                if($orders != null)
               {
               	foreach($orders as $o)
                   {
                   	$temp = [];
                   	$temp['id'] = $o->id; 
                   	$temp['number'] = $o->number; 
                       $temp['status'] = $o->status; 
                       $temp['amount'] = $o->total; 
                       array_push($ret, $temp); 
                   }
               }       
                return $ret;
           }
           
           function addOrder($user,$data)
           {
           	$cart = $this->getCart($user);
               
           	$order = $this->createOrder($data);
               
               #create order details
               foreach($cart as $c)
               {
               	$dt = [];
                   $dt['order_id'] = $order->id; 
                   $dt['deal_id'] = $c['deal']['id']; 
                   $dt['qty'] = $c['qty'];
                   
                   $od = $this->createOrderDetails($dt);
                                     
               }
               
               #add transaction 
                   $tdt = [];
                   $tdt['type'] = $data['transaction-type'];
                   $tdt['description'] = ($tdt['type']  == 'paid' || $tdt['type'] == 'refund') ? $order->number.','.$data['transaction-description'] : $data['transaction-description'];                   
                   $tdt['user_id'] = $user->id;
                   $tdt['amount'] = $data['total'];
                   $this->createTransaction($tdt); 
               
           }

           function getInvoice($on)
           {
           	$ret = [];
           	$order = Orders::where('id',$on)
                                    ->orWhere('number',$on)->first();   
               $orderDetails = OrderDetails::where('order_id',$order->id)->get();   
               
                if($order != null && $orderDetails != null)
               {
               	$ret['id'] = $order->id; 
                   	$ret['number'] = $order->number; 
                       $ret['status'] = $order->status; 
                       $ret['amount'] = $order->amount;                        
                       $ret['date'] = $order->created_at->format("jS F, Y"); 
                       $ret['order-details'] = [];
                       
               	foreach($orderDetails as $od)
                   {
                   	$temp = [];
                   	$temp['id'] = $od->id; 
                   	$temp['deal'] = $this->getDeal($od->deal_id);
                        $temp['qty'] = $od->qty; 
                       array_push($ret['order-details'], $temp); 
                   }
               }      
                $ret['totals'] = $this->getCartTotals($ret['order-details']);
                return $ret;
           }

           function getUserInvoice($user, $on)
           {
           	$ret = [];
           	$order = Orders::where('number',$on)
                                   ->where('user_id',$user->id)->first();   
               
                if($order != null)
               {
               	$ret = $this->getInvoice($on); 
               }       
                return $ret;
           }		  			  	   
           
           function fundWallet($data)
           {
           	$account = User::where('email',$data['email'])->first();
               
               if($account != null)
               {
               	$wallet = Wallet::where('user_id',$account->id)->first();
                   $formerBalance = $wallet->balance; 
                   $newBalance = 0;
                   
                   switch($data['type'])
                   {
                   	case "add":
                         $newBalance = $formerBalance + $data['amount'];
                       break; 
                       
                       case "remove":
                         $newBalance = $formerBalance - $data['amount'];
                       break; 
                       
                       default:
                         $newBalance = $formerBalance;
                       break; 
                  }
                  
                  $wallet->update(['balance' => $newBalance]);
              }
          
                return "ok";
           }		
           
           function transferFunds($user, $data)
           {
           	$receiver = User::where('phone',$data['phone'])
                                     ->orWhere('email',$data['phone'])->first();
               
               if($receiver != null)
               {
               	//debit the giver
               	$userData = ['email' => $user->email,
                                     'type' => 'remove',
                                     'amount' => $data['amount']
                                    ];
                                    
                   //credit the receiver
                   $receiverData = ['email' => $receiver->email,
                                     'type' => 'add',
                                     'amount' => $data['amount']
                                    ];
                                    
               	$this->fundWallet($userData);
                   $this->fundWallet($receiverData);
              }
          
                return "ok";
           }		
           
           function checkout($user, $data, $type)
           {
               switch($type){
               	case "kloudpay":
                 	$ret = $this->payWithKloudPay($user, $data);
                   break; 
                   
                   case "paystack":
                 	$ret = $this->payWithPayStack($user, $data);
                   break; 
              }           
             
                return $ret;
           }

 		  function payWithKloudPay($user, $data)
           {                     
              if(isset($data['ssa']) && $data['ssa'] == "on"){
               	$this->updateShippingDetails($user, $data);
              }
              
             # dd($data);
           	$wallet = $this->getWallet($user); 
               $amount = $data['amount'] / 100;
               
               if($wallet['balance'] >= $amount)
               {
               	#deduct funds from wallet, create order
                   //debit the user
                   $userData = ['email' => $user->email,
                                     'type' => 'remove',
                                     'amount' => $amount
                                    ];
                   $this->fundWallet($userData);
                   
                   #create order
                   $data['total'] = $amount;
                   $data['user_id'] = $user->id;
                   $data['transaction-type'] = "paid";
                   $data['transaction-description'] = "wallet";
                   $this->addOrder($user,$data);
                   return "ok";
               }
               else
               {
               	return "error";
               }                                      	                         
           }
           
           function payWithPayStack($user, $payStackResponse)
           { 
              $md = $payStackResponse['metadata'];
              $amount = $payStackResponse['amount'] / 100;
              $ref = $payStackResponse['reference'];
              $type = $md['type'];
              $ssa = $md['ssa'];
              
              if($ssa == "on") $this->updateShippingDetails($user, $md);
              $dt = [];
              
              if($type == "checkout"){
               	$dt['comment'] = $md['comment'];
                   $dt['reference'] = $ref;
                   $dt['transaction-type'] = "paid";
                   $dt['transaction-description'] = "card";
              }
              else if($type == "kloudpay"){
               	//credit the user
                   $userData = ['email' => $user->email,
                                     'type' => 'add',
                                     'amount' => $amount
                                    ];
                   $this->fundWallet($userData);
                   $dt['transaction-type'] = "deposit";
              }
              
              $dt['user_id'] = $user->id;
              $dt['total'] = $amount;
              $dt['type'] = "checkout";
              
              #dd($payStackResponse);
              #create order

              $this->addOrder($user,$dt);
                return "ok";
           }
}
?>
