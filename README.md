<p align="center">
  <b>Sistem Manajemen Kursus Online</b><br>
  <i>BElajarIN – Bersama Elu, Latihan & Ajar Jadi Asyik & INteraktif</i><br><br>
  <img src="./Logo%20Unsulbar.png" alt="Logo Unsulbar" width="150"><br><br>
  <b>Nur Avika</b><br>
  <b>D0223013</b><br><br>
  Framework Web Based<br>
  2025
</p>

---

## Role dan Fitur-fiturnya

### Admin
1. Menambah dan mengedit pengguna: nama, email, dan role (admin, pengajar, siswa).
2. Mengelola kursus: menambah dan mengedit informasi kursus (judul, deskripsi, pengajar).
3. Memvalidasi kursus yang dibuat pengajar: meninjau dan menyetujui/menolak kursus.

### Pengajar
1. Membuat dan mengelola kursus.
2. Mengunggah materi kursus (file atau video).
3. Melihat daftar siswa yang terdaftar.

### Pelajar
1. Mendaftar ke kursus yang diinginkan.
2. Mengakses materi dari kursus yang telah diikuti.
3. Melakukan pembayaran untuk kursus.

---

## Tabel-Tabel Database

### 1. `pengguna`
| Nama Field  | Tipe Data      | Keterangan                              |
|-------------|----------------|------------------------------------------|
| id          | bigIncrements  | Primary key                             |
| nama        | string         | Nama lengkap pengguna                   |
| email       | string         | Email unik untuk login                  |
| kata_sandi  | string         | Password terenkripsi                    |
| role        | enum           | Role: admin, pengajar, siswa            |
| created_at  | timestamp      | Otomatis                                |
| updated_at  | timestamp      | Otomatis                                |

---

### 2. `kursus`
| Nama Field   | Tipe Data        | Keterangan                         |
|--------------|------------------|-------------------------------------|
| id           | bigIncrements    | Primary key                        |
| judul        | string           | Judul kursus                       |
| deskripsi    | text             | Deskripsi kursus                   |
| id_pengajar  | unsignedBigInt   | Foreign key ke tabel `pengguna`    |
| created_at   | timestamp        | Otomatis                           |
| updated_at   | timestamp        | Otomatis                           |

---

### 3. `pendaftaran`
| Nama Field     | Tipe Data        | Keterangan                          |
|----------------|------------------|--------------------------------------|
| id             | bigIncrements    | Primary key                         |
| id_pengguna    | unsignedBigInt   | Foreign key ke tabel `pengguna`     |
| id_kursus      | unsignedBigInt   | Foreign key ke tabel `kursus`       |
| tanggal_daftar | date             | Tanggal pendaftaran                 |

---

### 4. `materi`
| Nama Field    | Tipe Data        | Keterangan                         |
|---------------|------------------|-------------------------------------|
| id            | bigIncrements    | Primary key                        |
| id_kursus     | unsignedBigInt   | Foreign key ke tabel `kursus`      |
| judul         | string           | Judul materi                       |
| konten        | text             | Isi materi                         |
| tautan_video  | string           | Link video (jika ada)              |

---

### 5. `transaksi`
| Nama Field         | Tipe Data        | Keterangan                          |
|--------------------|------------------|--------------------------------------|
| id                 | bigIncrements    | Primary key                         |
| id_pengguna        | unsignedBigInt   | Foreign key ke tabel `pengguna`     |
| id_kursus          | unsignedBigInt   | Foreign key ke tabel `kursus`       |
| status_pembayaran  | enum             | Menunggu, Berhasil, Gagal           |
| jumlah             | integer          | Nominal pembayaran                  |

---

## Jenis Relasi dan Tabel yang Berelasi

| No | Tabel 1   | Relasi | Tabel 2     | Jenis Relasi                        |
|----|-----------|--------|-------------|-------------------------------------|
| 1  | pengguna  | ➝      | kursus      | One to Many                        |
| 2  | pengguna  | ⇄      | kursus      | Many to Many (via pendaftaran)      |
| 3  | kursus    | ➝      | materi      | One to Many                         |
| 4  | pengguna  | ➝      | transaksi   | One to Many                         |
| 5  | kursus    | ➝      | transaksi   | One to Many                         |
| 6  | pengguna  | ➝      | pendaftaran | One to Many                         |
| 7  | kursus    | ➝      | pendaftaran | One to Many                         |

---

## Penjelasan Relasi

1.	Satu pengguna (pengajar) bisa mengelola lebih dari satu kursus.
2.	Banyak pengguna (pelajar) bisa mendaftar ke banyak kursus
3.	Satu kursus bisa memiliki banyak materi.
4.	Satu pengguna (pelajar) bisa melakukan banyak transaksi pembayaran untuk kursus yang diikuti.
5.	Satu kursus bisa memiliki banyak transaksi dari siswa yang mendaftar.
6.	Satu pengguna (pelajar) bisa memiliki banyak pendaftaran kursus.
7.	Satu kursus bisa memiliki banyak pendaftar (pelajar yang mendaftar).

---
