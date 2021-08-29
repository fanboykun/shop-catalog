<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banner_id')->nullable()->nullOnDelete();
            $table->string('name')->required();
            $table->string('slug');
            $table->foreignId('category_id')->nullOnDelete();
            $table->float('price')->required();
            $table->longText('description')->nullable();
            $table->float('discount')->nullable();
            $table->string('photo');
            $table->boolean('is_soldout')->default(false);
            $table->boolean('is_hot')->default(false);
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
        Schema::dropIfExists('products');
    }
}
