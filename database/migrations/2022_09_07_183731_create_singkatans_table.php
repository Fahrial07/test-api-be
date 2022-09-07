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
        Schema::create('singkatans', function (Blueprint $table) {
            $table->id();
            $table->enum('id_role', ['sma', 'smk']);
            $table->string('name');
            $table->string('singkatan');
            $table->string('deskripsi');
            $table->string('status');
            $table->string('slug');
            $table->softDeletes();
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
        Schema::dropIfExists('singkatans');
    }
};
