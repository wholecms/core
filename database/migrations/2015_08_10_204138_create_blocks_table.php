<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->boolean('status')->default(1);
            $table->boolean('title_visibility')->default(1);
            $table->boolean('list_embed')->default(0);
            $table->string('access');
            $table->text('item_json');
            $table->timestamps();
        });

        Schema::create('block_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('block_id')->unsigned()->index();
            $table->foreign("block_id")->references('id')->on('blocks')->onDelete('cascade');
            $table->integer('top_block_id')->unsigned()->nullable();
            $table->foreign("top_block_id")->references('id')->on('block_detail')->onDelete('cascade');
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
        Schema::drop('blocks');
        Schema::drop('block_detail');
    }
}
