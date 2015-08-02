<?php

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

        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username', 100);
            $table->string('name', 100);
            $table->string('email', 128);
            $table->string('password', 64);
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Artisan::call('migrate', [
        //     '--package' => 'machuga/authority-l4'
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
