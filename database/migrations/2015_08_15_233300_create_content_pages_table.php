<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('template_id')->unsigned();
            $table->foreign("template_id")->references('id')->on('templates')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('content_page_hidden_field', function (Blueprint $table) {
            $table->integer('content_page_id')->unsigned()->index();
            $table->foreign("content_page_id")->references('id')->on('content_pages')->onDelete('cascade');
            $table->string('field_name');
            $table->timestamps();
        });

        Schema::create('content_page_field', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_page_id')->unsigned()->index();
            $table->foreign("content_page_id")->references('id')->on('content_pages')->onDelete('cascade');
            $table->string('field');
            $table->timestamps();
        });

        Schema::create('content_page_field_detail', function (Blueprint $table) {
            $table->integer('content_page_field_id')->unsigned()->index();
            $table->foreign("content_page_field_id")->references('id')->on('content_page_field')->onDelete('cascade');
            $table->integer('data_id');
            $table->string('type');
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
        Schema::drop('content_pages');
        Schema::drop('content_page_field_detail');
        Schema::drop('content_page_field');
        Schema::drop('content_page_hidden_field');
    }
}
