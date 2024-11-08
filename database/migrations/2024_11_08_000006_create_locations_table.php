<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gname')->nullable();
            $table->float('lat', 10, 7)->nullable();
            $table->float('lng', 10, 7)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
