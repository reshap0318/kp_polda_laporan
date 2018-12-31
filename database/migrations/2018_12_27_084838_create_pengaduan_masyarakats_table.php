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
            $table->string('telpon');
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->string('terlapor')->nullable();
            $table->timestamp('waktu_kejadian');
            $table->string('tempat_kejadian')->nullable();
            $table->text('pengaduan');
            $table->string('stpl')->nullable();
            $table->string('polres')->nullable();
            $table->string('polsek')->nullable();
            $table->text('foto')->nullable();
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
