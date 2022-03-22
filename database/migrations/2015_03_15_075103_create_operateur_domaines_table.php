<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperateurDomainesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operateur_domaines', function (Blueprint $table) {
            $table->integer("id");
            $table->integer("dom_id");
            $table->primary(['id','dom_id']);
            $table->foreign("id")->references('id')->on('users')->onDelete('cascade');
            $table->foreign("dom_id")->references('dom_id')->on('domaine_competences')->onDelete('cascade');
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
        Schema::dropIfExists('operateur_domaines');
    }
}
