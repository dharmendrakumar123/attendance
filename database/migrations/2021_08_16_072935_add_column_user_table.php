<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
			$table->string('phone');
			$table->string('uid');
			$table->string('last_name')->nullable();
			$table->string('birth_date')->nullable();
			$table->string('gender')->nullable();
			$table->text('address')->nullable();
			$table->string('state')->nullable();
			$table->string('country')->nullable();
			$table->string('pin_code')->nullable();
			$table->string('department')->nullable();
			$table->string('designation')->nullable();
			$table->string('report_to')->nullable();
			//$table->string('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
