<?php

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
        Schema::create('calendar', function (Blueprint $table) {
            // Generate ID.
            $table->id();

            // Table content.
            $table->string('title')->unique();
            $table->text('caption');
            $table->mediumtext('content')->nullable();

            // Meta content.
            $table->string('meta_title')->unique();
            $table->text('meta_description');
            $table->string('meta_tags');

            // OG content.
            $table->string('og_title')->unique();
            $table->text('og_description');
            $table->string('og_slug')->unique();
            $table->string('og_type');
            $table->string('og_locale')->default('nl_NL');

            $table->boolean('visible')->default(false);
            $table->string('status')->default('draft');
            $table->dateTime('published_at');
            $table->dateTime('unpublished_at')->nullable();

            // Generate timestamps (created_at, updated_at)
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
        Schema::dropIfExists('calendar');
    }
};
