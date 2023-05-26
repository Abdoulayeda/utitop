<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('ref_facture')->unique();
            $table->integer('numero');
            $table->string('slug')->nullable();
            $table->enum('status',['impayer', 'payer']);

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->unsignedBigInteger('bon_commande_id');
            $table->foreign('bon_commande_id')->references('id')->on('bon_commandes');

            $table->dateTime('created_at')->date_format('Y/m/d');
            $table->dateTime('updated_at')->date_format('Y/m/d');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
