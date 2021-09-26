<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Costume;

use App\Models\Size;
use Illuminate\Http\Request;

class HomeController extends FrontBaseController
{
    protected $panel='Home';  //for section/moudule
    protected $folder='frontend.home.'; //for view file
    protected $base_route='frontend.home.'; //for route method
    protected $title;
    protected $model='Home';

    public function index(){
        $this->title ='Astha Dress Center';
        $data['top-costume'] = Costume::where('top_costume','1')->get();
        $data['slider-costume'] = Costume::where('slider_costume','1')->get();
        $data['feature-costume'] = Costume::where('feature_costume','1')->get();
        $data['recent-costume'] = Costume::orderBy('created_at','desc')->get();
        $data['related-product'] = Costume::all();
        return view($this->__loadDataToView($this->folder.'index'),compact('data'));

    }

    public  function productDetail($id){

        $data['row']=Costume::find($id);
        $data['related-costume'] = Costume::all()->except($id);
        $data['size']=Size::all();
        $this->title= $data['row']->costumeType->name;
        return view($this->__loadDataToView($this->folder.'detail'),compact('data'));

    }

    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
