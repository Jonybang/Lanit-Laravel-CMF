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

            $table->string('title');
            $table->string('alias')->nullable();
            $table->string('menu_title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->integer('menu_index')->nullable();

            $table->boolean('is_abstract')->default(false);
            $table->boolean('is_published')->default(false);
            $table->boolean('is_menu_hide')->default(false);

            $table->integer('parent_page_id')->unsigned()->default(0);
            $table->foreign('parent_page_id')->references('id')->on('pages');

            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('author_id')->references('id')->on('users');

            $table->integer('template_id')->unsigned();
            $table->foreign('template_id')->references('id')->on('templates');

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