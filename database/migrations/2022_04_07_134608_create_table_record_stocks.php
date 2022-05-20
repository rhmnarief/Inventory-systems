<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_stock');
            $table->string('editedBy');
            $table->integer('income')->default(0);
            $table->integer('exit')->default(0);
            $table->dateTime('updated')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_record_stocks');
    }
};
