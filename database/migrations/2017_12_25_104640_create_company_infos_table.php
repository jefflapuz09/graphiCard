<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_logo', 100);
            $table->string('company_name', 100);
            $table->string('street', 100);
            $table->string('brgy', 100);
            $table->string('city', 100);
            $table->string('contactNumber', 30);
            $table->string('emailAddress', 50);
            $table->text('about');
            $table->text('description')->nullable();
            $table->text('services_offered');
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
        Schema::dropIfExists('company_infos');
    }
}
