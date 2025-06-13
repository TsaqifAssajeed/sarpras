# Tutorial Menjalankan Aplikasi Sarpras

## Persyaratan Sistem
- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Node.js & NPM
- Git

## Langkah-langkah Instalasi

### 1. Clone Repository (jika menggunakan Git)
```bash
git clone <repository-url>
cd sarpras
```

### 2. Install Dependencies PHP
```bash
composer install
```

### 3. Install Dependencies JavaScript
```bash
npm install
```

### 4. Konfigurasi Environment
- Copy file `.env.example` menjadi `.env`
```bash
cp .env.example .env
```
- Generate application key
```bash
php artisan key:generate
```

### 5. Setup Database

#### 5.1 Persiapan MySQL
1. Pastikan MySQL server sudah berjalan
2. Masuk ke MySQL menggunakan command prompt:
   ```bash
   mysql -u root
   ```
   Atau jika menggunakan password:
   ```bash
   mysql -u root -p
   ```

3. Buat database baru:
   ```sql
   CREATE DATABASE sarpras;
   EXIT;
   ```

#### 5.2 Konfigurasi Laravel
1. Edit file `.env` dan sesuaikan dengan kredensial MySQL Anda:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sarpras
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   
   **Penting**: 
   - Jika MySQL tidak menggunakan password (seperti di Laragon/XAMPP default), kosongkan DB_PASSWORD
   - Jika MySQL menggunakan password, isi DB_PASSWORD dengan password yang sesuai

2. Setelah konfigurasi database benar, jalankan migrasi:
   ```bash
   php artisan migrate
   ```

3. (Opsional) Jalankan seeder jika ada data awal:
   ```bash
   php artisan db:seed
   ```

#### 5.3 Troubleshooting Database
Jika muncul error "Access denied for user 'root'@'localhost'":

1. Reset password root MySQL:
   ```bash
   mysql -u root -p
   ```
   Jika tidak bisa masuk, gunakan Laragon/XAMPP MySQL admin atau PHPMyAdmin

2. Di dalam MySQL prompt:
   ```sql
   ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '';
   FLUSH PRIVILEGES;
   EXIT;
   ```
   
3. Atau buat user baru:
   ```sql
   CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'password';
   GRANT ALL PRIVILEGES ON sarpras.* TO 'laravel'@'localhost';
   FLUSH PRIVILEGES;
   ```
   Lalu update `.env` dengan user baru tersebut

### 6. Compile Asset
```bash
npm run dev
```

### 7. Jalankan Aplikasi
Buka terminal baru dan jalankan:
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## Akses Aplikasi
1. Buka browser dan akses `http://localhost:8000`
2. Login menggunakan kredensial default:
   ```
   Username: admin
   Password: admin
   ```
   
   Catatan: Kredensial ini akan tersedia setelah menjalankan database seeder (`php artisan db:seed`)

## Troubleshooting

Jika menemui masalah:

1. Pastikan semua persyaratan sistem terpenuhi
2. Periksa log error di `storage/logs/laravel.log`
3. Pastikan folder `storage` dan `bootstrap/cache` memiliki permission yang benar
4. Jika ada masalah dengan database, coba:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

## Struktur Folder Penting

- `app/` - Berisi logic aplikasi (Controllers, Models, dll)
- `resources/views/` - Berisi file-file tampilan
- `routes/web.php` - Berisi definisi routing
- `database/migrations/` - Berisi file migrasi database
- `public/` - Berisi asset publik (css, js, images)

## Pengembangan

Untuk mode development:
1. Jalankan `npm run dev` untuk compile asset secara realtime
2. Di terminal terpisah, jalankan `php artisan serve`
