<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id("tic_id");
            $table->integer("id");
            $table->foreign('id')->references("id")->on("users")
            ->onDelete('cascade');
            $table->integer('ope_id');
            $table->foreign("ope_id")->references("id")->on("users")
            ->onDelete('cascade');
            $table->integer("sta_id");
            $table->foreign('sta_id')->references("sta_id")->on("statuts")
            ->onDelete('cascade');
            $table->integer("pro_id");
            $table->foreign('pro_id')->references('pro_id')->on('problemes')->onDelete('cascade');
            $table->string("tic_titre");
            $table->string("tic_description");
            $table->integer("tic_importance");
            $table->integer("tic_numposte");
            $table->date("tic_datecreation");
            $table->date("tic_dateresolution")->nullable();
            $table->string("tic_piecejointe")->nullable();
            $table->integer("tic_redirection");
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
        Schema::dropIfExists('tickets');
    }
}
