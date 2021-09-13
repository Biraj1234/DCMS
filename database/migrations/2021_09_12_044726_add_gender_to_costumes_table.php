<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderToCostumesTable extends Migration
{

    public function up()
    {
        Schema::table('costumes', function (Blueprint $table) {
           $table->boolean('gender')->default('0')->after('photo');
        });
    }


    public function down()
    {
       Schema::dropIfExists('costumes');
    }
}
