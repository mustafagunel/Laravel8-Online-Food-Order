<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('keywords');
            $table->string('description');
            $table->string('company');
            $table->string('address');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('smtpserver');
            $table->string('smtpemail');
            $table->string('smtppassword');
            $table->string('smtpport');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('aboutus');
            $table->string('contact');
            $table->string('references');
            $table->boolean('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
