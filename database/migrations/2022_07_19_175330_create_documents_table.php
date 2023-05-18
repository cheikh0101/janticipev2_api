<?php

use App\Models\Classe;
use App\Models\Cour;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('file')->nullable();
            $table->text('description')->nullable();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Cour::class)->constrained();
            $table->foreignIdFor(Classe::class)->constrained();
            $table->foreignIdFor(Type::class)->constrained();
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
        Schema::dropIfExists('documents');
    }
}
