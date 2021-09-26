<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeParent1ToCostumesTable extends Migration
{

    public function up()
    {
        Schema::table('costumes', function (Blueprint $table) {
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->unsignedBigInteger('costume_type_id');
            $table->foreign('costume_type_id')->references('id')->on('costume_types')->onDelete('cascade');


        });
    }


    public function down()
    {
        Schema::dropIfExists('costumes');
    }
}
