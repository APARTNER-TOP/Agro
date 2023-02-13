<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Culture extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['location_id', 'culture_type', 'offer_type', 'price', 'weight'];

    public static function getTypes() {
        return DB::table('culture_type')->get();
    }

    // public static function getLocationGeo($location_id, $user_id) {
    //             $locationGeo = DB::table('locations')
    //                             ->select('type_id', 'lat', 'lon')
    //                             ->where(['id' => $location_id, 'user_id' => $user_id])
    //                             ->first();
    //     return $locationGeo;
    // }
}
