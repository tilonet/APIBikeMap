<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	use App\PoiModel;

class PoiController extends Controller
{
	//GET  api/poi list ALL pois
    public function index(){

        $model = new PoiModel();
        $model->getPOI();



    }
}
