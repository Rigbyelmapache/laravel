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
        //
        Schema::table('productos', function (Blueprint $table) {
        
       
       

        //la clave foranea
      
         $table->foreign('categoria_id')
              ->references('categoria_id')
              ->on('categoriastable')
              ->onDelete('cascade');
        
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
