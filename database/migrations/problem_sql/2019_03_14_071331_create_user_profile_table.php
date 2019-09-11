<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('department_id')->unsigned();
            $table->biginteger('user_id')->unsigned()->nullable();
            $table->integer('designation_id')->unsigned();
            $table->string('phone_number');
            $table->string('gender');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('nid');
            $table->string('passport');
            $table->string('image');
            $table->date('dob');
            $table->string('maritial_status');
            $table->string('tex_code');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('user_profile',function($table){
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profile');
    }
}
