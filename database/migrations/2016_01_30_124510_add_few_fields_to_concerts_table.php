<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFewFieldsToConcertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('concerts', function (Blueprint $table) {
          $table->string('artist');
          $table->string('lieu');
          $table->text('adresse');
          $table->string('ville');
          $table->timestamp('date');
          $table->float('prix');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
