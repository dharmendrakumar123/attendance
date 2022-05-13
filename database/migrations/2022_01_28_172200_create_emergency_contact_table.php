<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_contact', function (Blueprint $table) {
            $table->id();
			$table->string('uid');
			$table->string('primary_name');
			$table->string('primary_relation');
			$table->string('primary_phone');
			$table->string('primary_phone2')->nullable();
			$table->string('secondary_name');
			$table->string('secondary_relation');
			$table->string('secondary_phone');
			$table->string('secondary_phone2')->nullable();
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
        Schema::dropIfExists('emergency_contact');
    }
}
