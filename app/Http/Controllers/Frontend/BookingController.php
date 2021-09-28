<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BookingController extends FrontBaseController
{
    protected $panel='Booking';  //for section/moudule
    protected $folder='frontend.customer.'; //for view file
    protected $base_route='frontend.customer.'; //for route method
    protected $folder_name='customer'; //for route method
    protected $title;
    protected $model='Booking';

    function __construct(){
        $this->model=new Booking();

    }


    public function index(){
        $this->title='List';
        $data['rows']=$this->model->all();
//        dd($data['rows']);
        return view($this->__loadDataToView($this->folder.'index'),compact('data'));

    }


    public function create()
    {
//        dd('hello');
        $this->title='Create';
        return view($this->__loadDataToView($this->folder.'create'));
    }

    public function store(BookingRequest $request){
//        dd($request->all());
        if(isset(Auth::guard('customer')->user()->id)){
                $bookingDetails=[];
                $bookingDetails['costume_id']=$request->product_id;
                $qty = $request->qty;
                $bookingDetails['quantity']=$qty;
                $size = $request->size;
                $bookingDetails['size']=$size;
                $bookingDetails['price']=$request->price;
                $bookingDetails['total_price']=$bookingDetails['price'] * $qty;
//                dd($bookingDetails);

                if($details = BookingDetail::create($bookingDetails)){
                    $bookingData=[];
                    $bookingData['customer_id']=Auth::guard('customer')->user()->id;
                    $bookingData['order_code']=uniqid();
                    $bookingData['booking_date']=date('Y-m-d H:i:s');
                    $bookingData['booking_details_id']=$details->id;
                    Booking::create($bookingData);
                }
                $request->session()->flash('success','Your booking is successfull');
                return redirect()->route('customer.home');
            }
        else{
            $request->session()->flash('error','Please login to book your costume!');
            return redirect()->route('customer.login');
        }

    }


    public function show($id){
        //
    }


    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['row']=$this->model->find($id);
        $data['row']->delete();
        if($data['row'])
        {
            request()->session()->flash('success',$this->panel.' successfully deleted');
        }
        else
        {
            request()->session()->flash('error','Error in deleting'.$this->panel);
        }
        return redirect()->route($this->base_route.'index');
    }
}
