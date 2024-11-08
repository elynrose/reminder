<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinsTable extends Migration
{
    public function up()
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('lng', 10, 7)->nullable();
            $table->float('lat', 10, 7)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
