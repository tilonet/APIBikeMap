<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoiModel extends Model
{
    protected $connection = 'pgsql';
	protected $database = "gis2";
	protected $table = "planet_osm_nodes";
	protected $fillable = array('ogc_fid', 'ele', 'wkb_geometry', 'trackname');
}
