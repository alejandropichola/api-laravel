<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubdivision extends Migration
{
    public function up()
    {
        Schema::create('subdivisions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('country_id');
            $table->string('name');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    public function down()
    {
        Schema::dropIfExists('subdivisions');
    }
}