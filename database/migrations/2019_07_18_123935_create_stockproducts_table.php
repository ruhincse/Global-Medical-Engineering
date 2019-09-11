<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->string('pro_id')->nullable();
            $table->float('sales_price')->nullable();
            $table->float('purchase_price')->nullable();
            $table->float('qty')->nullable();    
            $table->float('total')->nullable();    
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
        Schema::dropIfExists('stockproducts');
    }
}
