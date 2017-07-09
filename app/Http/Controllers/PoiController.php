<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	use App\PoiModel;
	use Illuminate\Support\Facades\Input;

class PoiController extends Controller
{
	//GET  api/poi list ALL pois
    public function index(){

         $radius = 5000;
         $lat = 52.0965179;
         $lon = 7.61711;

         if(!empty(Input::get('radius'))){
             $radius = Input::get('radius');
         }
        if(!empty(Input::get('lat')) && Input::get('lat') !=  0.0 ){
            $lat = Input::get('lat');
        }
        if(!empty(Input::get('lon')) && Input::get('lon') !=  0.0 ){
            $lon = Input::get('lon');
        }

        $model = new PoiModel();
        $model->getPOI($radius, $lat, $lon);



    }
}
