<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relasi pengaduan ke kategori
        Schema::table('pengaduan', function(Blueprint $table){
            $table->foreign('kategori_id')->references('id')->on('kategoripengaduan')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('masyarakat_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        });

        // relasi tanggapan ke pengaduan dan users

        Schema::table('tanggapan', function(Blueprint $table){
            $table->foreign('users_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('pengaduan_id')->references('id')->on('pengaduan')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
