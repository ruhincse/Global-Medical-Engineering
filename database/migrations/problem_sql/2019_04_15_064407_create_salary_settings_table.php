<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalarySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned()->nullable();
            $table->string('total_salary');
            $table->string('basic_salary');
            $table->string('house_rent');
            $table->string('provident_fund');
            $table->string('mobile_allowances');
            $table->string('dinning_allowances');
            $table->string('medical_allowances');
            $table->string('transport_allowances');
            $table->timestamps();
        });

        Schema::table('user_profile',function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_settings');
    }
}
