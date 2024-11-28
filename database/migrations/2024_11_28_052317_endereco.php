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
        Schema::create('enderecoorganizacoes', function (Blueprint $table) {
            $table->id();
    
            $table->string('cep');
            $table->string('estado');
            $table->string('rua');
            $table->string('numero');
           // $table->string('estado');
           $table->unsignedBigInteger('organizacao_id');
           $table->foreign('organizacao_id')->references('id')->on('organizacoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecoorganizacoes');
    }
};
