<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bank_information', function (Blueprint $table) {
            $table->id();
			$table->string('uid');
			$table->string('name');
			$table->string('account_number');
			$table->string('ifsc_code');
			$table->string('branch_name');
			$table->text('bank_address');
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
        Schema::dropIfExists('Bank_information');
    }
}
