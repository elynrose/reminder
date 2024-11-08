<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPinsTable extends Migration
{
    public function up()
    {
        Schema::table('pins', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_10251816')->references('id')->on('locations');
            $table->unsignedBigInteger('reminder_id')->nullable();
            $table->foreign('reminder_id', 'reminder_fk_10251817')->references('id')->on('reminders');
        });
    }
}
