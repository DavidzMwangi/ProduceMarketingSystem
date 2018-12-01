<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Farmer;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    //
    public function maps($crop_id)
    {
        //get all farmers with same crop id
        $farmers=Farmer::where('crop_id',$crop_id)->pluck('id');

        //get all the locations with this farmer id
        $locations=Location::whereIn('farmer_id',$farmers)->select(['lat','long'])->get();

        return view('frontend.maps')->withCrop($crop_id);
    }

    public function getFarmers($crop_id)
    {
        $farmers=Farmer::where('crop_id',$crop_id)->get()->load('crop');

        return response()->json([
            'farmers'=>$farmers
        ]);
    }

    public function getAllLocations($crop_id)
    {
        //get all farmers with same crop id
        $farmers=Farmer::where('crop_id',$crop_id)->pluck('id');

        //get all the locations with this farmer id
        $locations=Location::whereIn('farmer_id',$farmers)->select(['lat','long'])->get();

        return response()->json([

            'locations'=>$locations
        ]);
    }
}
