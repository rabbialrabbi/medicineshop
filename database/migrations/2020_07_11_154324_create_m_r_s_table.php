<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->bigInteger('user_id')->unsigned();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('contact1')->nullable();
            $table->string('contact2')->nullable();
            $table->string('contact3')->nullable();
            $table->string('email1')->unique();
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();
            $table->string('fax')->nullable();
            $table->string('image');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_r_s');
    }
}
