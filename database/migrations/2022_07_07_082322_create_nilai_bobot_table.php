<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiBobotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_bobot', function (Blueprint $table) {
            $table->id();
            $table->float('nilai');
            $table->unsignedBigInteger('kriteria_id');
            $table->unsignedBigInteger('alternatif_id');
            $table->timestamps();

            $table->unique(['kriteria_id', 'alternatif_id'], 'kriteria_id_alternatif_id_unique');

            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade');
            $table->foreign('alternatif_id')->references('id')->on('alternatif')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropConstrainedForeignId('kriteria_id');
        Schema::dropConstrainedForeignId('alternatif_id');
        Schema::dropIfExists('nilai_bobot');
    }
}
