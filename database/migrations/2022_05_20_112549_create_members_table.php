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
        Schema::create('members', function (Blueprint $table) {
            // Generate ID.
            $table->id();

            // Relations.
            $table->bigInteger('team_id')->unsigned()->index();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

            $table->bigInteger('membership_id')->unsigned()->index();
            $table->foreign('membership_id')->references('id')->on('memberships')->onDelete('cascade');

            // Table content.
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('street');
            $table->string('zip_code');
            $table->string('location');
            $table->string('country');
            $table->date('birthday');

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
        Schema::dropIfExists('members');
    }
};
