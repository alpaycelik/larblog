<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YorumlarTablosuOlustur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yorumlar', function (Blueprint $table){
            $table->increments('id');
            $table->integer('ust_yorum')->default('0');
            $table->integer('kullanici_id')->default('0');
            $table->string('blog');
            $table->string('isim')->nullable();
            $table->string('mail')->nullable();
            $table->string('icerik');
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
        Schema::dropIfExists('yorumlar');
    }
}
