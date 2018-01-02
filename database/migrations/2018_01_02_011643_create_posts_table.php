<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('categoryId')->unsigned();	
            $table->foreign('categoryId')->references('id')->on('service_categories');
            $table->integer('typeId')->unsigned();	
            $table->foreign('typeId')->references('id')->on('service_subcategory');
            $table->integer('itemId')->unsigned();
            $table->foreign('itemId')->references('id')->on('service_items');
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->text('details');
            $table->string('image', 100);
            $table->boolean('isDraft')->default(1);
            $table->boolean('isActive')->default(1);
            $table->boolean('isFeatured')->default(1);
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
        Schema::dropIfExists('posts');
    }
}
