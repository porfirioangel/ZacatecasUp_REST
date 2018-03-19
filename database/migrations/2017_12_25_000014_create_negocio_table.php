<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegocioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'negocio';

    /**
     * Run the migrations.
     * @table negocio
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
            $table->decimal('latitud', 12, 8);
            $table->decimal('longitud', 12, 8);
            $table->string('descripcion_breve', 200);
            $table->text('descripcion_completa');
            $table->string('url_logo')->nullable();
            $table->string('sitio_web', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->integer('categoria_negocio_id')->nullable()->unsigned();
            $table->integer('suscripcion_id')->unsigned()->nullable();

            $table->index(["suscripcion_id"], 'fk_negocio_suscripcion1_idx');

            $table->index(["categoria_negocio_id"], 'fk_negocio_categoria_negocio1_idx');

            $table->unique(["url_logo"], 'url_logo_UNIQUE');

            $table->unique(["nombre"], 'nombre_UNIQUE');


            $table->foreign('categoria_negocio_id', 'fk_negocio_categoria_negocio1_idx')
                ->references('id')->on('categoria_negocio')
                ->onDelete('set null')
                ->onUpdate('no action');

            $table->foreign('suscripcion_id', 'fk_negocio_suscripcion1_idx')
                ->references('id')->on('suscripcion')
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
