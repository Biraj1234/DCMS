<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index(Request $request){
//        dd($request->all());
        $data['customer_id'] = $request->customer_id;
        $data['booking_id'] = $request->booking_id;
        $data['costume_id'] = $request->costume_id;
        $data['net_amount'] = $request->net_amount;
//        dd($data);
        return view('frontend.stripe.index',compact('data'));
    }

    public function stripePayment(Request $request){

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $data = \Stripe\Charge::create([
            "amount" => $request->net_amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => 'Customer Name:' . Auth::guard('customer')->user()->fname,
        ]);

        $payment =[];
        $payment['customer_id']=$request->customer_id;
        $payment['amount']=$request->net_amount;
        $payment['payment_date']=Carbon::now();
        Payment::create($payment);

        $booking_id = $request->booking_id;
//       Booking::update(['order_status'=>'1']);
        Booking::where('id',$booking_id)->update(array('order_status'=>'1'));

        Session::flash("success", "Payment successfully made");
        return back();


    }
}
