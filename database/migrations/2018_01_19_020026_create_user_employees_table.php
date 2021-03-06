<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_employees', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('firstName', 40);
            $table->string('middleName', 20)->nullable();
            $table->string('lastName', 30);
            $table->string('contactNumber', 30);
            $table->string('street', 50);
            $table->string('brgy', 50);
            $table->string('city', 50);
            $table->boolean('gender');
            $table->boolean('isActive')->default(1);
            $table->unique(['firstName', 'middleName','lastName']);
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
        Schema::dropIfExists('user_employees');
    }
}
