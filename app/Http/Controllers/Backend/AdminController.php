<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends BackendBaseController
{
    protected $panel='Admin';  //for section/moudule
    protected $folder='backend.admin.'; //for view file
    protected $base_route='backend.admin.'; //for route method
    protected $title;
    protected $model='User';

    function __construct()
    {
        $this->model=new User();

    }

    public function index()
    {
        $this->title='List';
        $data['rows']=$this->model->all();
        return view($this->__loadDataToView($this->folder.'index'),compact('data'));

    }


    public function create(){
        $this->title='Create';
        return view($this->__loadDataToView($this->folder.'create'));
    }


    public function store(AdminRequest $request)
    {
//        dd($request->all());
        $file=$request->file('profile_name');
        $fileName = time().'.'.$file->getClientOriginalName();
        //dd($fileName);
        $file->move(public_path('uploads'),$fileName);
        $request->request->add(['profile_picture'=>$fileName]);

        $request->request->add(['password'=>Hash::make($request->input('password'))]);

        $data['row']=$this->model->create($request->all());
        if($data['row'])
        {
            $request->session()->flash('success',$this->panel.' successfully created');
        }
        else
        {
            $request->session()->flash('error','Error in creating'.$this->panel);
        }
        return redirect()->route($this->base_route.'index');
    }


    public function show($id)
    {

        $data['row']=$this->model->find($id);
        if(!$data['row'])
        {
            request()->session()->flash('error','Record not found in '.$this->panel);
            return redirect()->route($this->base_route.'index');
        }
        $this->title='View';
        return view($this->__loadDataToView($this->folder.'show'),compact('data'));

    }


    public function edit($id)
    {

        $this->title='Edit';
        $data['row']=$this->model->find($id);
        return view($this->__loadDataToView($this->folder.'edit'),compact('data'));

    }


    public function update(Request $request, $id)
    {

        $data['row']=$this->model->find($id);


        $data['row']->update($request->all());
        if($data['row'])
        {
            $request->session()->flash('success',$this->panel.' successfully updated');
        }
        else
        {
            $request->session()->flash('error','Error in updating'.$this->panel);
        }
        return redirect()->route($this->base_route.'index');
    }


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
