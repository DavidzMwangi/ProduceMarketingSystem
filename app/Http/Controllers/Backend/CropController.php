<?php

namespace App\Http\Controllers\Backend;

use App\Models\Crop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CropController extends Controller
{
    //
    public function __invoke()
    {
        $crops=Crop::all();
        return view('backend.crop.new')->withCrops($crops);
    }

    public function saveNewCrop(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);


        $crop=new Crop();
        $crop->name=$request->input('name');
        $crop->save();

        return redirect()->back();
    }

}
