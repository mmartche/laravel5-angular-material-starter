<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailMarketingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_marketing_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email_marketing_id');
            $table->string('base_id');
            $table->string('origem_id');
            $table->string('site_origem');
            $table->string('optin');
            $table->string('bounce');
            $table->string('spam');
            $table->string('engagement');
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
        Schema::drop('email_marketing_infos');
    }
}
