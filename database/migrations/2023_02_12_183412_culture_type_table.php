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
            $table->string('slug');
            $table->string('img')->nullable();
        });

        DB::table('culture_type')->insert([
            ['name' => 'Соя ГМО', 'slug' => 'soja_hmo', 'img' => '/img/cultures/1.png'],
            ['name' => 'Соя не ГМО', 'slug' => 'soja_ne_hmo', 'img' => '/img/cultures/2.png'],
            ['name' => 'Кукурудза', 'slug' => 'kukurudza', 'img' => '/img/cultures/3.png'],
            ['name' => 'Соняшник', 'slug' => 'sonjasnyk', 'img' => '/img/cultures/4.png'],
            ['name' => 'Пшениця', 'slug' => 'psenycja', 'img' => '/img/cultures/5.png'],
            ['name' => 'Соняшник ВО', 'slug' => 'sonjasnyk_vo', 'img' => '/img/cultures/6.png'],
            ['name' => 'Ячмінь', 'slug' => 'jacmin', 'img' => '/img/cultures/7.png'],
            ['name' => 'Ріпак', 'slug' => 'ripak', 'img' => '/img/cultures/8.png'],
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
