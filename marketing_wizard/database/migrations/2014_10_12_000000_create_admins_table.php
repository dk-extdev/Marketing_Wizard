<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('admins')->insert(
            array(
                'name' => 'Danil K',
                'email' => 'dk1986830@gmail.com',
                'password' => '$2y$10$GLqc1X/UNWW3kAy42zESuelBWeAIVeLgJRXIdzD/Y6vnnH0auRGGC',
                'phone' => '123456789'
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
        Schema::dropIfExists('admins');
    }
}
