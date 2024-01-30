<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('masyarakat_id');
            $table->unsignedBigInteger('kategori_id');
            $table->date('tanggalpengaduan');
            $table->text('isipengaduan');
            $table->enum('status', ['New', 'Process', 'Selesai', 'DiTolak'])->default('New');
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
        Schema::dropIfExists('pengaduan');
    }
}
