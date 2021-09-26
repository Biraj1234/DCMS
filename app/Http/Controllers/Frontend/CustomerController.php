<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends FrontBaseController
{
    protected $panel='Customer';  //for section/moudule
    protected $folder='frontend.customer.'; //for view file
    protected $base_route='frontend.customer.'; //for route method
    protected $folder_name='customer'; //for route method
    protected $title;
    protected $model='Customer';

    function __construct(){
        $this->model=new Customer();

    }


    public function index(){

    }


    public function create()
    {
//        dd('hello');
        $this->title='Create';
        return view($this->__loadDataToView($this->folder.'create'));
    }

    public function store(Request $request){
//        dd($request->all());
        $request->request->add(['password'=>Hash::make($request->input('password'))]);
        $data['row']=$this->model->create($request->all());
        if($data['row']) {
            $request->session()->flash('success',$this->panel.' successfully created');
        }
        else{
            $request->session()->flash('error','Error in creating'.$this->panel);
        }
        return redirect()->route('customer.create');
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
        //
    }
}
