<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Tabel Users (Pengguna)
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'pengajar', 'siswa']); 
            $table->timestamps();
        });
        

        // Tabel Courses (Kursus)
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->foreignId('id_pengajar')->constrained('user')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel Registrations (Pendaftaran Kursus)
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('user')->onDelete('cascade');
            $table->foreignId('id_kursus')->constrained('courses')->onDelete('cascade');
            $table->date('tanggal_daftar');
            $table->timestamps();
        });

        // Tabel Materials (Materi Kursus)
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kursus')->constrained('courses')->onDelete('cascade');
            $table->string('judul');
            $table->text('konten');
            $table->string('tautan_video')->nullable();
            $table->timestamps();
        });

        // Tabel Transactions (Transaksi Pembayaran)
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('user')->onDelete('cascade');
            $table->foreignId('id_kursus')->constrained('courses')->onDelete('cascade');
            $table->enum('status_pembayaran', ['Menunggu', 'Berhasil', 'Gagal']);
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('materials');
        Schema::dropIfExists('registrations');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('user');
    }
};
