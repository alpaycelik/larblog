<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumKonularTablosuOlustur extends Migration
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
            $table->integer('ana_baslik');
            $table->string('baslik');
            $table->string('slug');
            $table->longText('icerik');
            $table->integer('yazar');
            $table->string('etiketler');
            $table->integer('sabit')->default(0);
            $table->integer('goster')->default(1);
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
