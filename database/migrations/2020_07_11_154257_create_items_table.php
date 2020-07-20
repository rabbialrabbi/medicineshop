<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_type_id')->unsigned();
            $table->bigInteger('generic_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned();
            $table->string('code');
            $table->string('name');
            $table->string('size');
            $table->string('dosage')->nullable();
            $table->integer('price');
            $table->string('description');
            $table->string('image');
            $table->timestamps();
            $table->foreign('item_type_id')->references('id')->on('item_types')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('generic_id')->references('id')->on('generics')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
