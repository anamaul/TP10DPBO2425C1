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

TP10/<br>
├── config/<br>
│   └── Database.php          # Wrapper koneksi PDO MySQL<br>
├── models/                   # (Model) Query SQL langsung<br>
│   ├── Category.php<br>
│   ├── Comment.php<br>
│   ├── Task.php<br>
│   └── User.php<br>
├── viewmodels/               # (ViewModel) Logika Bisnis & Penghubung<br>
│   ├── CategoryViewModel.php<br>
│   ├── CommentViewModel.php<br>
│   ├── TaskViewModel.php<br>
│   └── UserViewModel.php<br>
├── views/                    # (View) Tampilan HTML<br>
│   ├── template/<br>
│   │   ├── header.php<br>
│   │   └── footer.php<br>
│   ├── category_form.php<br>
│   ├── category_list.php<br>
│   ├── task_form.php<br>
│   ├── task_list.php<br>
│   ├── user_form.php<br>
│   ├── user_list.php<br>
│   ├── comment_form.php<br>
│   └── comment_list.php<br>
├── index.php                 # Entry Point & Routing<br>
└── README.md                 # Dokumentasi Proyek<br>

<h2>🚀 Detail Fitur</h2>

A. Manajemen Tugas (Tasks)<br>
* Read: Menampilkan daftar tugas dengan JOIN tabel Users dan Categories untuk menampilkan nama (bukan ID).<br>
* Create: Form input menggunakan Dropdown (Select Option) yang datanya diambil dinamis dari tabel referensi.<br>
* Update: Mengedit status tugas (Pending, In Progress, Completed) dan detail lainnya.<br>
* Delete: Menghapus tugas dari database.<br>

B. Manajemen Master Data<br>
* Users: Menambah, mengedit, dan menghapus data staff/admin.<br>
* Categories: Manajemen label tugas beserta kode warna (Hex Color) untuk visualisasi.<br>

C. Komentar<br>
* Relasi: Komentar terikat pada ID tugas tertentu.<br>
* View: Tombol "Lihat Komentar" pada setiap tugas untuk melihat riwayat diskusi.<br>

<h2>⚙️ Cara Menjalankan</h2>

Persiapan Database:<br>
* Buat database baru di phpMyAdmin dengan nama db_taskmanager.<br>
* Impor file SQL yang disediakan (atau copy query SQL pembuatan tabel).<br>
* Pastikan tabel users, categories, tasks, dan comments sudah terbentuk.<br>

Konfigurasi Koneksi:<br>
* Buka file config/Database.php.<br>
* Sesuaikan konfigurasi berikut:<br>

PHP<br>
private $host = "localhost";<br>
private $db_name = "db_taskmanager";<br>
private $username = "root"; // Sesuaikan user db<br>
private $password = "";     // Sesuaikan password db<br>

Jalankan Aplikasi:<br>
Simpan folder proyek di dalam htdocs (jika menggunakan XAMPP).<br>
Buka browser dan akses URL: http://localhost/TP10/index.php<br>

🎮 Tampilan Program<br>

https://github.com/user-attachments/assets/08a95c94-fd20-4f85-95a7-13acf2173893
