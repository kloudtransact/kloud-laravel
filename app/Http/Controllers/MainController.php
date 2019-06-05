<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 

class MainController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;                     
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
    {
       $user = null;
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$c = $this->helpers->categories;
		$hd = $this->helpers->getHottestDeals();
		$na = $this->helpers->getNewArrivals();
		$bs = $this->helpers->getBestSellers();
		$hc = $this->helpers->getHotCategories();
		
    	return view('index',compact(['user','cart','c','hd','na','bs','hc']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAbout()
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		$c = $this->helpers->categories;
    	return view('about',compact(['user','cart', 'c']));
		//return redirect()->intended('/');
    }	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getBundle(Request $request)
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$req = $request->all();
		$category = "";
		$bundleProducts = [];
		if(isset($req['q']))
		{
			$bundleProducts = $this->helpers->getDeals("bundle",$req['q']);
			$category = $this->helpers->categories[$req['q']];
		} 
        else
        {
        	$bundleProducts = $this->helpers->getDeals("bundle");
        }     
		$c = $this->helpers->categories;
		$mainClass = "amado_product_area section-padding-100 clearfix";
		
    	return view('bundle',compact(['user','cart','bundleProducts','category','c','mainClass']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAuction(Request $request)
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$req = $request->all();
		$category = "";
		$auction = [];
		if(isset($req['q']))
		{
			$auction = $this->helpers->getDeals("auction",$req['q']);
			$category = $this->helpers->categories[$req['q']];
		} 
        else
        {
        	$auction = $this->helpers->getDeals("auction");
        }     
		$c = $this->helpers->categories;
		$mainClass = "amado_product_area section-padding-100 clearfix";
    	return view('auction',compact(['user','cart','auction','category','c','mainClass']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTopDeals(Request $request)
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$req = $request->all();
		$category = "";
		$topDeals = [];
		
		if(isset($req['q']))
		{
			$topDeals = $this->helpers->getDeals("deal",$req['q']);
			$category = $this->helpers->categories[$req['q']];
		} 
        else
        {
        	$topDeals = $this->helpers->getDeals("deal");
        }     
		$c = $this->helpers->categories;
		$mainClass = "amado_product_area section-padding-100 clearfix";
    	return view('top-deals',compact(['user','cart','category','topDeals','c','mainClass']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDeals(Request $request)
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$req = $request->all();
		$category = "";
		$deals = [];
		
		if(isset($req['q']))
		{
			$deals = $this->helpers->getDeals("deal",$req['q']);
			$category = $this->helpers->categories[$req['q']];
		} 
        else
        {
        	$deals = $this->helpers->getDeals("deal");
        }     
		$c = $this->helpers->categories;
		$mainClass = "amado_product_area section-padding-100 clearfix";
    	return view('deals',compact(['user','cart','category','deals','c','mainClass']));
    }	
	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCart()
    {
      $user = null;
	  $cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		else
        {    
        	return redirect()->intended('login?return=cart');
        }
		$mainClass = "cart-table-area section-padding-100";
        return view('cart',compact(['user','cart','mainClass']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function getAddToCart(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'qty' => 'required|numeric',
                             'sku' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	$req["user_id"] = $user->id; 
             $this->helpers->addToCart($req);
	        Session::flash("add-to-cart-status","ok");
			return redirect()->intended('cart');
         }        
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCheckout()
    {
		       $user = null;
		       $cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		else
        {
        	return redirect()->intended('login?return=checkout');
        }
        
		$mainClass = "cart-table-area section-padding-100";
        return view('checkout',compact(['user','cart','mainClass']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDeal(Request $request)
    {
		       $user = null;
		       $deal = [];
		       $req = $request->all();
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$validator = Validator::make($req, [
                             'sku' => 'required',
         ]);
         
         if($validator->fails())
         {
             #$messages = $validator->messages();
             return redirect()->intended('deals');
         }
         
         else
         {
         	$deal = $this->helpers->getDeal($req['sku']);
             $rating = $this->helpers->getRating($deal,$user);
             $comments = $this->helpers->getComments($deal);
             $category = $this->helpers->categories[$deal['category']];
		     $mainClass = "single-product-area section-padding-100 clearfix";
             return view('deal',compact(['user','cart','category','deal','rating','comments', 'mainClass']));
         }        
		
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAirtime()
    {
		       $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
        return view('airtime',compact(['user','cart']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getHotels()
    {
		       $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
        return view('hotels',compact(['user','cart']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTravelStart()
    {
		       $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
        return view('travelstart',compact(['user','cart']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getWallet()
    {
		       $user = null;
		       $wallet = [];
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
			#$wallet = $this->helpers->getWallet($user);
		}
		
		else
        {
        	return redirect()->intended('login?return=wallet');
        }
        return view('wallet',compact(['user','cart','wallet']));
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getKloudPayDeposit()
    {
		       $user = null;
		       $wallet = [];
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
			#$wallet = $this->helpers->getWallet($user);
		}
		else
        {
        	return redirect()->intended('login?return=deposit');
        }
        return view('kloudpay-deposit',compact(['user','cart','wallet']));
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getOrders()
    {
		       $user = null;
		       $orders = [];
		       $cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$orders = $this->helpers->getOrders($user);
			$cart = $this->helpers->getCart($user);
		}
		else
        {
        	return redirect()->intended('login?return=orders');
        }
        return view('orders',compact(['user','cart','orders']));
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getInvoice(Request $request)
    {
		       $user = null;
		       $invoice = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
			$req = $request->all();
			$validator = Validator::make($req, [
                             'on' => 'required',
             ]);
         
            if($validator->fails())
             {
                #$messages = $validator->messages();
                return redirect()->intended('orders');
            }
            else
            {
                $invoice = $this->helpers->getUserInvoice($user,$on);
                if($invoice == []):
                  $alert = true; 
                  $alertClass = "warning";
                  $alertText = "Invalid order number. Please check the number and try again.";
                endif; 
                return view('invoice',compact(['user','invoice','alert', 'alertClass','AlertText']));
            }         
		}
		else
        {
        	return redirect()->intended('login?return=orders');
        }
        
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getEnterprise()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		$mainClass = "cart-table-area section-padding-100";
        return view('enterprise',compact(['user','mainClass']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getFAQ()
    {
		       $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
        return view('faq',compact(['user','cart']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDashboard()
    {
		       $user = null;
		       $dashboard = [];
		       $cart = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
			//$dashboard = $this->helpers->getDashboard($user);
			$transactions = $this->helpers->getTransactions($user);
			$cart = $this->helpers->getCart($user);
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
		
		
        return view('dashboard',compact(['user','cart','transactions']));
    }
    
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTransactions()
    {
		       $user = null;
		       $transactions = [];
		       $cart = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
			$transactions = $this->helpers->getTransactions($user);
			$cart = $this->helpers->getCart($user);
		}
		else
        {
        	return redirect()->intended('login?return=transactions');
        }
		
        return view('transactions',compact(['user','cart','transactions']));
    }
    
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postAddAccount(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'initial_balance' => 'required',
                             'account_number' => 'required',
                             'last_deposit_name' => 'required',
                             'last_deposit' => 'required',
                             'balance' => 'required',
                             'address' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	$req["user_id"] = $user->id; 
             $this->helpers->createBankAccount($req);
	        Session::flash("add-account-status","ok");
			return redirect()->intended('dashboard');
         }        
    }
	
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getZoho()
    {
        $ret = "1535561942737";
    	return $ret;
    }


}
