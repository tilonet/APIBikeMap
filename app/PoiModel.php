<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PoiModel extends Model
{


   public function getPOI($radius, $lat, $lon){

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
                    ST_TRANSFORM(ST_SETSRID(ST_MAKEPOINT(".$lon.",".$lat."),4326),900913), ".$radius.")
                     
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

               if(!empty($poiObject->name))  $POIArray[$poiObject->osm_id]['name'] = $poiObject->name;
               if(!empty($poiObject->osm_id))$POIArray[$poiObject->osm_id]['id'] = (string)$poiObject->osm_id;
               if(!empty($poiObject->lat))   $POIArray[$poiObject->osm_id]['lat'] = $poiObject->lat;
               if(!empty($poiObject->long))  $POIArray[$poiObject->osm_id]['long'] = $poiObject->long;
               if(!empty($poiObject->type))  $POIArray[$poiObject->osm_id]['type'] = $poiObject->type;

               $pairs = explode(",", str_replace("\"" , "", $poiObject->tags));
               $array = [];

               foreach ($pairs as $idx => $pair){
                   $keyVal = explode("=>", $pair);

                   if(!empty($keyVal[0])&& !empty($keyVal[1])) {
                       $array[trim($keyVal[0])] = trim($keyVal[1]);
                   }
               }
               if(!empty($array)) {
                   $POIArray[$poiObject->osm_id]['tags'] = $array;
               }
           }

           echo json_encode(["statusCode" => 200, "response" => (array)$POIArray ]);
       }


   }
}
