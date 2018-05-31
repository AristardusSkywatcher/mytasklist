<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_subscriptions', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('room_id')->unsigned()->nullable();

            $table->foreign('room_id')
            ->references('id')
            ->on('rooms')
            ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->nullable();
            
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

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
        Schema::dropIfExists('room_subscriptions');
    }
}
