<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public static function remove($id) {
        if(DB::table('locations')->where(['user_id' => Auth::user()->id, 'id' => $id])->delete()) {
            return true;
        }

        return false;
    }
}
