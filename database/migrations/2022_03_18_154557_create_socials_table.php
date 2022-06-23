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
        Schema::create('socials', function (Blueprint $table) {
            // Generate ID.
            $table->id();

            // Relations.
            $table->bigInteger('social_media_id')->unsigned()->index();
            $table->foreign('social_media_id')->references('id')->on('social_media')->onDelete('cascade');

            // Table content.
            $table->string('content')->unique();
            NestedSet::columns($table);

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
        Schema::dropIfExists('socials');
    }
};
