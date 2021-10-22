<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('email');
            $table->string('nominal');
            $table->string('status');
            $table->string('bukti_pembayaran')->nullable();
            $table->text('komen')->nullable();
            $table->boolean('anonim')->nullable()->default(0);
            $table->unsignedBigInteger('galadana_id');
            $table->dateTime('batas_date');
            $table->timestamps();
            $table->foreign('galadana_id')->references('id')->on('galadana')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donates');
    }
}
