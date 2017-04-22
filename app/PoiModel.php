<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PoiModel extends Model
{


   public function getPOI(){

      $POIArray = [];

        $query = "SELECT 
       
                    CASE 
                        WHEN shop != ''    THEN shop
                        WHEN amenity != '' THEN amenity
                        WHEN tourism != '' THEN tourism
                    END
                    AS type,
                    ST_X(ST_TRANSFORM(way,4326)) AS LONG,
                    ST_Y(ST_TRANSFORM(way,4326)) AS LAT,
                    name,
                    tags,
                    osm_id
                  ".

                  "FROM planet_osm_point 
                  
                  WHERE ST_DWITHIN(way,
                    ST_TRANSFORM(ST_SETSRID(ST_MAKEPOINT(7.60833,52.0917),4326),900913), 5000)
                     
                     AND (
                         shop = 'supermarket'
                        OR shop = 'convenience'                      
                        OR shop = 'bakery'
                        OR shop = 'kiosk'
                        OR shop = 'butcher'
                        OR amenity = 'bench'
                        OR amenity = 'fuel'
                        OR amenity = 'cafe'
                        OR amenity = 'fast_food'
                        OR amenity = 'bank'
                        OR amenity = 'pharmacy'
                        OR amenity = 'bicycle_parking'
                        OR amenity = 'toilets'
                        OR amenity = 'shelter'
                        OR amenity = 'drinking_water'
                        OR tourism = 'information'
                        OR tourism = 'viewpoint'
                        OR tourism = 'picnic_site'
                        OR tourism = 'camp_site'
                        OR tourism = 'hostel'

                     );";

       $result = DB::connection('pois')->select(DB::raw($query));

       if(!empty($result)){

           foreach ($result as $idex => $poiObject){

               $POIArray[$poiObject->type][$poiObject->osm_id]['name'] = $poiObject->name;
               $POIArray[$poiObject->type][$poiObject->osm_id]['lat'] = $poiObject->lat;
               $POIArray[$poiObject->type][$poiObject->osm_id]['long'] = $poiObject->long;

               $pairs = explode(",", str_replace("\"" , "", $poiObject->tags));
               $array = [];

               foreach ($pairs as $idx => $pair){
                   $keyVal = explode("=>", $pair);

                   if(!empty($keyVal[0])&& !empty($keyVal[1])) {
                       $array[trim($keyVal[0])] = trim($keyVal[1]);
                   }
               }
               $POIArray[$poiObject->type][$poiObject->osm_id]['tags'] = $array;

           }

           echo json_encode(["statusCode" => 200, "response" => (array)$POIArray ]);
       }


   }
}
