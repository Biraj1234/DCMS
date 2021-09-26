<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTableToCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costumers', function (Blueprint $table) {
            Schema::rename('costumers','customers');
        });
    }


    public function down()
    {
        Schema::table('costumer', function (Blueprint $table) {
            //
        });
    }
}
