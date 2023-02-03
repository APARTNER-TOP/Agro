<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_user',
        'company_name',
        'company_address',
        'phone',

        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get users types
     * @param mixed $system_user
     * @return mixed result
     */
    public static function getTypes($system_user = false) {
        if ($system_user == 'admin') {
            return DB::table('users_type')->select('id','name')->where('id', '<=', '5')->get();
        }

        return DB::table('users_type')->select('id','name')->where('id', '>=', '6')->get();
    }

    // public static function getLocationGeo($location_id, $user_id) {
    //     $locationGeo = DB::table('locations')
    //                     ->select('type_id', 'lat', 'lon')
    //                     ->where(['id' => $location_id, 'user_id' => $user_id])
    //                     ->first();
    //     return $locationGeo;
    // }
}
