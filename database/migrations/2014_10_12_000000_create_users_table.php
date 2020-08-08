<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('user_name')->unique();
            $table->integer('gender')->comment('1=male, 2=female')->nullable();

            $table->string('mobile_no')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('street_address');
            $table->unsignedInteger('division_id')->comment('Division Table id');
            $table->unsignedInteger('district_id')->comment('District Table id');

            $table->unsignedTinyInteger('status')->default(0)->comment('0=In_Active,1=Active, 2=Ban');

            $table->string('ip_address')->nullable();
            $table->string('avater')->nullable();
            $table->text('shipping_address')->nullable();




            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
