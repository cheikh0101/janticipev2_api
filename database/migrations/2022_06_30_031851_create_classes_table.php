<?php

use App\Models\AnneeAcademique;
use App\Models\Niveau;
use App\Models\Specialite;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Niveau::class)->constrained();
            $table->foreignIdFor(Specialite::class)->constrained();
            $table->foreignIdFor(AnneeAcademique::class)->constrained();
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
        Schema::dropIfExists('classes');
    }
}
