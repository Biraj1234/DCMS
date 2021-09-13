<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableToSizesTable extends Migration
{

    public function up()
    {
//        Schema::table('sizes', function (Blueprint $table) {
//            $table->string('short_form')->after('name');
//            $table->boolean('status')->default('0');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sizes', function (Blueprint $table) {
            //
        });
    }
}
