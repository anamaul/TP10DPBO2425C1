<h1>🧾 Janji</h1>

> Saya Muhammad Maulana Adrian dengan NIM 2408647 mengerjakan Tugas Praktikum 10
> dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka
> saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

---

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
Struktur kode dipisahkan berdasarkan tanggung jawabnya masing-masing sesuai pola MVVM.
1. Config & Database
config/Database.php: Wrapper untuk koneksi database menggunakan PDO.
database/kitchen.sql: File query SQL untuk setup database.
2. Models (Data Access Layer)
Bertanggung jawab merepresentasikan struktur data dan query database langsung.
models/User.php: Class representasi objek Pengguna.
models/Category.php: Class representasi objek Kategori.
models/Task.php: Menangani Query CRUD tabel tasks (termasuk JOIN).
models/Comment.php: Class representasi objek Komentar.
3. ViewModels (Logika & Transformasi)
Bertanggung jawab menangani logika bisnis, memproses input form, dan menyediakan data siap saji untuk View.
viewmodels/TaskViewModel.php: Mengatur logika halaman tugas, validasi input, dan komunikasi dengan Model.
viewmodels/UserViewModel.php: Mengatur logika pengguna.
viewmodels/CategoryViewModel.php: Mengatur logika kategori.
4. Views (Tampilan Antarmuka)
Bertanggung jawab menampilkan data ke pengguna (HTML). View tidak boleh akses database langsung.
views/template/header.php & footer.php: Template layout utama.
views/task/task_list.php: Menampilkan tabel daftar tugas.
views/task/task_form.php: Form untuk tambah/edit tugas.
(Serta file view lain untuk Users, Categories, dan Comments).
5. Main
index.php: Entry point aplikasi yang mengatur routing halaman (?action=add, dll).
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
Cascade Delete: Jika Tugas dihapus, komentar di dalamnya ikut terhapus otomatis (via Database Constraint).
<h2>⚙️ Cara Menjalankan</h2>
Persiapan Database:
Buat database baru di MySQL dengan nama db_taskmanager.
Impor file database/kitchen.sql (atau query SQL yang disediakan).
Konfigurasi Koneksi:
Buka file config/Database.php.
Sesuaikan konfigurasi berikut:
private $host = "localhost";
private $db_name = "db_taskmanager";
private $username = "root";
private $password = ""; // Sesuaikan password mysql Anda


Jalankan:
Buka browser dan akses: http://localhost/DPBO_MVVM/index.php.
Gunakan navigasi untuk berpindah antar modul pengelolaan data.

<h2>🎮 Tampilan Program</h2>
