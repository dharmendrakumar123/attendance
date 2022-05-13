<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_information', function (Blueprint $table) {
            $table->id();
			$table->string('uid');
			$table->string('institue');
			$table->string('education');
			$table->string('passing_year');
			$table->string('marks_obtained');
			$table->string('stream');
			$table->string('grade');
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
        Schema::dropIfExists('education_information');
    }
}
