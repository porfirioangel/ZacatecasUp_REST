<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtiquetaNegocioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'etiqueta_negocio';

    /**
     * Run the migrations.
     * @table etiqueta_negocio
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('negocio_id')->unsigned();
            $table->integer('palabra_clave_id')->unsigned();

            $table->index(["palabra_clave_id"], 'fk_etiquetas_negocio_palabra_clave1_idx');

            $table->index(["negocio_id"], 'fk_etiquetas_negocio_negocio1_idx');


            $table->foreign('negocio_id', 'fk_etiquetas_negocio_negocio1_idx')
                ->references('id')->on('negocio')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('palabra_clave_id', 'fk_etiquetas_negocio_palabra_clave1_idx')
                ->references('id')->on('palabra_clave')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
