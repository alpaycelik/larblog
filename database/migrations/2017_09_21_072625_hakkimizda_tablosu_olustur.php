<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HakkimizdaTablosuOlustur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hakkimizda', function (Blueprint $table){
            $table->increments('id');
            $table->text('vizyon')->nullable();
            $table->text('misyon')->nullable();
            $table->text('kisa_yazi')->nullable();
            $table->text('icerik')->nullable();
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
        Schema::dropIfExists('hakkimizda');
    }
}
