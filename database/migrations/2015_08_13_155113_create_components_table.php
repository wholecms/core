<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('folder');
            $table->text('description');
            $table->timestamps();
        });


        Schema::create('component_file', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->integer('component_id')->unsigned()->index();
            $table->foreign("component_id")->references('id')->on('components')->onDelete('cascade');
            $table->string("file");
            $table->timestamps();
        });

//        Schema::create('component_link', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string("name");
//            $table->integer('component_id')->unsigned()->index();
//            $table->foreign("component_id")->references('id')->on('components')->onDelete('cascade');
//            $table->string("link");
//            $table->timestamps();
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('components');
        Schema::drop('component_file');
//        Schema::drop('component_link');

    }
}
