<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class GpxTrackModel extends Model{

	public function getTrackNames(){
			$names = DB::connection('tracks')->select(DB::raw("SELECT distinct trackname from trackapi;"));

            echo json_encode(["statusCode" => 200, "response" => (array)$names ]);
	}


    
}
