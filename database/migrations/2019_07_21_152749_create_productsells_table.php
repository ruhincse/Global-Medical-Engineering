<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productsells', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('date');

            $table->string('customer_id')->nullabele();

            $table->integer('product_id')->nullabele();

            $table->float('product_price')->nullabele();

            $table->float('product_qty')->nullabele();

            $table->float('total')->nullabele();

            $table->float('due')->nullabele();

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
        Schema::dropIfExists('productsells');
    }
}
