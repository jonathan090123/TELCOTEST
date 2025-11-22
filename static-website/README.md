# Static Website - TelcoApp

Folder ini berisi file HTML, CSS, dan JavaScript murni (tanpa framework Laravel/Blade) untuk proyek TelcoApp.

## 📁 Struktur Folder

```
static-website/
├── index.html              # Halaman utama/home
├── css/
│   ├── style.css          # Styles umum
│   └── auth.css           # Styles untuk login/register
├── js/
│   ├── auth.js            # Logic untuk authentication
│   └── utilities.js       # Utility functions
├── auth/
│   ├── login.html         # Halaman login
│   └── register.html      # Halaman register
├── admin/
│   ├── dashboard.html     # Dashboard admin
│   ├── paket-data/
│   │   └── index.html     # Kelola paket data
│   ├── transaksi/
│   │   └── index.html     # Kelola transaksi
│   └── users/
│       └── index.html     # Kelola users
└── customer/
    ├── dashboard.html     # Dashboard customer
    ├── paket-data/
    │   └── index.html     # Lihat paket data
    ├── transaksi/
    │   └── index.html     # Riwayat transaksi
    └── profile/
        └── index.html     # Profile customer
```

## 🚀 Cara Menggunakan

### 1. Membuka File
Buka file HTML menggunakan browser Anda:
- Double-click pada file HTML, atau
- Drag file ke browser, atau
- Gunakan Live Server extension di VS Code

### 2. Menu Navigasi
Setiap halaman memiliki navbar dengan menu untuk navigasi antar halaman.

### 3. Halaman Utama
- **index.html** - Halaman beranda dengan carousel paket data

### 4. Authentication
- **auth/login.html** - Login page (form validation disertakan)
- **auth/register.html** - Register page (form validation disertakan)

### 5. Admin Pages
Akses dashboard admin di `admin/dashboard.html`:
- Dashboard dengan statistik
- Kelola Paket Data
- Kelola Transaksi
- Kelola Users

### 6. Customer Pages
Akses dashboard customer di `customer/dashboard.html`:
- Dashboard dengan statistik
- Lihat Paket Data
- Riwayat Transaksi
- Profile

## 🎨 CSS Files

### style.css
- Global styles untuk navbar, buttons, forms, tables
- Responsive design untuk mobile
- Utility classes (margin, padding, colors)

### auth.css
- Styles khusus untuk halaman login/register
- Form styling dan animations

## ⚙️ JavaScript Files

### auth.js
- Form validation untuk login dan register
- Alert dan error handling
- Clear error functions

### utilities.js
- Format currency (formatCurrency)
- Format date dan time
- Mobile menu toggle
- SPA navigation
- Data table functionality
- Local storage utilities
- API utilities

## 📝 Demo Credentials

Untuk testing, gunakan akun berikut:

**Admin:**
- Email: admin@telcoapp.com
- Password: password123

**Customer:**
- Email: user@telcoapp.com
- Password: password123

## 🔄 Integrasi dengan Backend Laravel

Untuk mengintegrasikan dengan backend Laravel:

1. **Update API endpoints** di `js/utilities.js`:
   ```javascript
   const API = {
       async get(url) {
           const response = await fetch(url); // Ganti dengan endpoint Laravel
           return await response.json();
       }
       // ... methods lainnya
   }
   ```

2. **Update form actions** di HTML files:
   ```html
   <form action="/api/login" method="POST">
       <!-- Form fields -->
   </form>
   ```

3. **Update navigation links** jika struktur route berbeda

## 🎯 Features

✅ Responsive Design (Mobile, Tablet, Desktop)
✅ Form Validation (Client-side)
✅ Status Badges
✅ Data Tables dengan Search
✅ Carousel Navigation
✅ Authentication Pages
✅ Admin Dashboard
✅ Customer Dashboard
✅ Profile Management
✅ Transaction History
✅ Package Management

## 🌐 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## 📱 Mobile Responsive

Semua halaman telah dioptimalkan untuk:
- Mobile devices (320px+)
- Tablets (768px+)
- Desktop (1200px+)

## 🔐 Security Notes

**PENTING**: File ini adalah untuk DEMO/FRONTEND ONLY. 

Untuk production:
1. Implementasikan proper backend authentication
2. Gunakan HTTPS
3. Validate semua input di backend
4. Implement CSRF protection
5. Secure sensitive data
6. Implement rate limiting
7. Use proper error handling

## 📄 File Sizes

- HTML files: ~5-15 KB each
- CSS files: ~15-20 KB total
- JS files: ~20-30 KB total

Total: Kurang dari 1 MB untuk seluruh static website

## 🛠️ Troubleshooting

### Issues dengan CSS tidak loaded
- Pastikan path relatif CSS benar
- Clear browser cache (Ctrl+Shift+Delete)
- Check console untuk errors

### Form tidak berfungsi
- Check browser console untuk JavaScript errors
- Pastikan file utilities.js dan auth.js ter-load
- Verify form field IDs match dengan JavaScript

### Carousel tidak berfungsi
- Check console untuk errors
- Pastikan JavaScript enabled di browser

## 📞 Support

Untuk pertanyaan atau issues, silakan hubungi tim development.

## 📄 License

Protected - Gunakan sesuai dengan kebutuhan project.

---

**Last Updated**: 22 November 2025
**Version**: 1.0
