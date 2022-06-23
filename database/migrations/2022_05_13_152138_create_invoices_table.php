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
        Schema::create('invoices', function (Blueprint $table) {

            // Generate ID.
            $table->id();

            // Relations.
            $table->bigInteger('client_id')->unsigned()->index();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            // Table content.
            $table->bigInteger('id_invoice')->unsigned();
            $table->date('invoice_date');
            $table->integer('vat')->default(21);
            $table->boolean('is_payed')->default(0);

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
        Schema::dropIfExists('invoices');
    }
};
