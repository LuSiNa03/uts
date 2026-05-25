# 🌐 Portfolio Website - Fadhil Afiq Badruzzaman

<div align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-red?style=for-the-badge&logo=laravel" alt="Laravel 12">
  <img src="https://img.shields.io/badge/Filament-3.x-amber?style=for-the-badge&logo=laravel" alt="Filament 3">
  <img src="https://img.shields.io/badge/Docker-Ready-blue?style=for-the-badge&logo=docker" alt="Docker Ready">
  <img src="https://img.shields.io/badge/Theme-Maroon_&_Off--White-800000?style=for-the-badge" alt="Maroon Theme">
</div>

---

## 👤 Identitas Pengembang & Mahasiswa
*   **Nama Lengkap:** Fadhil Afiq Badruzzaman
*   **NIM:** 20240801119
*   **Mata Kuliah:** Pemrograman Web (CR002)
*   **Dosen Pengampu:** Jefry Sunupurwa Asri, S.Kom., M.Kom
*   **Program Studi:** Teknik Informatika
*   **Universitas:** Universitas Esa Unggul

---

## 📌 Deskripsi Proyek
Website portfolio personal premium ini dibangun khusus sebagai pemenuhan **Ujian Tengah Semester (UTS) Pemrograman Web**. Memadukan kekuatan arsitektur backend **Laravel 12**, panel administrasi instan **Filament v3**, serta infrastruktur modern berbasis **Docker**.

Website ini telah disesuaikan sepenuhnya dengan estetika visual kelas atas, mengadopsi tema warna **Merah Maroon (#800000)** dan **Off-white (#FAF9F6)** yang elegan, bersih, dan tampak sangat profesional untuk penilalan akademik maupun portofolio karir nyata.

---

## 🎯 Spesifikasi & Fitur Kustom yang Diterapkan

1.  🎨 **Desain Palet Warna Kustom:**
    *   Mengadopsi kombinasi warna kontras premium: Maroon hangat, Maroon-soft pastel untuk latar elemen, border merah muda halus, dan latar belakang Off-white bersih.
2.  🔄 **Sinkronisasi Database Proyek Otomatis:**
    *   Menerapkan deteksi data otomatis di sisi controller (`PortfolioController`). Begitu website utama dikunjungi, proyek utama **"E-Bikes Rental Platform"** akan langsung terdaftar di database MariaDB dengan link GitHub aktif Anda, sehingga langsung tersinkronisasi di Admin Panel secara otomatis!
3.  🛡️ **Layout Bebas Tabrakan (Zero Overlap Layout):**
    *   Navigasi menu atas dibuat melayang (*floating glassmorphism*) dengan jarak aman konten utama sebesar `140px` agar tidak menutupi atau bertabrakan dengan judul halaman sub-menu.
4.  📧 **Tombol Kontak Skala Besar (Stacked & Enlarged):**
    *   Halaman kontak mengusung tombol kartu bertumpuk vertikal dengan ukuran besar (`p-6`, `rounded-3xl`, `shadow-lg`) untuk memastikan alamat email Anda yang panjang (`fadhilafiqbadruzzaman2402@gmail.com`) tertulis penuh, rapi, dan responsif di semua perangkat mobile, dilengkapi efek animasi membesar saat kursor melayang (*hover scale*).
5.  🚲 **Tampilan "Project Saya" (E-Bikes Platform):**
    *   Proyek sepeda listrik Anda ditandai secara kustom di halaman utama dan portofolio dengan lencana kuning **`⭐ Project Saya`**, berstatus **`On Progress`**, dan terhubung langsung ke repositori GitHub Anda: [LuSiNa03/ebikes-2026](https://github.com/LuSiNa03/ebikes-2026).
6.  ⚡ **Tailwind CSS Play CDN Failsafe:**
    *   Dilengkapi dengan pemuat Tailwind CDN otomatis di sisi layout untuk mengantisipasi jika kompiler *Vite* di dalam container Docker lokal Anda tidak dijalankan. Desain layout dijamin akan selalu tampil cantik sempurna kapan saja dan di mana saja.

---

## 🛠️ Tech Stack
*   **Backend:** PHP 8.3 dengan Laravel 12.x
*   **Database:** MariaDB 10.11
*   **Admin Panel:** Filament v3 (Manajemen User, Profil, dan Proyek)
*   **Keamanan & Hak Akses:** Spatie Permission / Filament Shield
*   **Frontend:** Blade Engine, Vanilla CSS Custom Tokens, Tailwind CSS, JS
*   **DevOps & Server:** Docker, Docker Compose, Nginx (dengan dukungan HTTPS/SSL lokal)

---

## 📂 Struktur Folder Proyek
```
uts/
├── docker-compose.yml          # Konfigurasi container Docker
├── readme.md                   # File dokumentasi utama ini
├── db/                         # File penyimpanan data & konfigurasi MariaDB
├── nginx/                      # Konfigurasi Nginx & Sertifikat SSL lokal
├── php/                        # Kustomisasi container PHP-FPM
└── src/                        # Source Code Aplikasi Laravel 12
    ├── app/                    # Controller, Model, & Filament Resources
    ├── database/               # Migrasi Tabel & Database Seeder kustom
    ├── public/                 # Folder publik
    └── resources/views/        # Blade Templates (Home, Projects, Contact, Layout)
```

---

## 🚀 Panduan Instalasi & Menjalankan Website

### Prasyarat
*   Docker & Docker Compose terinstal di komputer.

### Cara Menjalankan:
1.  Buka terminal di folder utama proyek `uts` Anda.
2.  Jalankan perintah untuk menyalakan Docker:
    ```bash
    docker-compose up -d
    ```
3.  Akses website Anda di browser:
    *   **Halaman Utama:** [https://portofolio.test](https://portofolio.test)
    *   **Admin Panel:** [https://portofolio.test/admin](https://portofolio.test/admin)

---

## 👨‍💻 Author / Developer
**Fadhil Afiq Badruzzaman**
*   📧 **Email:** fadhilafiqbadruzzaman2402@gmail.com
*   🔗 **GitHub:** [https://github.com/LuSiNa03](https://github.com/LuSiNa03)
*   🚲 **Project Saya (E-Bikes Platform):** [https://github.com/LuSiNa03/ebikes-2026](https://github.com/LuSiNa03/ebikes-2026)
*   🏫 **NIM:** 20240801119
*   🏫 **Universitas Esa Unggul** - Teknik Informatika

---
*Terakhir Diperbarui: 2026-05-25 — Disiapkan dengan sempurna untuk Penilaian UTS Pemrograman Web.*
