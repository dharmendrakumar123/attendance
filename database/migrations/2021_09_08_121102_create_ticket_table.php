<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
			$table->string('uid');
			$table->string('ticket_subject')->nullable();
			$table->string('assign_staff')->nullable();
			$table->string('client')->nullable();
			$table->string('priority')->nullable();
			$table->string('cc')->nullable();
			$table->longText('description')->nullable();
			$table->string('file')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
