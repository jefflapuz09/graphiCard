<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_subcategory', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('categoryId')->unsigned();	
            $table->foreign('categoryId')->references('id')->on('service_categories');
            $table->decimal('price',15,2);
            $table->text('description')->nullable();
            $table->boolean('isActive')->default(1);
            $table->timestamps();
            $table->unique(['name']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_subcategory');
    }
}
