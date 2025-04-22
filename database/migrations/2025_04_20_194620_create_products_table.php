<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('material'); // e.g., Cotton, Wool, Acrylic
            $table->string('weight')->nullable(); // e.g., DK, Aran, Bulky
            $table->string('color')->nullable(); // e.g., Red, Forest Green
            $table->integer('length')->nullable(); // in meters
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // image path like yarn_red.png
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
