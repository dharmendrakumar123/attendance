<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
			$table->string('uid');
			$table->string('passport_no');
			$table->string('passport_expiry_date');
			$table->string('phone');
			$table->string('nationality')->nullable();
			$table->string('marital_status')->nullable();
			$table->string('spouse')->nullable();
			$table->string('no_children')->nullable();
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
        Schema::dropIfExists('personal_information');
    }
}
