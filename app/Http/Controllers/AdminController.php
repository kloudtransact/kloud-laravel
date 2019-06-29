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
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('admin?return=cobra');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$transactions = $this->helpers->adminGetTransactions();
		$deals = $this->helpers->adminGetDeals();
		$auctions = $this->helpers->adminGetAuctions();
		$adminStats = $this->helpers->adminGetStats();
		$adminRecentOrders = $this->helpers->adminGetOrders();
		$adminRecentTransactions = $this->helpers->adminGetTransactions();
    	return view('admin.index',compact(['user','c','signals','transactions','deals','auctions','adminStats','adminRecentOrders','adminRecentTransactions']));
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
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$users = $this->helpers->adminGetUsers();
    	return view('admin.users',compact(['users','user','c','signals']));
    }	
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getUser(Request $request)
    {
       $user = null;
       $account = null; 
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
            $req = $request->all();
           //dd($req);
          $em = (isset($req['email'])) ? $req['email'] : null; 
           
         $c = $this->helpers->categories;
         $signals = $this->helpers->signals;
		$account = $this->helpers->getUser($em); 
    	return view('admin.user',compact(['account','user','c','signals']));
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
    }	
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postUser(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'fname' => 'required',
                             'lname' => 'required',
                             'email' => 'required',
                             'phone' => 'required',
                             'role' => 'required|not_in:none',
                             'status' => 'required|not_in:none',
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
             $this->helpers->updateUser($req);
	        session()->flash("cobra-user-status","ok");
			return redirect()->intended('cobra-users');
         }        
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
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$deals = $this->helpers->adminGetDeals();
    	return view('admin.deals',compact(['user','c','signals','deals']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDeal(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$req = $request->all();
           //dd($req);
        $sku = (isset($req['sku'])) ? $req['sku'] : null; 
        
        if($sku == null) 
        {
        	session()->flash("cobra-deal-status","error");
            return redirect()->intended('cobra-deals');
        }
        else
        {
        	$deal = $this->helpers->adminGetDeal($sku);
    	    return view('admin.deal',compact(['user','c','deal']));
        }
		
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
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		#$deals = $this->helpers->adminGetDeals();
    	return view('admin.add-deal',compact(['user','c']));
    }
    
       /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postDeal(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'name' => 'required',
                             'sku' => 'required',
                            # 'type' => 'required',
                             'category' => 'required|not_in:none',
                             'description' => 'required',
                             'amount' => 'required|numeric',
                             'in_stock' => 'required|not_in:none',
                             'status' => 'required|not_in:none',
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
             $this->helpers->updateDeal($req);
	        session()->flash("cobra-deal-status","ok");
			return redirect()->intended('cobra-deals');
         }        
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
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
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
	        session()->flash("add-deal-status","ok");
			return redirect()->intended('cobra-deals');
         }        
    }
    
     /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getFundWallet(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');	

            $req = $request->all();
            $em = (isset($req['xf'])) ? $req['xf'] : ""; 
		    $c = $this->helpers->categories;
		   
       	return view('admin.fund-wallet',compact(['user','c','em']));	
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postFundWallet(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'xf' => 'required',
                             'type' => 'required',
                             'amount' => 'required|numeric'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	$req["email"] = $req["xf"]; 
             $this->helpers->fundWallet($req);
	        session()->flash("fund-wallet-status","ok");
			return redirect()->intended('cobra-users');
         }        
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
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$auctions = $this->helpers->adminGetAuctions();
    	return view('admin.auctions',compact(['user','c','signals','auctions']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAuction()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$auction = null;
    	return view('admin.auction',compact(['user','c','auctions']));
    }
    
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAddAuction()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		
    	return view('admin.add-auction',compact(['user','c']));
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
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$transactions = $this->helpers->adminGetTransactions();
    	return view('admin.transactions',compact(['user','c','transactions']));
    }

    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getInvoice()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$invoice = null; 
    	return view('admin.invoice',compact(['user','c','invoice']));
    }


    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getOrders()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$orders = $this->helpers->adminGetOrders(); 
    	return view('admin.orders',compact(['user','c','signals','orders']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getOrder(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
			$validator = Validator::make($req, [
                             'on' => 'required',
             ]);
         
            if($validator->fails())
             {
                #$messages = $validator->messages();
                return redirect()->intended('cobra-orders');
            }
		$c = $this->helpers->categories;
		$order = $this->helpers->adminGetOrder($req['on']); 
    	return view('admin.order',compact(['user','c','order']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postOrder(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'email' => 'required',
                             'type' => 'required',
                             'amount' => 'required|numeric'
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
             $this->helpers->fundWallet($req);
	        session()->flash("fund-wallet-status","ok");
			return redirect()->intended('cobra-users');
         }        
    }
    

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getRC()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$ratings = $this->helpers->adminGetRatings();
		$comments = $this->helpers->adminGetComments();
    	return view('admin.rc',compact(['user','c','signals','ratings','comments']));
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAddCoupon()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
    	return view('admin.add-coupon',compact(['user','c']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCoupon()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
    	return view('admin.coupon',compact(['user','c']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCoupons()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
    	return view('admin.coupons',compact(['user','c','signals']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getComments()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
    	return view('admin.comments',compact(['user','c','signals']));
    }
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getComment()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
    	return view('admin.comment',compact(['user','c']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getWithdrawals()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$withdrawals = $this->helpers->getWithdrawals();
		$signals = $this->helpers->signals;
    	return view('admin.withdrawals',compact(['user','c','withdrawals','signals']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function getApproveWithdrawal(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'ff' => 'required'
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
             $ret = $this->helpers->approveWithdrawal($req);
	        session()->flash("cobra-approve-withdrawal-status",$ret);
			return redirect()->intended('cobra-withdrawals');
         }        
    }

    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function getApproveRating(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'ax' => 'required',
							 'id' => 'required'
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
             $ret = $this->helpers->approveWithdrawal($req);
	        session()->flash("cobra-approve-withdrawal-status",$ret);
			return redirect()->intended('cobra-withdrawals');
         }        
    }
    
    

}
