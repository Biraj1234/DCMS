<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Costume;
use App\Models\Size;
use Illuminate\Http\Request;

class DashboardController extends BackendBaseController
{
    protected $panel='Dashboard';  //for section/moudule
    protected $folder='backend.dashboard.'; //for view file
    protected $base_route='backend.dashboard.'; //for route method
    protected $title;
    protected $model='Size';



    public function index()
    {
        $data['costumes'] = Costume::count();
        return view($this->__loadDataToView($this->folder.'index'),compact('data'));

    }


    public function create(){
        $this->title='Create';
        return view($this->__loadDataToView($this->folder.'create'));
    }


    public function store(Request $request)
    {
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
