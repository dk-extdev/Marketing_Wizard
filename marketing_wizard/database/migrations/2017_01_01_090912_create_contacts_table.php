<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('address');
            $table->string('email');
            $table->timestamps();
        });
        DB::table('contacts')->insert(
            array(
                'email' => 'dk1986830@gmail.com',
                'number' => '123456',
                'address' => 'Moscow,Russia'
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
        Schema::drop('contacts');
    }
}
