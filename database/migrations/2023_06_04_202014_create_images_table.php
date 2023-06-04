<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('galeria_id');
            $table->string('image');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('galeria_id')->references('id')->on('galerias')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagenes');
    }
}
