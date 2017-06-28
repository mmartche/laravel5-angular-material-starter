<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channel_name');
            $table->string('channel_slug');
            $table->string('channel_color');
            $table->string('channel_thumbnail');
            $table->string('channel_description');
            $table->string('channel_country');
            $table->string('channel_id_user');
            $table->string('channel_position');
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
        Schema::drop('channels');
    }
}
