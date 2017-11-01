<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->boolean('status')->default(false);
            $table->string('type');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'name' => 'Jhone Doe',
                'email' => 'jddynamic@gmail.com',
                'password' => '$2y$10$GLqc1X/UNWW3kAy42zESuelBWeAIVeLgJRXIdzD/Y6vnnH0auRGGC',
                'phone' => '123456789',
                'status' => true,
                'type' => 'Basic'
            )
        );

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
