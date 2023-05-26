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
        Schema::create('bon_commandes', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->unique();
            $table->integer('numero')->unique();
            $table->string('slug')->nullable()->unique();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('client_id')->unique();
            $table->foreign('client_id')->references('id')->on('clients'); 
            

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
        Schema::dropIfExists('bon_commandes');
    }
};
