<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) { // PERBAIKAN 1: Nama tabel sebaiknya plural 'umkms'
            $table->id(); // PERBAIKAN 2: Tambahkan primary key 'id'
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // PERBAIKAN 3: Cara yang benar untuk foreign key user_id

            $table->string('name');
            $table->string('category');
            $table->string('district');
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Ini sudah benar untuk menyimpan path gambar

            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umkms'); // PERBAIKAN 1: Hapus tabel 'umkms'
    }
};