<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations_type', function (Blueprint $table) {
            $table->id();
            // $table->increments('id');
            // $table->integer('id');
            $table->string('name');
            $table->string('img')->nullable();
        });

        DB::table('locations_type')->insert([
            ['name' => 'Завод', 'img' => '/img/locations/1.png'],
            ['name' => 'Склад підлоговий', 'img' => '/img/locations/2.png'],
            ['name' => 'Термінал', 'img' => '/img/locations/3.png'],
            ['name' => 'Елеватор', 'img' => '/img/locations/4.png'],
            ['name' => 'EXW (по регіону)', 'img' => '/img/locations/5.png'],
            ['name' => 'FCA (по регіону)', 'img' => '/img/locations/6.png'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations_type');
    }
};
