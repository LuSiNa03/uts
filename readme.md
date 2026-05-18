# 🌐 Portfolio Website - Fadhil Afiq Badruzzaman

| **Nama** | Fadhil Afiq Badruzzaman |
|----------|---------------|
| **NIM** | 20240801119 |
| **Mata Kuliah** | Pemrograman Web (CR002) |
| **Dosen Pengampu** | Jefry Sunupurwa Asri, S.Kom., M.Kom |
| **Program Studi** | Teknik Informatika |
| **Universitas** | Universitas Esa Unggul |

---

## 📌 Deskripsi Proyek

Website portfolio personal ini dibuat sebagai tugas UTS mata kuliah **Pemrograman Web (CR002)**. Website ini dirancang untuk memperkenalkan diri sebagai **Junior Laravel Developer** sekaligus menampilkan portofolio proyek yang telah dikerjakan. Aplikasi ini dibangun dengan teknologi modern menggunakan Laravel 11, Filament Admin Panel, dan Docker untuk deployment.

---

## 🎯 Tujuan Pembuatan

1. ✅ Memenuhi UTS Pemrograman Web CR002
2. 🎨 Membangun personal branding sebagai Junior Developer
3. 📂 Menampilkan portofolio proyek yang telah dikerjakan
4. 📧 Menyediakan informasi kontak untuk kolaborasi
5. 🚀 Menerapkan best practices web development modern

---

## 👤 Profil Pengembang

| **Nama Lengkap** | Fadhil Afiq Badruzzaman |
|-----------------|---------------|
| **Panggilan** | Fadhil |
| **NIM** | 20240801119 |
| **Role** | Junior Laravel Developer |
| **Universitas** | Universitas Esa Unggul |
| **Program Studi** | Teknik Informatika |
| **Semester** | 4 |

### 📍 Kontak

| Platform | Informasi |
|----------|-----------|
| 📧 **Email** | fadhilafiq@student.esaunggul.ac.id |
| 📱 **Telepon** | - |

---

## 🛠️ Tech Stack

### Backend
- **PHP 8.3** dengan Laravel 11
- **Database**: MySQL/MariaDB
- **Admin Panel**: Filament
- **ORM**: Eloquent
- **Authorization**: Filament Shield & Spatie Permissions

### Frontend
- **Tailwind CSS** - Styling utility framework
- **Vite** - Build tool & bundler
- **Livewire** - Interactive components (opsional)
- **Blade Template Engine**

### DevOps & Infrastructure
- **Docker** & Docker Compose
- **Nginx** - Web server
- **SSL/TLS** - Support untuk HTTPS

### Testing & Quality
- **Pest PHP** - Testing framework
- **PHPUnit** - Unit testing
- **Pint** - Laravel code style fixer

---

## 📋 Kebutuhan Sistem

Untuk menjalankan proyek ini, pastikan sudah terinstall:
- **Docker** (versi 20.10+)
- **Docker Compose** (versi 1.29+)
- **Git** (untuk clone repository)

Atau untuk development lokal tanpa Docker:
- **PHP 8.3+**
- **Composer**
- **Node.js 18+** (untuk npm/yarn)
- **MySQL 8.0+**

---

## 🚀 Panduan Instalasi

### Opsi 1: Menggunakan Docker (Recommended)

1. **Clone repository**
   ```bash
   git clone <repository-url>
   cd uts
   ```

2. **Setup environment**
   ```bash
   cd src
   cp .env.example .env
   ```

3. **Build dan jalankan Docker**
   ```bash
   cd ..
   docker-compose up -d
   ```

4. **Setup Laravel**
   ```bash
   docker-compose exec php composer install
   docker-compose exec php php artisan key:generate
   docker-compose exec php php artisan migrate --seed
   docker-compose exec php npm install
   docker-compose exec php npm run build
   ```

5. **Akses aplikasi**
   - Website: `http://localhost`
   - Admin Panel: `http://localhost/admin`

### Opsi 2: Development Lokal

1. **Clone repository**
   ```bash
   git clone <repository-url>
   cd uts/src
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan server**
   ```bash
   # Terminal 1 - Laravel development server
   php artisan serve
   
   # Terminal 2 - Vite dev server (untuk hot reload CSS/JS)
   npm run dev
   ```

6. **Akses aplikasi**
   - Website: `http://localhost:8000`
   - Admin Panel: `http://localhost:8000/admin`

---

## 📁 Struktur Proyek

```
uts/
├── docker-compose.yml          # Docker configuration
├── readme.md                   # File dokumentasi ini
├── db/                         # Database files & configuration
│   ├── conf.d/
│   │   └── my.cnf             # MySQL configuration
│   └── data/                   # Database storage (volume)
├── nginx/                      # Nginx web server config
│   ├── Dockerfile
│   ├── default.conf
│   └── ssl/                    # SSL certificates
├── php/                        # PHP-FPM configuration
│   ├── Dockerfile
│   ├── docker-entrypoint.sh
│   └── local.ini
└── src/                        # Laravel application
    ├── app/                    # Application code
    │   ├── Console/            # Artisan commands
    │   ├── Filament/           # Admin panel customization
    │   ├── Http/               # Controllers, middleware, requests
    │   ├── Models/             # Eloquent models
    │   └── Policies/           # Authorization policies
    ├── bootstrap/              # Framework bootstrap
    ├── config/                 # Configuration files
    ├── database/
    │   ├── factories/          # Model factories
    │   ├── migrations/         # Database migrations
    │   └── seeders/            # Database seeders
    ├── public/                 # Public assets (akses web)
    ├── resources/              # Views & frontend assets
    │   ├── css/
    │   ├── js/
    │   └── views/
    ├── routes/                 # Route definitions
    │   ├── api.php            # API routes
    │   ├── web.php            # Web routes
    │   └── console.php        # Console routes
    ├── storage/               # Application storage
    ├── tests/                 # Test suites
    ├── vendor/                # Composer dependencies
    ├── artisan               # Artisan CLI
    ├── composer.json         # PHP dependencies
    ├── package.json          # Node.js dependencies
    ├── vite.config.js        # Vite bundler config
    ├── tailwind.config.js    # Tailwind CSS config
    └── phpunit.xml           # PHPUnit configuration
```

---

## 🔑 Fitur Utama

- ✅ **Responsive Design** - Mobile-friendly interface
- ✅ **Admin Panel** - Filament admin dashboard
- ✅ **Role & Permission Management** - User access control
- ✅ **Portfolio Showcase** - Display proyek terbaik
- ✅ **Contact Management** - Form komunikasi
- ✅ **SEO Optimized** - Meta tags & structured data
- ✅ **SSL/TLS Security** - Secure HTTPS connection
- ✅ **Docker Ready** - Easy deployment

---

## 📊 Database Migrations

Untuk menjalankan migrasi database:

```bash
# Menggunakan Docker
docker-compose exec php php artisan migrate

# Development lokal
php artisan migrate
```

Untuk rollback:
```bash
docker-compose exec php php artisan migrate:rollback
```

---

## 🧪 Testing

Menjalankan test suite:

```bash
# Menggunakan Docker
docker-compose exec php php artisan test

# Development lokal
php artisan test

# Dengan coverage report
php artisan test --coverage
```

---

## 🎨 Frontend Development

### Tailwind CSS

Rebuild CSS saat development:
```bash
npm run dev      # Development with watch mode
npm run build    # Production build
```

---

## 📦 Environment Variables

File `.env` utama:

```env
APP_NAME="Portfolio Website"
APP_ENV=production
APP_DEBUG=false
APP_KEY=                    # Diisi otomatis dengan: php artisan key:generate
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=db                  # Service name di docker-compose
DB_PORT=3306
DB_DATABASE=uts
DB_USERNAME=root
DB_PASSWORD=your_password

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=cookie

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
```

---

## 🚀 Deployment

### Deployment ke Production

1. **Build Docker images**
   ```bash
   docker-compose -f docker-compose.yml build
   ```

2. **Push ke registry** (opsional)
   ```bash
   docker tag uts-php:latest your-registry/uts-php:latest
   docker push your-registry/uts-php:latest
   ```

3. **Deploy dengan Docker**
   ```bash
   docker-compose -f docker-compose.yml up -d
   ```

---

## 🐛 Troubleshooting

### Docker issues

**Masalah**: Port sudah digunakan
```bash
# Hentikan container yang berjalan
docker-compose down

# Atau gunakan port berbeda di docker-compose.yml
```

**Masalah**: Permission denied saat akses storage
```bash
docker-compose exec php chown -R www-data:www-data /app/storage
```

### Laravel issues

**Masalah**: Migration gagal
```bash
docker-compose exec php php artisan migrate:refresh --seed
```

**Masalah**: Cache issue
```bash
docker-compose exec php php artisan cache:clear
docker-compose exec php php artisan config:cache
```

---

## 📝 Perintah Artisan Berguna

```bash
# Migrasi
php artisan migrate
php artisan migrate:fresh --seed

# Cache
php artisan cache:clear
php artisan config:cache
php artisan view:cache

# Tinker (Interactive Shell)
php artisan tinker

# Generate sitemap (jika tersedia)
php artisan sitemap:generate

# Seed database
php artisan db:seed
```

---

## 📚 Resources & Documentation

- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com/docs)
- [Tailwind CSS](https://tailwindcss.com)
- [Docker Documentation](https://docs.docker.com)
- [MySQL Documentation](https://dev.mysql.com/doc)

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan akademis sebagai tugas UTS Mata Kuliah Pemrograman Web (CR002) Universitas Esa Unggul.

---

## 👨‍💻 Author

**Fadhil Afiq Badruzzaman**
- 📧 Email: fadhilafiq@student.esaunggul.ac.id
- 📱 Phone: -
- 🏫 NIM: 20240801119

---

## 📅 Timeline Pengerjaan

- **Mulai**: [Tanggal Mulai]
- **Selesai**: [Tanggal Selesai]
- **Status**: ✅ Selesai

---

## 📝 Catatan Pengembang

> Proyek ini merupakan hasil pembelajaran dalam mata kuliah Pemrograman Web. Semua fitur telah diuji dan siap untuk digunakan. Feedback dan saran perbaikan sangat diterima.

---

*Last Updated: 2026-05-18*
