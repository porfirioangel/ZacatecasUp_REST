<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuenoNegocioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'dueno_negocio';

    /**
     * Run the migrations.
     * @table dueno_negocio
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('usuario_id')->unsigned();;
            $table->integer('negocio_id')->unsigned();;

            $table->index(["negocio_id"], 'fk_dueno_negocio_negocio1_idx');

            $table->index(["usuario_id"], 'fk_dueno_negocio_usuario1_idx');


            $table->foreign('usuario_id', 'fk_dueno_negocio_usuario1_idx')
                ->references('id')->on('usuario')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('negocio_id', 'fk_dueno_negocio_negocio1_idx')
                ->references('id')->on('negocio')
                ->onDelete('cascade')
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
