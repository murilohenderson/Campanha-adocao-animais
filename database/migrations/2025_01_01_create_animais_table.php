<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species'); // 'dog', 'cat'
            $table->string('breed')->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->string('age_text'); // Ex: "2 anos", "Filhote"
            $table->string('size'); // Pequeno, Médio, Grande
            $table->text('description');
            $table->string('image_path'); // Caminho da foto
            $table->boolean('is_adopted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};