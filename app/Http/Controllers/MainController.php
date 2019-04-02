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
		
    	return view('index',compact(['user']));
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
		
    	//return view('about');
		return redirect()->intended('/');
    }	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getServices()
    {
               $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
    	return view('services',compact(['user']));
    }	
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getInternational()
    {
               $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		
    	return redirect()->intended('/');
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCorporate()
    {
               $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		
    	return redirect()->intended('/');
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCreditCards()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
    	return redirect()->intended('/');
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getContact()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
        return view('contact',compact(['user']));
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
        	return redirect()->intended('/');
        }
		
		$bankDetails = $this->helpers->getBankDetails($user->id);
        return view('dashboard',compact(['user','bankDetails']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAddAccount()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
		
		$bankDetails = $this->helpers->getBankDetails($user->id);
        return view('add-account',compact(['user','bankDetails']));
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
