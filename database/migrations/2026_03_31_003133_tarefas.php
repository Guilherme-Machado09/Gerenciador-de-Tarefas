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
        Schema::create('tarefa', function (Blueprint $table) {

            $table->id();

            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->string('status')->default('pendente');
            $table->string('prioridade')->default('media');
            $table->date('data_entrega')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
