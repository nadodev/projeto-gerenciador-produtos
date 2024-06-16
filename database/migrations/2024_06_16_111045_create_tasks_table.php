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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // id da tarefa
            $table->unsignedBigInteger('project_id'); // referência ao projeto
            $table->string('name'); // nome da tarefa
            $table->text('description')->nullable(); // descrição da tarefa
            $table->date('due_date'); // data de vencimento da tarefa
            $table->unsignedBigInteger('user_id')->nullable(); // referência ao usuário atribuído
            $table->string('status'); // status da tarefa
            $table->timestamps(); // timestamps para created_at e updated_at

            // Definindo chaves estrangeiras
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
