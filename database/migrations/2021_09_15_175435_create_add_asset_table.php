<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addasset', function (Blueprint $table) {
            $table->id();
            $table->string('asset_name');
            $table->string('brand');
            $table->string('condition');
            $table->string('assign_user');
            $table->string('assign_date');
            $table->string('handover')->nullable();
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
        Schema::dropIfExists('addasset');
    }
}
