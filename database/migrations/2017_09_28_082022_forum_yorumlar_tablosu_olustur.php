<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumYorumlarTablosuOlustur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_yorumlar', function (Blueprint $table){
            $table->increments('id');
            $table->integer('ust_yorum')->default(0);
            $table->integer('kullanici_id');
            $table->integer('forum');
            $table->longText('icerik');
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
        Schema::dropIfExists('forum_yorumlar');
    }
}
