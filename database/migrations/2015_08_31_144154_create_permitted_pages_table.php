<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermittedPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->timestamps();
        });

        Schema::create('permitted_pages', function (Blueprint $table) {
            $table->integer("role_id")->unsigned()->index();
            $table->foreign("role_id")->references('id')->on('roles')->onDelete('cascade');
            $table->string('path');
            $table->boolean('access')->default(0);
            $table->boolean('process')->default(1);
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
        Schema::drop('all_pages');
        Schema::drop('permitted_pages');

    }
}
