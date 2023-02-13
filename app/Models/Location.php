<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['culture_type','offer_type','type_id', 'address', 'company', 'price', 'weight', 'lat', 'lon'];

    public static function getTypes() {
        return DB::table('locations_type')->get();
    }

    public static function getLocationGeo($location_id, $user_id) {
                $locationGeo = DB::table('locations')
                                ->select('type_id', 'lat', 'lon')
                                ->where(['id' => $location_id, 'user_id' => $user_id])
                                ->first();
        return $locationGeo;
    }

    public static function setDisable($id) {
        $location = self::findOrFail($id);
        $location->status = 0;
        $location->save();
    }
}
