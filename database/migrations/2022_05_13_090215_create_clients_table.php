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
        Schema::create('clients', function (Blueprint $table) {
            // Generate ID.
            $table->id();

            // Table content.
            $table->string('name');
            $table->string('contact');
            $table->string('street');
            $table->string('zip_code');
            $table->string('location');
            $table->string('country');

            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('mobile')->unique();

            $table->string('vat')->unique()->nullable();

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
        Schema::dropIfExists('clients');
    }
};
