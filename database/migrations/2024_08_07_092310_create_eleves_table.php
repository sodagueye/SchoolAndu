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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('ien');
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->date('dateDeNaissance');
            $table->date('sexe');
            // $table->foreignId('etabllissement_id')->constrained()->onDelete('cascade');
            // $table->foreignId('classe_id')->constrained()->onDelete('cascade');
            // $table->foreignId('parenteleve_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
