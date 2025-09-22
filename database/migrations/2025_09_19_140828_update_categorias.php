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
        Schema::table('categoriastable', function (Blueprint $table) {
        $table->renameColumn('id','categoria_id');
        $table->string('nombre',100);  
       
    });
    }
    // usar change para cambiar las propiedas y solo para columnas existentes 
    // renameColumn para renombrar columnas
    // para agregar una columna nueva solo usar $table->string('nombre',100);
    // para eliminar una columna usar $table->dropColumn('nombre');

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
