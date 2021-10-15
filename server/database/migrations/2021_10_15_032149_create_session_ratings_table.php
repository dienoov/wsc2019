<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('session_registration_id');
            $table->enum('rating', [1, 2, 3, 4, 5]);
            $table->text('comment');
            $table->timestamps();

            $table->foreign('session_registration_id')->references('id')->on('session_registrations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_ratings');
    }
}
