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

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('lastName', 250);
            $table->string('firstName', 250);

            $table->string('phoneNumber', 250);
            $table->string('address', 250);
            $table->string('postalCode', 250);

            $table->string('image');
            $table->string('fbLink', 250);
            $table->string('instaLink', 250);


            $table->rememberToken();
            $table->timestamps();
            $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('cascade');

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
