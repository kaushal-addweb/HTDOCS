<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('industries');
            $table->string('technologies');
            $table->string('frameworks');
            $table->string('department');
            $table->string('role');
            $table->string('team');
            $table->date('dateofjoin');
            $table->date('dateofbirth');
            $table->text('personalinfo');
            $table->string('documents');
            $table->text('description');
            $table->string('status');
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
        Schema::dropIfExists('resources');
    }
}
