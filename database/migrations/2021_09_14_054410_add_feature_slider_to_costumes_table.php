<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeatureSliderToCostumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costumes', function (Blueprint $table) {
           $table->boolean('feature_costume')->default('0');
           $table->boolean('slider_costume')->default('0');
           $table->boolean('top_costume')->default('0');

        });
    }
    public function down()
    {
        Schema::table('costumes', function (Blueprint $table) {
            //
        });
    }
}
