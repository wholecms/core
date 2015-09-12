<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('content_page_id')->unsigned();
            $table->foreign('content_page_id')->references('id')->on('content_pages')->onDelete('cascade');

            $table->string('menu_title');
            $table->string('menu_description');
            $table->string('menu_icon');
            $table->string('menu_image');

            $table->string('meta_title');
            $table->string('meta_keywords');
            $table->string('meta_description');

            $table->boolean('title_visibility')->default(1);
            $table->boolean('status')->default(1);
            $table->string('access');

            $table->string('link_target',10);
            $table->boolean('content_embed')->default(0);
            $table->boolean('default')->default(0);

            $table->string('content_type',10);
            $table->string('content_title');

            $table->integer('content_id')->unsigned()->nullable();;
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');

            $table->integer('component_id')->unsigned()->nullable();;
            $table->foreign('component_id')->references('id')->on('component_file')->onDelete('cascade');

            $table->string('external_link')->nullable();;

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
        Schema::drop('pages');
    }
}
