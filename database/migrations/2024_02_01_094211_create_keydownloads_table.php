<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeydownloadsTable extends Migration
{
    public function up()
    {
        Schema::create('keydownloads', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('file_status')->default(0);
            $table->string('client_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('keydownloads');
    }
}
