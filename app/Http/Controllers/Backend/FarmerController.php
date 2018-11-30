<?php

namespace App\Http\Controllers\Backend;

use App\Models\Crop;
use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FarmerController extends Controller
{
    //
    public function __invoke()
    {
        return view('backend.farmers.all')->withFarmers(Farmer::all())->withCrops(Crop::all());
    }

    public function saveNewFarmer(Request $request)
    {
        $farmer=new Farmer();
        $farmer->crop_id=$request->input('crop_id');
        $farmer->phone_number=$request->input('phone_number');
        $farmer->email=$request->input('email');
        $farmer->save();


        return redirect()->back();
    }
}
