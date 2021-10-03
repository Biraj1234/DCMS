<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToCostumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costumes', function (Blueprint $table) {
            Schema::table('costumes', function (Blueprint $table) {
                $table->unsignedBigInteger('booked_by')->nullable();
                $table->foreign('booked_by')->references('id')->on('customers');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('costumes', function (Blueprint $table) {
            //
        });
    }
}
