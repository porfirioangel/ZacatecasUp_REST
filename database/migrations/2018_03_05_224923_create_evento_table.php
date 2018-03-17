<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'evento';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;

        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 100);
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->decimal('latitud', 12, 8);
            $table->decimal('longitud', 12, 8);
            $table->string('costo', 15);
            $table->string('descripcion', 500);
            $table->string('url_flyer', 255);
            $table->integer('categoria_evento_id')->nullable()->unsigned();

            $table->index(["categoria_evento_id"], 'fk_evento_categoria_evento_idx');

            $table->foreign('categoria_evento_id', 'fk_evento_categoria_evento_idx')
                ->references('id')->on('categoria_evento')
                ->onDelete('set null')
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
