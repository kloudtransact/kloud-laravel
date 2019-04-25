<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 

class AdminController extends Controller {

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
            if($user->role != "admin") return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$transactions = $this->helpers->adminGetTransactions();
		$deals = $this->helpers->adminGetDeals();
		$auctions = $this->helpers->adminGetAuctions();
		$adminStats = $this->helpers->adminGetStats();
		$totalUsers = $adminStats['totalUsers'];
		$totalSales= $adminStats['totalSales'];
		$totalDeals = $adminStats['totalDeals'];
    	return view('admin-index',compact(['user','c','transactions','deals','auctions','totalSales','totalUsers','totalDeals']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getUsers()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if($user->role != "admin") return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$users = $this->helpers->adminGetUsers();
    	return view('admin-users',compact(['users','user','c']));
    }	
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDeals()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if($user->role != "admin") return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$deals = $this->helpers->adminGetDeals();
    	return view('admin-deals',compact(['user','c','deals']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAuctions()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if($user->role != "admin") return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$auctions = $this->helpers->adminGetAuctions();
    	return view('admin-auctions',compact(['user','c','auctions']));
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
            if($user->role != "admin") return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$transactions = $this->helpers->adminGetTransactions();
    	return view('admin-transactions',compact(['user','c','transactions']));
    }

    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAddDeal()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if($user->role != "admin") return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
    	return view('admin-add-deal',compact(['user','c']));
    }


    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postAddDeal(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if($user->role != "admin") return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'name' => 'required',
                             'type' => 'required',
                             'category' => 'required',
                             'description' => 'required',
                             'amount' => 'required|numeric',
                             'images' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	#$req["user_id"] = $user->id; 
             $this->helpers->createDeal($req);
	        Session::flash("add-deal-status","ok");
			return redirect()->intended('cobra-deals');
         }        
    }

}
