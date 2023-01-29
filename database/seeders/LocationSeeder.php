<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'user_id' => Str::random(10),
            'type_id' => Str::random(2),
            'company' => Str::random(10),
            'address' => Str::random(10),
            'lat' => Str::random(10),
            'long' => Str::random(10),
        ]);

        // Location::factory()
        //     ->count(50)
        //     ->hasPosts(1)
        //     ->create();
    }
}
