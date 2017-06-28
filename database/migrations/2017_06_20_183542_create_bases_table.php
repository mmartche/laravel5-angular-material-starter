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
    //TRYING USE NULL
    public function up()
    {
        Schema::create('bases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('base_name',null);
            $table->string('base_sender',null);
            $table->string('base_content',null);
            $table->string('base_periodicity',null);
            $table->string('base_nameExternalKey',null);
            $table->string('base_nameBase',null);
            $table->string('base_nameSubBase',null);
            $table->string('base_nameOrigin',null);
            $table->string('base_status',null);
            $table->string('base_country',null);
            $table->string('base_id_user',null);
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
