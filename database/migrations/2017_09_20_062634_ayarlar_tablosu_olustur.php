<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AyarlarTablosuOlustur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayarlar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo', 50)->nullable();
            $table->string('url', 50)->nullable();
            $table->string('title', 100)->nullable();
            $table->string('description', 250)->nullable();
            $table->string('keywords', 250)->nullable();
            $table->string('author', 50)->nullable();
            $table->string('tel', 50)->nullable();
            $table->string('gsm', 50)->nullable();
            $table->string('faks', 50)->nullable();
            $table->string('mail', 50)->nullable();
            $table->string('adres', 100)->nullable();
            $table->string('il', 50)->nullable();
            $table->string('ilce', 50)->nullable();
            $table->string('recapctha', 100)->nullable();
            $table->string('maps', 100)->nullable();
            $table->string('analystic', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->string('google', 100)->nullable();
            $table->string('smtp_user', 50)->nullable();
            $table->string('smtp_password', 50)->nullable();
            $table->string('smtp_host', 50)->nullable();
            $table->string('smtp_port', 50)->nullable();
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
        Schema::dropIfExists('ayarlar');
    }
}
