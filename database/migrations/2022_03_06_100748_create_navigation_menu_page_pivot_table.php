<?php

// Facades.
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation_menu_page', function (Blueprint $table) {

            // Set up pivot table.
            $table->bigInteger('navigation_menu_id')->unsigned()->index();
            $table->foreign('navigation_menu_id')->references('id')->on('navigation_menus')->onDelete('cascade');
            $table->bigInteger('page_id')->unsigned()->index();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->primary(['navigation_menu_id', 'page_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navigation_menu_page');
    }
};
