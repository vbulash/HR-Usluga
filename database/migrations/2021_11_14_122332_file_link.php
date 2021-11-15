<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FileLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filelinks', function (Blueprint $table) {
			$table->id();
			$table->string('filename')->unique();
			$table->integer('linkcount')->default(1);
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
        Schema::table('filelinks', function (Blueprint $table) {
			Schema::dropIfExists('filelinks');
        });
    }
}
