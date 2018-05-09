<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports_tbl', function (Blueprint $table) {
            $table->increments('sp_id');
            $table->string('sp_name');
            $table->string('sp_type');
            $table->string('sp_brand');
            $table->integer('sp_price');
            $table->string('sp_img');
            $table->string('type_id');
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
        Schema::dropIfExists('sports_tbl');
    }
}
