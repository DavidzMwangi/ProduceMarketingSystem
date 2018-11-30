<?php

namespace App\Http\Controllers\Backend;

use App\Models\Farmer;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    //

    public function __invoke()
    {
        return view('backend.location.new')->withFarmers(Farmer::all());
    }

    public function saveFarmerLocation(Request $request)
    {
        $this->validate($request,[
            'farmer_id'=>'required',
            'long'=>'required',
            'lat'=>'required'
        ]);

        $location=new Location();
        $location->farmer_id=$request->input('farmer_id');
        $location->long=$request->input('long');
        $location->lat=$request->input('lat');
        $location->save();


        return redirect()->back();
    }

    public function allLocations()
    {
        return view('backend.location.all')->withLocations(Location::all());
    }
}
