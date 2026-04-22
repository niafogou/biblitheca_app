<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livre', function (Blueprint $table) {
            $table->id();

            $table->string('libelle');
            $table->text('description');
            $table->integer('nb_page')->default(0);
            $table->string('image');

            $table->foreignId('categorie_id')->constrained('categorie')->onDelete('cascade');
            $table->foreignId('auteur_id')->constrained('auteur')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livre');
    }
};