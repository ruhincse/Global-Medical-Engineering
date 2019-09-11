<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEmploymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_employment_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employment_type_id')->unsigned();
            $table->biginteger('user_id')->unsigned();
            $table->biginteger('leave_id')->unsigned();
            $table->integer('working_place_id')->unsigned();
            $table->date('registration_date');
            $table->date('joining_date');
            $table->string('increment');
            $table->date('increment_date');
            $table->date('permanent_date');
            $table->string('office_mobile_number');
            $table->string('promotion');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('employment_type_id')->references('id')->on('employment_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('working_place_id')->references('id')->on('working_places')->onDelete('cascade');
            $table->foreign('leave_id')->references('id')->on('leaves')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_employmen_history');
    }
}
