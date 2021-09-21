<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BackendBaseController
{
    function __construct(){
        $this->image_path=public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR . $this->folder_name . DIRECTORY_SEPARATOR;
    }

    protected function __loadDataToView($viewPath)
    {
        view()->composer($viewPath,function($view)
        {
            $view->with('panel',$this->panel);
            $view->with('folder',$this->folder);
            $view->with('folder_name',$this->folder_name);
            $view->with('base_route',$this->base_route);
            $view->with('title',$this->title);
        });
        return $viewPath;
    }

    protected function uploadImage(Request $request, $image_field_name){
        $image = $request->file($image_field_name);
        $image_name=rand(6785,9814).'_'.$image->getClientOriginalName();
        $image->move($this->image_path,$image_name);
        if(count(config('image_dimension.'.$this->folder_name.'.images'))>0){
            foreach (config('image_dimension.'.$this->folder_name.'.images') as $dimension) {
                $img = Image::make($this->image_path.$image_name)->resize($dimension['width'],$dimension['height']);
                $img->save($this->image_path.$dimension['width'].'_'.$dimension['height'].'_'.$image_name);
            }
        }
        return $image_name;
    }

    protected function deleteImage($image_name){
        $image_namee = $this->image_path.$image_name;
//        dd($image_namee);

        if (file_exists($image_namee)) {
            unlink($image_namee);
        }
        if (count(config('image_dimension.' . $this->folder_name . '.images')) > 0) {
            foreach (config('image_dimension.' . $this->folder_name . '.images') as $dimension) {
                $dimension['height'];
                $path = $this->image_path . $dimension['width'] . '_' . $dimension['height'] . '_' . $image_name;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }


    }

}
