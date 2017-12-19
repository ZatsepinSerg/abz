<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('parent_id');
            $table->string('surname')->index('surname');
            $table->string('name')->index('name');
            $table->string('patronymic')->index('patronymic');
            $table->string('position')->index('position');
            $table->date('date_receipt')->index('date_receipt');
            $table->integer('salary')->index('salary');
            $table->string('photo');
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
        Schema::dropIfExists('workers');
    }
}
