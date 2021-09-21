<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\CostumeRequest;
use App\Models\Costume;
use App\Models\CostumeImages;
use App\Models\CostumeType;
use App\Models\RoomImage;
use App\Models\Size;
use Illuminate\Http\Request;

class CostumeController extends BackendBaseController
{
    protected $panel='Costume';  //for section/moudule
    protected $folder='backend.costume.'; //for view file
    protected $base_route='backend.costume.'; //for route method
    protected $folder_name='costume';
    protected $title;
    protected $model='Costume';

    function __construct()
    {
        parent::__construct();
        $this->model=new Costume();

    }

    public function index()
    {
        $this->title='List';
        $data['rows']=$this->model->all();
        return view($this->__loadDataToView($this->folder.'index'),compact('data'));

    }


    public function create(){
        $data['costume_size'] = Size::pluck('short_form','id');
        $data['type'] = CostumeType::pluck('name','id');
        $this->title='Create';
        return view($this->__loadDataToView($this->folder.'create'),compact('data'));
    }


    public function store(CostumeRequest $request)
    {

        $file=$request->file('costume_photo');
        $request->request->add(['created_by'=>auth()->user()->id]);
        $data['row']=$this->model->create($request->all());
        if($data['row']) {
            if($request->hasFile('costume_photo')){
                $image=$this->uploadImage($request,'costume_photo');
                $imageArray['name']=$image;
                $request->request->add(['image'=>$image]);
            }
            $imageArray['costume_id']=$data['row']->id;
            CostumeImages::create($imageArray);
            $request->session()->flash('success',$this->panel.' successfully created');
        }
        else
        {
            $request->session()->flash('error','Error in creating'.$this->panel);
        }
        return redirect()->route($this->base_route.'index');
    }



    public function update(Request $request, $id)
    {
        $data['row'] = $this->model->find($id);
        if ($data['row']) {
            if ($request->hasFile('costume_photo')) {
                if ($data['row']->images()->first()) {
                    if ($data['row']->images()->count() > 0) {
                        $this->deleteImage($data['row']->images()->first()->name);
                    }
                    $data['row']->images()->first()->delete();
                }

                $image = $this->uploadImage($request, 'costume_photo');
                $imageArray['name'] = $image;
                $imageArray['costume_id'] = $data['row']->id;
                CostumeImages::create($imageArray);
                $request->session()->flash('success', $this->panel . ' successfully updated');
            }

            else {
                $request->session()->flash('error', 'Error in updating' . $this->panel);
            }
            return redirect()->route($this->base_route . 'index');
        }
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
        $data['costume_size'] = Size::pluck('short_form','id');
        $data['type'] = CostumeType::pluck('name','id');
        $this->title='Edit';
        $data['row']=$this->model->find($id);
        return view($this->__loadDataToView($this->folder.'edit'),compact('data'));

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
