<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->id();
            $table->string('depname_ar');
            $table->string('depname_en');
            $table->string('icon')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();

            $table->bigInteger('parent')->unsigned()->nullable();
            $table->foreign('parent')->references('id')->on('departements')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('departements');
    }
}
