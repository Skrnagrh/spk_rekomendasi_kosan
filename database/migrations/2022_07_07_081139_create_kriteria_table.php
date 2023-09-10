<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique();
            $table->string('name');
            $table->string('description');
            $table->string('type', 10);
            $table->float('bobot');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE kriteria ADD CONSTRAINT check_bobot_value CHECK (bobot >= 1 AND bobot <= 10);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
}
