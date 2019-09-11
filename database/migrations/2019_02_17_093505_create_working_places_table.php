<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_places', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('divison_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('code')->nullable();
            $table->integer('increment_by')->nullable()->unsigned();
            $table->integer('counted')->unsigned()->nullable();
            $table->boolean('active')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('divison_id')->references('id')->on('divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_places');
    }
}
