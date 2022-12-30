<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranches', function (Blueprint $table) {
            $table->id();
            $table->boolean('isDroitOk')->default(false);
            $table->boolean('isFirstTrancheOk')->default(false);
            $table->boolean('isSecondTrancheOk')->default(false);
            $table->boolean('isThirdTrancheOk')->default(false);
            $table->foreignId('etudiant_id')->constrained();
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
        Schema::dropIfExists('tranches');
    }
}
