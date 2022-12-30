<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concours', function (Blueprint $table) {
            $table->id();
            $table->string('depot');
            $table->string('date_concours')->nullable();
            $table->string('convocation')->nullable();
            $table->text('dossiers');
            $table->string('droit_concours');
            $table->boolean('isConcours')->default(true);
            $table->foreignId('annee_scolaire_id')->constrained()->onDelete('cascade');
            $table->foreignId('filiere_category_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('concours');
    }
}
