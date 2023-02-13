<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Offer extends Model
{
    use HasFactory;

    public static function getTypes() {
        return DB::table('offer_type')->get();
    }
}
