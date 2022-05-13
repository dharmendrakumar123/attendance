<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAddemployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addemployeesalary', function (Blueprint $table) {
			$table->string('Total_leave')->nullable();
			$table->string('basic_amount');
			$table->string('HRA');
			$table->string('RA');
			$table->string('Transport');
			$table->string('OA');
			$table->string('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addemployeesalary', function (Blueprint $table) {
            //
        });
    }
}
