<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPageSidebarMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_page_sidebar_menus', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('top_id')->default(0);
            $table->string('icon');
            $table->string('route');
            $table->text('path');
            $table->integer('order');
            $table->boolean('children_menu')->default(0);
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
        Schema::drop('admin_page_sidebar_menus');
    }
}
