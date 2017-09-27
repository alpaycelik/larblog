<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumKonularTablosuEkle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_konular', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baslik');
            $table->longText('icerik');
            $table->integer('yazar');
            $table->string('etiketler');
            $table->string('slug');
            $table->integer('ana_baslik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_konular');
    }
}
