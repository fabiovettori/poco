<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('lastname', 100);
            $table->string('email', 255);
            $table->string('username', 100)->nullable();
            $table->string('password', 64)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->string('city', 50);
            $table->string('address', 255);
            $table->string('postcode', 100);
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
        Schema::dropIfExists('customers');
    }
}
