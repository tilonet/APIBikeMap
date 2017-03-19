<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GpxTrackModel;

class GpxTrackController extends Controller
{
    
	//GET  api/gpxtrack list ALL tracks
    public function index($client){

        $model = new GpxTrackModel;
        $model->getTrackNames();

       /* $response = Request::request('GET', '/api/usertest', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer rC5LLxrKcZHczFhb7Kx6tuP1dOWVK8O503VqOqYm',
            ],
        ]);

        dd($response);*/
    }

    //GET api/gpxtrack/TRACKID show one 
    public function show(){

    }

    public function edit(){


    }
}
