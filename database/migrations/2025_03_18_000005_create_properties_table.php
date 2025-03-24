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
        Schema::create('properties', function (Blueprint $table) {
            $table->id(); // Cria a chave primária
            $table->foreignId('city_id')->constrained()->onDelete('restrict'); // Chave estrangeira para cities
            $table->foreignId('status_id')->constrained()->onDelete('restrict'); // Chave estrangeira para status
            $table->foreignId('type_id')->constrained('property_types')->onDelete('restrict'); // Chave estrangeira para property_types
            $table->string('title'); // Título do imóvel
            $table->text('description')->nullable(); // Descrição detalhada
            $table->string('address'); // Endereço
            $table->text('features')->nullable(); // Características adicionais
            $table->decimal('price', 10, 2); // Valor do imóvel
            $table->integer('bedrooms'); // Número de quartos
            $table->integer('bathrooms'); // Número de banheiros
            $table->decimal('land_area', 10, 2)->nullable(); // Área do terreno
            $table->decimal('built_area', 10, 2)->nullable(); // Área construída
            $table->integer('views')->default(0); // Visualizações
            $table->integer('leads_generated')->default(0); // Leads gerados (consultas/interações)
            $table->timestamp('last_update')->useCurrent(); // Última atualização
            $table->timestamps(); // Criado em / Atualizado em
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
