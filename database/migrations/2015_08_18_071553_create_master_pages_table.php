<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('master_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('template_id')->unsigned();
            $table->foreign("template_id")->references('id')->on('templates')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('master_page_hidden_field', function (Blueprint $table) {
            $table->integer('master_page_id')->unsigned()->index();
            $table->foreign("master_page_id")->references('id')->on('master_pages')->onDelete('cascade');
            $table->string('field_name');
            $table->timestamps();
        });

        Schema::create('master_page_field', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('master_page_id')->unsigned()->index();
            $table->foreign("master_page_id")->references('id')->on('master_pages')->onDelete('cascade');
            $table->string('field');
            $table->timestamps();
        });

        Schema::create('master_page_field_detail', function (Blueprint $table) {
            $table->integer('master_page_field_id')->unsigned()->index();
            $table->foreign("master_page_field_id")->references('id')->on('master_page_field')->onDelete('cascade');
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
        Schema::drop('master_pages');
        Schema::drop('master_page_hidden_field');
        Schema::drop('master_page_field');
        Schema::drop('master_page_field_detail');
    }
}
