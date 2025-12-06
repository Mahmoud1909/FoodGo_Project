<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RestaurantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
	  public function index()
    {
        Log::info('🍽️ Restaurants index page accessed', [
            'user_id' => auth()->id(),
            'timestamp' => now()->toDateTimeString()
        ]);

        return view("restaurants.index");
    }

    public function log(Request $request)
    {
        $level = $request->input('level', 'info');
        $message = $request->input('message', '');
        $data = $request->input('data', []);

        $logMessage = '🌐 [JS] ' . $message;
        if (!empty($data)) {
            $logMessage .= ' | Data: ' . json_encode($data);
        }

        switch ($level) {
            case 'error':
                Log::error($logMessage);
                break;
            case 'warning':
                Log::warning($logMessage);
                break;
            case 'debug':
                Log::debug($logMessage);
                break;
            default:
                Log::info($logMessage);
        }

        return response()->json(['success' => true]);
    }

    public function vendors()
    {
        return view("vendors.index");
    }


    public function edit($id)
    {
    	    return view('restaurants.edit')->with('id',$id);
    }

    public function vendorEdit($id)
    {
    	    return view('vendors.edit')->with('id',$id);
    }

    public function vendorSubscriptionPlanHistory($id='')
    {
    	    return view('subscription_plans.history')->with('id',$id);
    }

    public function view($id)
    {
        return view('restaurants.view')->with('id',$id);
    }

    public function plan($id)
    {

        return view("restaurants.plan")->with('id',$id);
    }

    public function payout($id)
    {
        return view('restaurants.payout')->with('id',$id);
    }

    public function foods($id)
    {
        return view('restaurants.foods')->with('id',$id);
    }

    public function orders($id)
    {
        return view('restaurants.orders')->with('id',$id);
    }

    public function reviews($id)
    {
        return view('restaurants.reviews')->with('id',$id);
    }

    public function promos($id)
    {
        return view('restaurants.promos')->with('id',$id);
    }

    public function vendorCreate(){
        return view('vendors.create');
    }

    public function create(){
        return view('restaurants.create');
    }

    public function DocumentList($id){
        return view("vendors.document_list")->with('id',$id);
    }

    public function DocumentUpload($vendorId, $id)
    {
        return view("vendors.document_upload", compact('vendorId', 'id'));
    }
    public function currentSubscriberList($id)
    {
        return view("subscription_plans.current_subscriber", compact( 'id'));
    }
    public function vendorChat($id)
    {
        return view("vendors.chat", compact( 'id'));
    }
}
