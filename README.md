# 🌐 WEB APPLICATION - SISMTEM INFORMASI SAMPAH ANDALAN (SISA) 👨‍🌾
![sisa](https://github.com/erditona/SISA/assets/91595733/a160985f-9187-41b3-81f6-cb39ec793604)

## 📋 Deskripsi
Selamat datang di proyek Sistem Informasi Geografis! Aplikasi ini menampilkan informasi lokasi Tempat Sampah baik TPS,TPA, dan TPS terdekat dari pengguna. Aplikasi menampilkan lokasi pada peta berupa lokasi menggunakan marker dan circle point untuk menandakan wilayah pelayanan. Peta yang digunakan adalah peta penerapan API Google Maps.

## 🚀 Fitur Utama
- Menampilkan peta interaktif dengan marker untuk lokasi.
- Menandai wilayah layanan menggunakan circle point.
- Mengelola data lokasi dan wilayah layanan melalui antarmuka admin.

## 🛠️ Tech Stack
![Laravel](https://img.shields.io/badge/Framework-Laravel-red.svg)
![JavaScript](https://img.shields.io/badge/Frontend-JavaScript-yellow.svg)
![Google Maps API](https://img.shields.io/badge/Library-Google%20Maps%20API-green.svg)
![Bootstrap](https://img.shields.io/badge/Frontend-Bootstrap-blue.svg)
![AdminLTE](https://img.shields.io/badge/Frontend-AdminLTE-lightgrey.svg)
![MySQL](https://img.shields.io/badge/Database-MySQL-blue.svg)

- **Framework:** Laravel
- **Frontend:** JavaScript, Google Maps API, Bootstrap, AdminLTE
- **Database:** MySQL

## 📋 Gambaran Umum 
Aplikasi ini dibangun menggunakan Laravel sebagai framework, Google Maps API untuk menampilkan peta di frontend, serta Bootstrap dan AdminLTE untuk tampilan antarmuka yang responsif dan menarik. Aplikasi ini memungkinkan pengguna untuk melihat lokasi menggunakan marker dan area layanan menggunakan circle point.


## 📄 Panduan Memulai 🚀

Untuk mendapatkan salinan lokal dan menjalankannya, ikuti langkah-langkah sederhana ini.

### Prasyarat ✅

- PHP (>=7.3)
- Composer (https://getcomposer.org/)
- MySQL
- API Key Google Maps (https://developers.google.com/maps/documentation/javascript/get-api-key)

### Instalasi ⚙️

1. **Clone repositori:**
   ```sh
   git clone https://github.com/yourusername/yourproject.git
2. **Masuk ke direktori proyek:**
   ```sh
   cd yourproject
3. **Instal dependensi Composer:**
   ```sh
   composer install
4. **Atur konfigurasi database di file `.env`:**
   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=username_database
   DB_PASSWORD=password_database
5. **Tambahkan API Key Google Maps di file `.env`:**
   ```dotenv
   GOOGLE_MAPS_API_KEY=your_google_maps_api_key
6. **Generate key aplikasi:**
   ```sh
   php artisan key:generate
7. **Migrasi dan seed database:**
   ```sh
   php artisan migrate --seed
8. **Jalankan server pengembangan:**
   ```sh
   php artisan serve
9. **Menjalankan Aplikasi 🌐**
Buka browser dan navigasikan ke http://localhost:8000 untuk melihat aplikasi berjalan.



## ✨Terima Kasih
Kami ingin mengucapkan terima kasih kepada semua kontributor yang telah membantu membangun proyek ini! 🙏
Jika Anda memiliki pertanyaan atau saran, jangan ragu untuk menghubungi kami di [erditona.my.id](https://erditona.my.id).
