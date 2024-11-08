<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('due_date')->nullable();
            $table->boolean('notify_me')->default(0)->nullable();
            $table->boolean('completed')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
