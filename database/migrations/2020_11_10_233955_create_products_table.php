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
            $table->string('title')->nullable();
            $table->string('photo')->nullable();
            $table->longtext('content')->nullable();

            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departements')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('trademark_id')->unsigned()->nullable();
            $table->foreign('trademark_id')->references('id')->on('trademarks')->onDelete('cascade')->onUpdate('cascade');
            
            
            $table->bigInteger('manufact_id')->unsigned()->nullable();
            $table->foreign('manufact_id')->references('id')->on('manufactories')->onDelete('cascade')->onUpdate('cascade');
            

            $table->bigInteger('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('size')->nullable();
            $table->bigInteger('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('countries')->onUpdate('cascade');
                        
            $table->decimal('price',5 ,2)->default(0);
            $table->integer('stock')->default(0);

            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();

            $table->date('start_offer_at')->nullable();
            $table->decimal('price_offer',5 ,2)->default(0);
            $table->date('end_offer_at')->nullable();
            
            $table->string('weight')->nullable();

            $table->bigInteger('weight_id')->unsigned()->nullable();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade')->onUpdate('cascade');
            
            $table->enum('status', ['pending', 'refused', 'accept'])->default('pending');
            $table->longtext('reason')->nullable();

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
