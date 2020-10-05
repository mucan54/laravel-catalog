<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product_id')->nullable();
            $table->bigInteger('user_id');
            $table->string('user_name');
            $table->string('product_name')->nullable();
            $table->string('search')->nullable();
            $table->string('location')->nullable();
            $table->string('device')->nullable();
            $table->string('session');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
}
