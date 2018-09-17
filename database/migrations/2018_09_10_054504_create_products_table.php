<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('site_id');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->unsignedInteger('product_category_id');
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('description');
            $table->string('image');
            $table->string('extension');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
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
