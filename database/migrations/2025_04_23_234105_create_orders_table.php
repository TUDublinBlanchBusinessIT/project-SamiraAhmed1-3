<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();

        // Foreign key to customers table
        $table->unsignedBigInteger('customer_id');
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

        // Foreign key to products table
        $table->unsignedBigInteger('product_id');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        $table->integer('quantity')->default(1);
        $table->timestamps();
    });
}

}
