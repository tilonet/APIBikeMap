<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	use App\PoiModel;

class PoiController extends Controller
{
	//GET  api/gpxtrack list ALL tracks
    public function index(){  

        
        dd("jo");
    	return PoiModel::all();



    }
}
