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
		
    	return view('index',compact(['user','c']));
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
		$bundleProducts = $this->helpers->getDeals("bundle",$req['q']);
		if(isset($req['q']))
		{
			$category = $this->helpers->categories[$req['q']];
		}       
		$c = $this->helpers->categories;
		$mainClass = "amado_product_area section-padding-100 clearfix";
		
    	return view('bundle',compact(['user','category','c','mainClass']));
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
		
		if(isset($req['q']))
		{
			$category = $this->helpers->categories[$req['q']];
		}       
		$c = $this->helpers->categories;
		$mainClass = "amado_product_area section-padding-100 clearfix";
    	return view('auction',compact(['user','category','c','mainClass']));
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
		
		if(isset($req['q']))
		{
			$category = $this->helpers->categories[$req['q']];
		}       
		$c = $this->helpers->categories;
		$mainClass = "amado_product_area section-padding-100 clearfix";
    	return view('top-deals',compact(['user','category','c','mainClass']));
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
		
		if(isset($req['q']))
		{
			$category = $this->helpers->categories[$req['q']];
		}       
		$c = $this->helpers->categories;
		$mainClass = "amado_product_area section-padding-100 clearfix";
    	return view('deals',compact(['user','category','c','mainClass']));
    }	
	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCart()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {    
        	return redirect()->intended('login?return=cart');
        }
		$mainClass = "cart-table-area section-padding-100";
        return view('cart',compact(['user','mainClass']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCheckout()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('login?return=checkout');
        }
        
		$mainClass = "cart-table-area section-padding-100";
        return view('checkout',compact(['user','mainClass']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDeal()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		$mainClass = "single-product-area section-padding-100 clearfix";
        return view('deal',compact(['user','mainClass']));
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
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('login?return=kloudpay');
        }
        return view('kloudpay',compact(['user']));
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
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
		
		//$bf = $this->helpers->getBankDetails($user->id);
        return view('dashboard',compact(['user']));
    }
    
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTransactions()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('login?return=transactions');
        }
		
		//$transactions = $this->helpers->getTransactions($user->id);
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
