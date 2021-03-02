<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarnCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earn_categories', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100)->nullable();
            $table->string("remarks", 200)->nullable();
            $table->string("creator", 50)->nullable();
            $table->string("status", 10)->default(1);
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
        Schema::dropIfExists('earn_categories');
    }
}
