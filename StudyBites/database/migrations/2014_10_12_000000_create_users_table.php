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
            $table->id();  // Auto-incrementing primary key
            $table->string('first_name');  // First name of the user
            $table->string('last_name');   // Last name of the user
            $table->string('email', 191)->unique(); //unique email address
            $table->string('password');  // Encrypted password
            $table->integer('points')->default(0);  // Points (default to 0)
            $table->timestamps();  // Timestamps (created_at, updated_at)
            $table->unsignedBigInteger('background_id')->nullable();
            $table->foreign('background_id')->references('id')->on('backgrounds')->onDelete('set null');

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
