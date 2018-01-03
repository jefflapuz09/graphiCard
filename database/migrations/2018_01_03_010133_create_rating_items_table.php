<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('itemId')->unsigned();	
            $table->foreign('itemId')->references('id')->on('service_items');
            $table->integer('rating');
            $table->text('description');
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
        Schema::dropIfExists('rating_items');
    }
}
