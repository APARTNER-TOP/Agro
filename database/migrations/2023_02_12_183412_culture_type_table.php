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
        Schema::create('culture_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img')->nullable();
        });

        DB::table('culture_type')->insert([
            ['name' => 'Соя ГМО', 'img' => ''],
            ['name' => 'Соя не ГМО', 'img' => ''],
            ['name' => 'Кукурудза', 'img' => ''],
            ['name' => 'Соняшник', 'img' => ''],
            ['name' => 'Пшениця', 'img' => ''],
            ['name' => 'Соняшник ВО', 'img' => ''],
            ['name' => 'Ячмінь', 'img' => ''],
            ['name' => 'Ріпак', 'img' => ''],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('culture_type');
    }
};
