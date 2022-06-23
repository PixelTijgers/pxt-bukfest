<?php

// Facades.
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {

            // Generate ID.
            $table->id();

            // Relations.
            $table->bigInteger('last_edited_administrator_id')->unsigned()->nullable();
            $table->foreign('last_edited_administrator_id')->references('id')->on('administrators')->onDelete('cascade');

            // Table content.
            // Main page content.
            $table->string('page_title')->unique();
            $table->string('menu_title')->unique();
            $table->string('slug')->unique();
            $table->text('caption');
            $table->mediumtext('content');

            // Meta content.
            $table->string('meta_title')->unique();
            $table->text('meta_description');
            $table->string('meta_tags');

            // OG Content.
            $table->string('og_title')->unique();
            $table->text('og_description');
            $table->string('og_slug')->unique();
            $table->string('og_type')->default('website');
            $table->string('og_locale')->default('nl_NL');

            // Page published content.
            $table->string('status')->default('draft');
            $table->dateTime('published_at');
            $table->dateTime('unpublished_at')->nullable();

            // Last edited datetime.
            $table->dateTime('last_edit_at')->nullable();

            // Menu content.
            $table->boolean('visible_in_menu')->default(1);
            $table->nestedSet();

            // Generate timestaps (created_at, updated_at).
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
        Schema::dropIfExists('pages');
    }
};
