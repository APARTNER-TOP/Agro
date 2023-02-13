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

        Schema::create('offer_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('img')->nullable();
        });

        DB::table('offer_type')->insert([
            ['id' => 1, 'name' => 'Куплю'],
            ['id' => 2, 'name' => 'Продам',],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_type');
    }
};
