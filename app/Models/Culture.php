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

    public static function createNew($id, $request) {
        $culture = new self;
        $culture->location_id = $id;
        $culture->fill($request->all());
        if($culture->save()) {
            return true;
        }

        return false;
    }

    /**
     * Create culture type
     *
     * @param array $request
     * @return void
     */
    public static function createCultureType($request) {
        $cultureType = new self;
        $cultureType->slug = \Str::slug($request->title);
        $cultureType->fill($request->all());
        if($cultureType->save()) {
            return true;
        }

        return false;
    }

    /**
     * Get all sell cultures
     *
     * @param int $user_id
     * @return void
     */
    public static function getAllSell(int $user_id = null)
    {
        $search = [];
        // $search['status'] = 1;
        $search['offer_type'] = 2;

        if ($user_id) {
            $search['l.user_id'] = $user_id;
        }

        $cultures = DB::table('locations as l')
            ->leftJoin('cultures as c', 'l.id', '=', 'c.location_id')
            ->leftJoin('culture_type as ct', 'c.culture_type', '=', 'ct.id')
            ->select('ct.id as type','ct.name', 'ct.slug', 'ct.img', 'c.price', 'c.weight', 'l.company', 'l.address', 'l.lat', 'l.lon')
            ->where($search)
            ->get();

        return $cultures;
    }
}
