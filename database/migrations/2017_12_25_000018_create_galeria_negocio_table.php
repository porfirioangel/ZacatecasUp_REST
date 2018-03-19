<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriaNegocioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'galeria_negocio';

    /**
     * Run the migrations.
     * @table galeria_negocio
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('url_foto');
            $table->integer('negocio_id')->unsigned();

            $table->index(["negocio_id"], 'fk_foto_establecimiento_negocio_idx');

            $table->unique(["url_foto"], 'url_foto_UNIQUE');

            $table->foreign('negocio_id', 'fk_foto_establecimiento_negocio_idx')
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
