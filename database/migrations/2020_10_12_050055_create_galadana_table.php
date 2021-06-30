<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaladanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galadana', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('gambar');
            $table->text('cerita');
            $table->string('target_capaian');
            $table->string('progres_capaian');
            $table->datetime('batas_waktu');
            $table->string('status')->nullable();
            $table->integer('user_id');
            $table->integer('kategori_id');
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
        Schema::dropIfExists('galadana');
    }
}
