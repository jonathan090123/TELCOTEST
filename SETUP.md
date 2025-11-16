# 🚀 Panduan Setup TelcoApp - TELCOTEST

## Ringkasan Perubahan

### 1. **Struktur Rute yang Disesuaikan**
- **Paket Data (Public)**: Semua orang bisa melihat daftar dan detail paket tanpa login
  - `GET /paket-data` → Daftar paket
  - `GET /paket-data/{id}` → Detail paket
  
- **Paket Data (Require Auth)**: Hanya user yang login bisa membeli dan melihat riwayat
  - `GET /paket-data/{id}/beli` → Form beli paket
  - `POST /paket-data/{id}/beli` → Proses pembelian
  - `GET /paket-data/riwayat/pembelian` → Riwayat transaksi

### 2. **Database Fields Ditambahkan**
- `users` table: `phone` (string), `role` (string - default: 'customer')
- `paket_data` table: lengkap dengan semua field yang diperlukan
- `transaksi` table: menyimpan semua transaksi user

### 3. **Form Register Diperbarui**
- Ditambahkan field `phone` pada form registrasi

### 4. **Login Page Info**
- Menampilkan credential dummy untuk testing

---

## ⚙️ Setup Aplikasi

### Step 1: Install Dependencies
```bash
composer install
npm install
```

### Step 2: Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### Step 3: Configure Database
Edit `.env` dan atur database sesuai sistem Anda:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=telcotest
DB_USERNAME=root
DB_PASSWORD=
```

### Step 4: Jalankan Migration dan Seeder
```bash
php artisan migrate:fresh --seed
```

Perintah ini akan:
- ✅ Reset database
- ✅ Membuat semua tabel (users, paket_data, transaksi, dll)
- ✅ Membuat akun dummy (Admin & Customer)
- ✅ Membuat 5 paket data dummy

### Step 5: Jalankan Aplikasi
```bash
php artisan serve
```

Buka browser di: **http://localhost:8000**

---

## 📋 Akun Demo untuk Testing

### Admin Account
- **Email**: `admin@telcoapp.com`
- **Password**: `password123`
- **Akses**: Dashboard Admin, Kelola Paket Data, Manajemen User

### Customer Account
- **Email**: `user@telcoapp.com`
- **Password**: `password123`
- **Akses**: Dashboard, Lihat Paket, Beli Paket, Riwayat Transaksi

---

## 🗂️ Struktur Menu Utama

### Home Page (/)
- Navbar dengan link ke semua halaman
- Tombol Login/Logout dinamis berdasarkan auth status
- Tombol Paket Data untuk guest users

### Navigation Items
- **Beranda** → Home page
- **Paket Data** → Lihat daftar paket (public)
- **Tentang** → Halaman tentang aplikasi
- **Profile** → Profile user (auth only)
- **Dashboard** → User dashboard (auth only)
- **Login** → Halaman login (guest only)

---

## 🔐 Fitur Utama

### ✅ Authentication
- ✓ Login
- ✓ Register dengan field: Name, Email, Phone, Password
- ✓ Logout
- ✓ Profile management
- ✓ Update profile & password

### ✅ Paket Data
- ✓ Lihat daftar paket (public)
- ✓ Lihat detail paket (public)
- ✓ Beli paket (auth required)
- ✓ Riwayat transaksi (auth required)
- ✓ Admin: CRUD paket data

### ✅ Admin
- ✓ Dashboard admin
- ✓ Manage paket data (Create, Read, Update, Delete)
- ✓ Manage users (View list)

---

## 📝 Testing Checklist

- [ ] Akses halaman Home tanpa login
- [ ] Klik menu "Paket Data" → lihat daftar paket tanpa login
- [ ] Klik tombol "Beli Sekarang" → redirect ke login (expected behavior)
- [ ] Login dengan akun customer
- [ ] Klik menu "Paket Data" → lihat daftar paket
- [ ] Klik "Beli Sekarang" → bisa akses form pembelian
- [ ] Akses dashboard customer
- [ ] Logout
- [ ] Login dengan akun admin
- [ ] Akses admin panel
- [ ] Manage paket data (create, edit, delete)

---

## 🐛 Troubleshooting

### Database Error
```bash
# Reset database dan seed ulang
php artisan migrate:fresh --seed
```

### Akun dummy tidak ada
```bash
# Jalankan seeder
php artisan db:seed
```

### Routes tidak ter-register
```bash
# Clear route cache
php artisan route:clear
php artisan cache:clear
```

---

## 📧 Dummy Data Summary

| Type | Email | Phone | Password | Role |
|------|-------|-------|----------|------|
| Admin | admin@telcoapp.com | 08123456789 | password123 | admin |
| Customer | user@telcoapp.com | 08987654321 | password123 | customer |

**Paket Data Dummy** (5 paket tersedia):
1. Paket Freedom 3GB - Rp 99.000
2. Paket Unlimited 5GB - Rp 149.000
3. Paket Premium 10GB - Rp 199.000
4. Paket Hemat 1GB - Rp 29.000
5. Paket Booster 15GB - Rp 299.000

---

**✨ Aplikasi siap digunakan!**
