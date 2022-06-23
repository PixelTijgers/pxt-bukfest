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
        Schema::create('memberships', function (Blueprint $table) {
            // Generate ID.
            $table->id();

            // Relations.

            // Table content.
            $table->string('name')->unique();
            $table->decimal('contribution', 9, 3);
            $table->decimal('contribution_first_half', 9, 3);
            $table->decimal('contribution_second_half', 9, 3);

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
        Schema::dropIfExists('memberships');
    }
};
