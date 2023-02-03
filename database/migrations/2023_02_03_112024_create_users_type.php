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
        Schema::create('users_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('users_type')->insert([
            ['name' => 'Admin'],
            ['name' => 'Manager'],
            ['name' => 'Custom 1'],
            ['name' => 'Custom 2'],
            ['name' => 'Custom 3'],
            ['name' => 'Фермер / Виробник'],
            ['name' => 'Трейдер'],
            ['name' => 'Переробник'],
            ['name' => 'Брокер'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_type');
    }
};
