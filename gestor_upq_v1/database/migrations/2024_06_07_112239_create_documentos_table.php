<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id_documento');
            $table->string('clave_profesor');
            $table->string('periodo');
            $table->string('clave_categoria');
            $table->string('clave_subcategoria');
            $table->integer('consecutivo');
            $table->string('nombre_archivo');
            $table->timestamps(); // esto crea 'created_at' y 'updated_at'
            $table->string('ubicacion_archivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
