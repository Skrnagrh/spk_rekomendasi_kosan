<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubkriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkriteria', function (Blueprint $table) {
            $table->id();
            $table->string('range');
            $table->float('nilai');
            $table->unsignedBigInteger('kriteria_id');
            $table->timestamps();

            $table->unique(['nilai', 'kriteria_id'], 'nilai_kriteria_id_unique');

            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade');
        });

        DB::statement('ALTER TABLE subkriteria ADD CONSTRAINT check_nilai_value CHECK (nilai >= 1 AND nilai <= 5);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropConstrainedForeignId('kriteria_id');
        Schema::dropIfExists('subkriteria');
    }
}
