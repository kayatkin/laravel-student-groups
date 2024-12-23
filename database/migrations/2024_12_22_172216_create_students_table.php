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
        Schema::create('students', function (Blueprint $table) {
            $table->id();  // id студента
            $table->foreignId('group_id')  // Внешний ключ для связи с группой
                  ->constrained('groups')  // Связь с таблицей groups
                  ->onDelete('cascade');   // Удаление студента при удалении группы
            $table->string('surname');    // Фамилия студента
            $table->string('name');       // Имя студента
            $table->timestamps();         // created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
