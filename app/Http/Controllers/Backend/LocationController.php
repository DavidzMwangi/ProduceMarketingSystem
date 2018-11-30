<?php

namespace App\Http\Controllers\Backend;

use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    //

    public function __invoke()
    {
        return view('backend.location.new')->withFarmers(Farmer::all());
    }
}
