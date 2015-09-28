<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPageSidebarMenuLangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_page_sidebar_menu_langs', function (Blueprint $table) {
            $table->integer('admin_page_sidebar_menu_id')->unsigned()->index();
            $table->foreign("admin_page_sidebar_menu_id")->references('id')->on('admin_page_sidebar_menus')->onDelete('cascade');
            $table->string('title');
            $table->string('lang');
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
        Schema::drop('admin_page_sidebar_menu_langs');
    }
}
