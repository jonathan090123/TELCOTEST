# 📦 Panduan Menggunakan Static Website

## 🎯 Tujuan Folder Ini

Folder `static-website` berisi **HANYA** file HTML, CSS, dan JavaScript murni **TANPA** Laravel atau Blade Template Engine. Ini sempurna untuk:

✅ Menunjukkan ke teman tanpa dependency Laravel  
✅ Deploy ke hosting static (GitHub Pages, Netlify, Vercel)  
✅ Menggunakan sebagai template untuk framework lain  
✅ Presentasi atau prototype  
✅ Learning reference  

## 📁 Struktur Folder (Overview)

```
static-website/
├── index.html                  ← Buka ini terlebih dahulu
├── css/
│   ├── style.css              ← Global styles
│   └── auth.css               ← Login/Register styles
├── js/
│   ├── auth.js                ← Form validation
│   └── utilities.js           ← Helper functions
├── auth/
│   ├── login.html
│   └── register.html
├── admin/
│   ├── index.html             ← Menu admin
│   ├── dashboard.html
│   ├── paket-data/
│   ├── transaksi/
│   └── users/
├── customer/
│   ├── index.html             ← Menu customer
│   ├── dashboard.html
│   ├── paket-data/
│   ├── transaksi/
│   └── profile/
├── README.md                  ← Dokumentasi lengkap
├── STRUCTURE.md               ← Penjelasan struktur
└── GETTING_STARTED.md         ← File ini
```

## 🚀 Cara Menggunakan

### Option 1: Buka dengan Double-Click
1. Buka folder `static-website`
2. Double-click file `index.html`
3. Browser akan membuka secara otomatis

### Option 2: Buka dengan Live Server (VS Code)
1. Buka folder `static-website` di VS Code
2. Right-click `index.html`
3. Pilih "Open with Live Server"

### Option 3: Drag ke Browser
1. Buka folder `static-website`
2. Drag file `index.html` ke browser window

### Option 4: Local Server
Jika menggunakan Python:
```bash
cd static-website
python -m http.server 8000
# Buka: http://localhost:8000
```

## 📱 Menu Utama

Setelah membuka `index.html`, Anda akan melihat:

### 1. **Halaman Beranda**
   - Hero section
   - Carousel showcase paket data
   - Navigation ke login & admin/customer

### 2. **Login** (Link: auth/login.html)
   - Email + Password form
   - Demo credentials:
     - **Admin**: admin@telcoapp.com / password123
     - **Customer**: user@telcoapp.com / password123

### 3. **Register** (Link: auth/register.html)
   - Form pendaftaran lengkap
   - Validation error messages

### 4. **Admin Panel**
   - Menu: admin/index.html
   - Dashboard dengan statistics
   - Management pages:
     - Paket Data
     - Transaksi
     - Users

### 5. **Customer Portal**
   - Menu: customer/index.html
   - Dashboard dengan overview
   - Pages:
     - Paket Data
     - Transaksi
     - Profile

## 🧪 Testing Features

### Form Validation
Coba masukkan data tidak valid:
- Email tanpa @
- Password kurang dari 6 karakter
- Password tidak cocok saat register

### Responsive Design
- Buka DevTools (F12)
- Pilih Device Toolbar
- Test di berbagai ukuran

### Data Table Search
- Halaman paket-data/transaksi/users
- Gunakan search field
- Coba sort dengan click kolom header

### Carousel
- Di halaman beranda
- Click arrow untuk navigasi
- Click dot indicator untuk jump

## 💾 File Size

Total folder: **~210 KB** (sangat ringan!)

- HTML files: ~145 KB
- CSS files: ~30 KB
- JavaScript files: ~33 KB

## 🔗 Quick Navigation Paths

```
Beranda          → index.html
Login            → auth/login.html
Register         → auth/register.html
Admin Menu       → admin/index.html
Admin Dashboard  → admin/dashboard.html
Customer Menu    → customer/index.html
Customer Dashboard → customer/dashboard.html
```

## 📤 Cara Mengirim ke Teman

### Option 1: ZIP Folder
```bash
# Windows: Right-click → Send to → Compressed folder
# Mac: Right-click → Compress
# Linux: zip -r static-website.zip static-website/
```

### Option 2: Upload ke GitHub
```bash
git init
git add static-website/
git commit -m "Static website - TelcoApp"
git push origin main
```

### Option 3: Deploy ke Netlify
1. Drag folder ke https://app.netlify.com/drop
2. Website langsung live dengan URL

### Option 4: Deploy ke Vercel
1. Push ke GitHub
2. Import di vercel.com
3. Auto deploy

### Option 5: Deploy ke GitHub Pages
```bash
git add static-website/
git commit -m "Add static website"
git push origin main
# Aktifkan Pages di settings
```

## ✅ Checklist Sebelum Mengirim

- [ ] Semua link berfungsi
- [ ] Form validation bekerja
- [ ] CSS ter-load dengan benar
- [ ] JS console tidak ada error
- [ ] Responsive di mobile
- [ ] Images/icons muncul
- [ ] Navbar berfungsi
- [ ] Carousel jalan

## 🐛 Troubleshooting

### CSS tidak muncul?
- Pastikan membuka via browser, bukan file explorer
- Clear cache browser (Ctrl+Shift+Delete)
- Check console untuk path errors

### JavaScript error?
- Buka DevTools Console (F12)
- Check untuk JavaScript errors
- Pastikan file utilities.js ter-load

### Link tidak berfungsi?
- Check path di href attribute
- Pastikan file HTML exist
- Use relative path yang benar

### Images tidak muncul?
- Saat ini menggunakan placeholder (via.placeholder.com)
- Ganti dengan URL image sendiri

## 📝 Customization

### Ganti Warna
Di `css/style.css`:
```css
--primary-color: #667eea;  /* Ganti color code */
--secondary-color: #764ba2;
```

### Ganti Nama Aplikasi
Cari "TelcoApp" di semua HTML files, replace dengan nama baru

### Ganti Data
Hardcoded data ada di:
- Table content
- Package prices
- User credentials
- Transaction records

## 🔐 Security Notes

⚠️ **PENTING**: File ini HANYA untuk DEMO/FRONTEND!

Jangan gunakan untuk production karena:
- Tidak ada backend authentication
- Data tidak tersimpan
- Tidak ada HTTPS/security
- Demo credentials terbuka

## 📚 Documentation

Baca juga:
- **README.md** - Overview & general info
- **STRUCTURE.md** - Penjelasan struktur lengkap
- **GETTING_STARTED.md** - File ini

## 🎓 Learning Resources

Di folder ini belajar:
- HTML semantic structure
- CSS responsive design
- JavaScript validation
- Form handling
- DOM manipulation
- Event listeners
- Local storage
- Fetch API basics

## 🔄 Next Steps

1. ✅ Explore semua halaman
2. ✅ Test form validation
3. ✅ Check responsive design
4. ✅ Customize sesuai kebutuhan
5. ✅ Kirim ke teman/klien
6. ✅ Deploy ke hosting

## 📞 Support

Jika ada pertanyaan:
1. Cek documentation files
2. Check browser console (F12)
3. Review HTML/CSS/JS files
4. Hubungi developer

## 📄 License

Folder ini free untuk digunakan. Sesuaikan dengan kebutuhan Anda.

---

**Happy Coding! 🚀**

Last Updated: 22 November 2025
