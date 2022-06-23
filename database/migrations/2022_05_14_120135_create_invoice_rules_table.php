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
        Schema::create('invoice_rules', function (Blueprint $table) {

            // Generate ID.
            $table->id();

            // Relations.
            $table->bigInteger('invoice_id')->unsigned()->index();
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');

            // Table content.
            $table->string('description');
            $table->decimal('price', 9, 3);
            $table->integer('amount')->default(1);

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
        Schema::dropIfExists('invoice_rules');
    }
};
