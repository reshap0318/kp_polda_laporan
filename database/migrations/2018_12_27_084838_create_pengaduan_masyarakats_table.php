<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduanMasyarakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan_masyarakats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jenis');
            $table->string('nama');
            $table->string('email');
            $table->string('telpon');
            $table->string('stpl')->nullable();
            $table->string('polres')->nullable();
            $table->string('polsek')->nullable();
            $table->text('uraian')->nullable();
            $table->string('alamat');
            $table->text('pengaduan');
            $table->text('foto');
            $table->multipolygon('geom', "GEOMETRY", 0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan_masyarakats');
    }
}
