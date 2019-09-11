<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProudctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proudcts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name')->nullable();
            $table->string('model_name')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('lot_no')->nullable();
            $table->float('discount_price')->nullable();
            $table->float('discount_rate')->nullable();
            $table->float('purchase_price')->nullable();
            $table->float('sales_price')->nullable();
            $table->float('product_qty')->nullable();            
            $table->text('product_des')->nullable();
            $table->string('product_id')->nullable();
            $table->string('manufacture_date')->nullable();
            $table->string('ex_date')->nullable();
            $table->float('vat')->nullable();
            $table->string('vendor')->nullable();
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
        Schema::dropIfExists('proudcts');
    }
}
