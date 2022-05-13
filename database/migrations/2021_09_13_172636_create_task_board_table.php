<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_board', function (Blueprint $table) {
            $table->id();
			$table->string('uid');
			$table->string('task_name')->nullable();
			$table->string('task_priority')->nullable();
			$table->string('due_date')->nullable();
			$table->string('task_board_name')->nullable();
			$table->string('status')->nullable();
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
        Schema::dropIfExists('task_board');
    }
}
