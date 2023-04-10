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
        Schema::table('passenger', function (Blueprint $table) {
            /**
             *  Modificando a estrutura da tabela:
             * 
             *      $table->string('cpf', 14)->unique();
             * 
             *  Modificando as propriedades de uma coluna (change()):
             * 
             *      $table->string('cpf', 14)->unique()->change();
             */
            $table->string('cpf', 14)->unique()->comment('Registro único do passageiro.')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passenger', function (Blueprint $table) {
            $table->dropColumn('cpf');
        });

        Schema::table('passenger', function (Blueprint $table) {
            $table->string('cpf', 14);
        });
    }
};
