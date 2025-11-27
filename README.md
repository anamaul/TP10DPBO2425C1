<h1>Janji</h1>
Saya Muhammad Maulana Adrian dengan NIM 2408647 mengerjakan Tugas Praktikum 10
dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka
saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

<h2>🌐 Deskripsi Proyek</h2>

Proyek ini adalah aplikasi web sederhana untuk memanajemen Tugas (**Task Manager**) yang mencakup pengelolaan data **Pengguna** (Users), **Kategori** (Categories), **Tugas** (Tasks), dan **Komentar** (Comments). Aplikasi ini dibangun menggunakan **PHP Native** dan database **MySQL**.

Secara arsitektur, proyek ini menerapkan pola **Model–View–ViewModel (MVVM)**. Tujuannya adalah memisahkan logika bisnis dan akses data (_Model_), tampilan antarmuka (_View_), serta logika penghubung dan transformasi data (_ViewModel_). Hal ini menjaga kode tetap rapi, terstruktur, dan mudah dikembangkan sesuai prinsip _Separation of Concerns_.

### Cakupan Fitur

- **Manajemen Pengguna & Kategori**: CRUD dasar untuk data master.
- **Manajemen Tugas (Tasks)**: CRUD lengkap dengan relasi (Foreign Key) ke Pengguna dan Kategori.
- **Manajemen Komentar**: Fitur diskusi yang terhubung pada tugas spesifik.
- **Data Binding**: Implementasi manual binding data dari View ke Model melalui ViewModel.

---

## 📚 Hubungan Antar Entitas (ERD)

Aplikasi ini menggunakan relasi antar tabel sebagai berikut:

- **One-to-Many (Users ➔ Tasks)**: 1 Pengguna dapat memiliki banyak Tugas.
- **One-to-Many (Categories ➔ Tasks)**: 1 Kategori dapat menaungi banyak Tugas.
- **One-to-Many (Tasks ➔ Comments)**: 1 Tugas dapat memiliki banyak Komentar.

> Relasi diimplementasikan menggunakan _Foreign Key_ (`user_id`, `category_id`, `task_id`) dengan aksi _Cascade_ atau _Set Null_ pada database.

---

## 🖼️ Desain Database

Berikut adalah struktur tabel yang digunakan dalam `db_taskmanager`:

| Tabel          | Kolom Utama                                                      | Keterangan                                                   |
| :------------- | :--------------------------------------------------------------- | :----------------------------------------------------------- |
| **users**      | `id`, `name`, `email`, `role`                                    | Data pengguna (Admin, Staff, Manager).                       |
| **categories** | `id`, `name`, `color`                                            | Label kategori dengan atribut warna visual.                  |
| **tasks**      | `id`, `title`, `description`, `status`, `user_id`, `category_id` | Tabel transaksional utama. Berelasi ke Users dan Categories. |
| **comments**   | `id`, `content`, `date`, `task_id`                               | Diskusi pada tugas. Berelasi ke Tasks.                       |

---

## 📝 Struktur Program (Arsitektur MVVM)

Struktur kode dipisahkan berdasarkan tanggung jawabnya masing-masing:

TP10/
├── config/
│   └── Database.php          # Wrapper koneksi PDO MySQL
├── models/                   # (Model) Query SQL langsung
│   ├── Category.php
│   ├── Comment.php
│   ├── Task.php
│   └── User.php
├── viewmodels/               # (ViewModel) Logika Bisnis & Penghubung
│   ├── CategoryViewModel.php
│   ├── CommentViewModel.php
│   ├── TaskViewModel.php
│   └── UserViewModel.php
├── views/                    # (View) Tampilan HTML
│   ├── template/
│   │   ├── header.php
│   │   └── footer.php
│   ├── category_form.php
│   ├── category_list.php
│   ├── task_form.php
│   ├── task_list.php
│   ├── user_form.php
│   ├── user_list.php
│   ├── comment_form.php
│   └── comment_list.php
├── index.php                 # Entry Point & Routing
└── README.md                 # Dokumentasi Proyek

<h2>🚀 Detail Fitur</h2>
A. Manajemen Tugas (Tasks)
* Read: Menampilkan daftar tugas dengan JOIN tabel Users dan Categories untuk menampilkan nama (bukan ID).
* Create: Form input menggunakan Dropdown (Select Option) yang datanya diambil dinamis dari tabel referensi.
* Update: Mengedit status tugas (Pending, In Progress, Completed) dan detail lainnya.
* Delete: Menghapus tugas dari database.

B. Manajemen Master Data
* Users: Menambah, mengedit, dan menghapus data staff/admin.
* Categories: Manajemen label tugas beserta kode warna (Hex Color) untuk visualisasi.

C. Komentar
* Relasi: Komentar terikat pada ID tugas tertentu.
* View: Tombol "Lihat Komentar" pada setiap tugas untuk melihat riwayat diskusi.

<h2>⚙️ Cara Menjalankan</h2>
Persiapan Database:
* Buat database baru di phpMyAdmin dengan nama db_taskmanager.
* Impor file SQL yang disediakan (atau copy query SQL pembuatan tabel).
* Pastikan tabel users, categories, tasks, dan comments sudah terbentuk.

Konfigurasi Koneksi:
* Buka file config/Database.php.
* Sesuaikan konfigurasi berikut:

PHP
private $host = "localhost";
private $db_name = "db_taskmanager";
private $username = "root"; // Sesuaikan user db
private $password = "";     // Sesuaikan password db

Jalankan Aplikasi:

Simpan folder proyek di dalam htdocs (jika menggunakan XAMPP).

Buka browser dan akses URL: http://localhost/TP10/index.php

🎮 Tampilan Program
