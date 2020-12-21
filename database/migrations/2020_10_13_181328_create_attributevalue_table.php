<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributevalueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributevalue', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->timestamps();
            $table->string('name');
            //$table->integer('attribute_id')->unsigned();
            //$table->foreign('attribute_id')->references('id')->on('attribute')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributevalue');
    }
}
