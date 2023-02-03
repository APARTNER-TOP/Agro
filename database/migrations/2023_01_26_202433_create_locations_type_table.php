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
        });

        DB::table('locations_type')->insert([
            ['id' => '1', 'name' => 'Завод'],
            ['id' => '2', 'name' => 'Склад підлоговий'],
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
