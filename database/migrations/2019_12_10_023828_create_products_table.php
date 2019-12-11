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
            $table->bigIncrements('id');
            $table->string('product_id', 10);
            $table->string('title');
            $table->string('alt_title');
            $table->text('description');
            $table->text('additional_info');
            $table->integer('price')->unsigned();
            $table->text('url');
            $table->longText('images');
            $table->timestamps();

            $table->unique('url');
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
