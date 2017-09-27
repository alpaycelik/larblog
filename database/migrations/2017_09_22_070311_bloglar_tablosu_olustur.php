<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BloglarTablosuOlustur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloglar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baslik',250);
            $table->longText('icerik');
            $table->string('kisaicerik',255);
            $table->integer('yazar')->nullable();
            $table->string('etiketler', 255);
            $table->string('resimler', 255)->nullable();
            $table->string('slug', 255);
            $table->integer('kategori')->nullable();
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
        Schema::dropIfExists('bloglar');
    }
}
