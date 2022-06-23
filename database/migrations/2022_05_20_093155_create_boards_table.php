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
        Schema::create('board', function (Blueprint $table) {
            // Generate ID.
            $table->id();

            // Relations.

            // Table content.
            $table->string('name')->unique();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('boardfunction')->default('Bestuurslid');

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
        Schema::dropIfExists('board');
    }
};
