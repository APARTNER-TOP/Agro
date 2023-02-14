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
}
