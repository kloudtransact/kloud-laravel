<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 
use Paystack; 

class PaymentController extends Controller {

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
    public function postRedirectToGateway(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
        
        return Paystack::getAuthorizationUrl()->redirectNow();
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getPaymentCallback()
    {
		if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
		
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
    }
    
    
}