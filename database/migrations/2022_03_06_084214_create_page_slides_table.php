<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

class CreatePageSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_slides', function (Blueprint $table) {
            
            // Generate ID.
            $table->id();

            // Relations.
            $table->bigInteger('page_id')->unsigned()->index();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

            // Table content.
            $table->text('subtitle')->nullable();
            $table->text('title')->nullable();
            $table->text('caption')->nullable();
            $table->text('alt')->nullable();
            $table->string('slug')->nullable()->unique();
            NestedSet::columns($table);

            // Generate timestaps (created_at, updated_at)
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
        Schema::dropIfExists('page_slides');
    }
}
