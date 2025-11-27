<h2>🌐 Deskripsi Proyek</h2>

Proyek ini adalah aplikasi web sederhana untuk memanajemen Tugas (Task Manager) yang terdiri dari data Pengguna (Users), Kategori (Categories), Tugas (Tasks), dan Komentar (Comments). Aplikasi ini dibangun menggunakan bahasa pemrograman PHP Native dan database MySQL.

Secara arsitektur, proyek ini menerapkan pola Model–View–ViewModel (MVVM) untuk memisahkan logika bisnis dan data (Model), tampilan antarmuka (View), dan logika penghubung serta transformasi data (ViewModel). Hal ini dilakukan untuk menjaga kode tetap rapi, terstruktur, dan mudah dikembangkan sesuai prinsip Separation of Concerns.

Cakupan Proyek

Manajemen Pengguna & Kategori: CRUD dasar untuk data master.

Manajemen Tugas (Tasks): CRUD lengkap dengan relasi ke Pengguna (Assignee) dan Kategori.

Manajemen Komentar: Fitur tambahan untuk memberikan komentar pada tugas spesifik.

<h2>📚 Hubungan Antar Entitas</h2>

Aplikasi ini menggunakan relasi antar tabel sebagai berikut:

One-to-Many (Users ke Tasks): 1 Pengguna dapat memiliki banyak Tugas.

One-to-Many (Categories ke Tasks): 1 Kategori dapat menaungi banyak Tugas.

One-to-Many (Tasks ke Comments): 1 Tugas dapat memiliki banyak Komentar.

Relasi diimplementasikan melalui Foreign Key (user_id, category_id, task_id).

<h2>🖼️ Desain Database</h2>

Tabel

Kolom

Keterangan

users

id, name, email, role

Data pengguna aplikasi.

categories

id, name, color

Label kategori untuk tugas.

tasks

id, title, description, status, user_id, category_id

Tabel utama. Memiliki relasi ke users dan categories.

comments

id, content, date, task_id

Komentar pada tugas. Memiliki relasi ke tasks.

<h2>📝 Struktur Program (Arsitektur MVVM)</h2>

Struktur kode dipisahkan berdasarkan tanggung jawabnya masing-masing sesuai pola MVVM dengan struktur folder TP10 sebagai berikut:

1. Config & Database

config/Database.php: Wrapper untuk koneksi database menggunakan PDO.

database/db_taskmanager.sql: File query SQL untuk setup database.

2. Models (Data Access Layer)

Bertanggung jawab merepresentasikan struktur data dan query database langsung.

models/Category.php

models/Comment.php

models/Task.php

models/User.php

3. ViewModels (Logika & Transformasi)

Bertanggung jawab menangani logika bisnis, memproses input form, dan menyediakan data siap saji untuk View.

viewmodels/CategoryViewModel.php

viewmodels/CommentViewModel.php

viewmodels/TaskViewModel.php

viewmodels/UserViewModel.php

4. Views (Tampilan Antarmuka)

Bertanggung jawab menampilkan data ke pengguna (HTML). File view disimpan langsung dalam folder views/.

Template:

views/template/header.php

views/template/footer.php

Pages:

views/category_form.php & views/category_list.php

views/comment_form.php & views/comment_list.php

views/task_form.php & views/task_list.php

views/user_form.php & views/user_list.php

5. Main

index.php: Entry point aplikasi yang mengatur routing halaman.

<h2>🚀 Fitur Aplikasi</h2>

A. Manajemen Tugas (Tasks)

Read: Menampilkan daftar tugas beserta nama Pengguna dan Kategori (hasil JOIN).

Create: Menambah tugas baru dengan memilih User dan Kategori dari dropdown.

Update: Mengedit status tugas (Pending, In Progress, Completed) dan detail lainnya.

Delete: Menghapus tugas.

B. Manajemen Master Data (Users & Categories)

CRUD: Operasi Create, Read, Update, Delete untuk data pengguna dan kategori.

Validasi: Kategori memiliki atribut warna visual.

C. Manajemen Komentar

Relation: Komentar terikat pada ID tugas tertentu.

Cascade Delete: Jika Tugas dihapus, komentar di dalamnya ikut terhapus otomatis.

<h2>⚙️ Cara Menjalankan</h2>

Persiapan Database:

Buat database baru di MySQL dengan nama db_taskmanager.

Impor file database/db_taskmanager.sql.

Konfigurasi Koneksi:

Buka file config/Database.php.

Sesuaikan konfigurasi database (host, user, password, db_name).

Jalankan:

Buka browser dan akses URL:
http://localhost/TP10/index.php

Gunakan navigasi di halaman utama untuk berpindah antar menu (Users, Categories, Tasks, Comments).

<h2>🎮 Tampilan Program</h2>

<div align="center">
<p><strong>Daftar Tugas (Task List)</strong></p>
<img src="https://www.google.com/search?q=https://via.placeholder.com/700x400%3Ftext%3DScreenshot%2BDaftar%2BTugas" alt="Daftar Tugas" width="80%" />

<p><strong>Form Tambah/Edit Tugas</strong></p>
<img src="https://www.google.com/search?q=https://via.placeholder.com/700x400%3Ftext%3DScreenshot%2BForm%2BInput" alt="Form Input" width="80%" />
</div>
