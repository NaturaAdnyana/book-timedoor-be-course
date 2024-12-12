# KUBUKABUKU

KUBUKABUKU adalah aplikasi berbasis Laravel 10 yang digunakan untuk manajemen data buku. Proyek ini menggunakan PHP 8.1 dan MySQL sebagai database utama, dengan fitur seeding untuk pengisian data awal.

## Prasyarat

Sebelum memulai instalasi, pastikan Anda telah menginstal perangkat berikut:

-   **PHP**: Versi 8.1 atau lebih baru
-   **Composer**: Versi terbaru
-   **MySQL**: Versi terbaru

## Instalasi

Ikuti langkah-langkah berikut untuk mengatur proyek ini di lingkungan lokal Anda:

### 1. Clone Repository

Clone proyek ini dari repository GitHub:

```bash
git clone https://github.com/NaturaAdnyana/book-timedoor-be-course.git
cd book-timedoor-be-course
```

### 2. Instal Dependensi

Instal semua dependensi PHP menggunakan Composer:

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Edit file `.env` untuk menyesuaikan pengaturan database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kubukabuku
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

### 4. Generate Application Key

Jalankan perintah berikut untuk menghasilkan application key:

```bash
php artisan key:generate
```

### 5. Migrasi dan Seeding Database

Jalankan perintah berikut untuk membuat tabel dan mengisi data awal ke dalam database:

```bash
php artisan migrate --seed
```

## Menjalankan Aplikasi

Untuk menjalankan server lokal Laravel, gunakan perintah berikut:

```bash
php artisan serve
```

Akses aplikasi melalui [http://localhost:8000](http://localhost:8000).
