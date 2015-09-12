<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->string('rss_title');
            $table->string('rss_description');
            $table->boolean('status')->default(1);
            $table->text('offline_message');
            $table->integer('template_id');
            $table->string('logo');
            $table->string('logo_title');
            $table->string('logo_description');
            $table->string('favicon');
            $table->text('copyright');
            $table->text('google_analytics');
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
        Schema::drop('settings');
    }
}
