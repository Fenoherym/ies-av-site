<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('numInscription');
            $table->dateTime('datebirth');
            $table->string('adress');
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('photoUrl');
            $table->foreignId('parcours_id')->constrained()->onDelete('cascade');
            $table->foreignId('niveau_id')->constrained()->onDelete('cascade');
            $table->foreignId('annee_scolaire_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('etudiants');
    }
}
