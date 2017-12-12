<?php

namespace App\Http\Controllers;

use App\GpxTrackModel;

class GpxTrackController extends Controller{
    
	//GET list ALL tracks stored in db
    public function index(){

        try {

            $model = new GpxTrackModel;

            if(!empty($tracks = $model->getTrackNames())){
                echo "{\"statusCode\" : 200, \"response\" : ".$tracks."}";
            }
            else{
                echo "{\"statusCode\" : 204, \"response\" :\" no Content \"}";
            }
        }
        //catching all errors to return valid JSON in error case
        catch (\Exception $e) {

            echo "{\"statusCode\" : 500, \"response\" :\" Server Error \"}";
        }
    }
}
