<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("folder");
            $table->string("description");
            $table->text("scaffold");
            $table->timestamps();
        });

        Schema::create('template_fields', function (Blueprint $table) {
            $table->integer('template_id')->unsigned()->nullable();
            $table->foreign("template_id")->references('id')->on('templates')->onDelete('cascade');
            $table->string('name');
            $table->string('field');
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
        Schema::drop('templates');
        Schema::drop('template_fields');
    }
}
