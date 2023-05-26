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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('entreprise');
            $table->string('telephone')->unique();
            $table->string('email')->nullable();
            $table->string('adresse');
            $table->string('slug')->nullable()->unique();
            

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->unsignedBigInteger('abonnement_id');
            $table->foreign('abonnement_id')->references('id')->on('abonnements');

            $table->unsignedBigInteger('formule_id');
            $table->foreign('formule_id')->references('id')->on('formules');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
