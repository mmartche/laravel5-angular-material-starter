<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bases', function (Blueprint $table) {
            $table->increments('base_id');
            $table->string('base_name');
            $table->string('base_sender');
            $table->string('base_content');
            $table->string('base_periodicity');
            $table->string('base_nameExternalKey');
            $table->string('base_nameBase');
            $table->string('base_nameSubBase');
            $table->string('base_nameOrigin');
            $table->string('base_status');
            $table->string('base_country');
            $table->string('base_id_user');
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
        Schema::drop('bases');
    }
}
