<?php

namespace App\Http\Controllers;

use App\PoiModel;
use Illuminate\Support\Facades\Input;
require_once(__DIR__."/../../vendor/autoload.php");

class PoiController extends Controller
{
    //GET  pois and rivertrack
    public function index(){

        try {

            //default values for testing if no GET input
            $radius = 5000;
            $lat = 52.0965179;
            $lon = 7.61711;
            $river = "";
            $riverContent = "";
            $POIArray = [];

            //getting Input Data
            if (!empty(Input::get('radius'))) {
                $radius = Input::get('radius');
            }
            if (!empty(Input::get('lat')) && Input::get('lat') != 0.0) {
                $lat = Input::get('lat');
            }
            if (!empty(Input::get('lon')) && Input::get('lon') != 0.0) {
                $lon = Input::get('lon');
            }
            if (!empty(Input::get('river'))) {
                $river = Input::get('river');
            }

            if (!empty($river)) {

                $riverContent = $this->getRiverData($river);
            }

            //using model for database source
            $model = new PoiModel();
            $POIArray = $model->getPOI($radius, $lat, $lon);

            if (!empty($POIArray) || !empty($riverContent)) {

                //API Response JSON
                echo json_encode(["statusCode" => 200, "response" => ["poi" => $POIArray, "river" => $riverContent]]);
            } else {

                echo "{\"statusCode\" : 204, \"response\" :\" no Content \"}";
            }
            //catching all errors to return valid JSON in error case
        }catch (\Exception $e) {

            echo "{\"statusCode\" : 500, \"response\" :\" Server Error \"}";
        }
    }

    //return Coordinate Track as String
    public function getRiverData($river){

        $riverContent = '';

        if(file_exists(__DIR__ . "/../../../resources/assets/".$river.".json")) {

            $riverContent = file_get_contents(__DIR__ . "/../../../resources/assets/elbe.json");
        }
        return $riverContent;
    }
}