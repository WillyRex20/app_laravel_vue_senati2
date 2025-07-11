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
        Schema::create('tipo_documento', function (Blueprint $table) {
            $table->id('id_tipo_documento');
            $table->string('nombre_documento', 150);
            $table->string('codigo',5);
            $table->boolean('estado')->default(true);
            $table->integer('orden');
            $table->timestamps();
        });

        schema::create('tipo_pago', function (Blueprint $table){
            $table->id('id_tipo_pago');
            $table->string('nombre_pago', 150);
            $table->string('codigo',5);
            $table->boolean('estado')->default(true);
            $table->integer('orden');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_documento');
    }
};
