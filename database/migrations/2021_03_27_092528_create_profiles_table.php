<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('user_role')->default(0);
            $table->string('full_name');
            $table->string('slug');
            $table->string('phone');
            $table->string('gender')->nullable();
            $table->string('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->text('address')->nullable();
            $table->longText('medical_history')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('profiles');
    }
}
