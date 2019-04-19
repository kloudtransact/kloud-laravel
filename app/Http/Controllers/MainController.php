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
		
		if(Auth::check())
		{
			$user = Auth::user();		
		}
		$c = $this->helpers->categories;
		$hd = $this->helpers->getHottestDeals();
		$na = $this->helpers->getNewArrivals();
		$bs = $this->helpers->getBestSellers();
		$hc = $this->helpers->getHotCategories();
		
    	return view('index',compact(['user','c','hd','na','bs','hc']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAbout()
    {
               $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		$c = $this->helpers->categories;
    	return view('about',compact(['user','c']));
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
		
		if(Auth::check())
		{
			$user = Auth::user();
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
		
    	return view('bundle',compact(['user','bundleProducts','category','c','mainClass']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAuction(Request $request)
    {
               $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
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
    	return view('auction',compact(['user','auction','category','c','mainClass']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTopDeals(Request $request)
    {
               $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
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
    	return view('top-deals',compact(['user','category','topDeals','c','mainClass']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDeals(Request $request)
    {
               $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
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
    	return view('deals',compact(['user','category','deals','c','mainClass']));
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
			#$cart = $this->helpers->getCart($user);
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
	public function getCheckout()
    {
		       $user = null;
		       $cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			#$cart = $this->helpers->getCart($user);
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
		
		if(Auth::check())
		{
			$user = Auth::user();
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
             $category = $this->helpers->categories[$deal['category']];
		     $mainClass = "single-product-area section-padding-100 clearfix";
             return view('deal',compact(['user','category','deal','mainClass']));
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
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
        return view('airtime',compact(['user']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getHotels()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
        return view('hotels',compact(['user']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTravelStart()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
        return view('travelstart',compact(['user']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getKloudPay()
    {
		       $user = null;
		       $wallet = [];
		if(Auth::check())
		{
			$user = Auth::user();
			#$wallet = $this->helpers->getWallet($user);
		}
		else
        {
        	return redirect()->intended('login?return=kloudpay');
        }
        return view('kloudpay',compact(['user','wallet']));
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
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
        return view('faq',compact(['user']));
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
		
		if(Auth::check())
		{
			$user = Auth::user();
			//$dashboard = $this->helpers->getDashboard($user);
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
		
		
        return view('dashboard',compact(['user','dashboard']));
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
		
		if(Auth::check())
		{
			$user = Auth::user();
			//$transactions = $this->helpers->getTransactions($user);
		}
		else
        {
        	return redirect()->intended('login?return=transactions');
        }
		
        return view('transactions',compact(['user']));
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
