<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeParentToCostumesTable extends Migration
{

    public function up()
    {
        Schema::table('costumes', function (Blueprint $table) {
            $table->dropColumn('size_id');
            $table->dropColumn('costume_type_id');

        });
    }


    public function down()
    {
        Schema::dropIfExists('costumes');
    }
}
