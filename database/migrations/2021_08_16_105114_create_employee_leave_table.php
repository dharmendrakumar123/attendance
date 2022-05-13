<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave', function (Blueprint $table) {
            $table->id();
			$table->string('leave_type');
			$table->string('time');
			$table->string('from');
			$table->string('to');
			$table->string('number_days');
			$table->string('leave_remaining');
			$table->string('leave_reason');
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
        Schema::dropIfExists('employee_leave');
    }
}
