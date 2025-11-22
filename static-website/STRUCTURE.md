# Struktur Static Website - TelcoApp

## 📋 Daftar Lengkap File

```
static-website/
│
├── 📄 index.html                    # Halaman utama/home dengan carousel
│
├── 📁 css/
│   ├── style.css                    # Stylesheet utama untuk semua halaman
│   └── auth.css                     # Stylesheet khusus login/register
│
├── 📁 js/
│   ├── auth.js                      # Logic form authentication & validation
│   └── utilities.js                 # Helper functions & utility
│
├── 📁 auth/                         # Folder authentication
│   ├── login.html                   # Halaman login
│   └── register.html                # Halaman register
│
├── 📁 admin/                        # Folder admin panel
│   ├── index.html                   # Menu admin (entry point)
│   ├── dashboard.html               # Dashboard admin
│   ├── 📁 paket-data/
│   │   └── index.html               # Kelola paket data
│   ├── 📁 transaksi/
│   │   └── index.html               # Kelola transaksi
│   └── 📁 users/
│       └── index.html               # Kelola users
│
├── 📁 customer/                     # Folder customer portal
│   ├── index.html                   # Menu customer (entry point)
│   ├── dashboard.html               # Dashboard customer
│   ├── 📁 paket-data/
│   │   └── index.html               # Lihat paket data
│   ├── 📁 transaksi/
│   │   └── index.html               # Riwayat transaksi
│   └── 📁 profile/
│       └── index.html               # Edit profile customer
│
├── 📄 README.md                     # Dokumentasi umum
├── 📄 STRUCTURE.md                  # File ini
└── 📄 FILE_SIZES.txt               # Estimasi ukuran file
```

## 🗺️ Navigation Map

### Dari index.html:
```
index.html (HOME)
├── auth/login.html
├── auth/register.html
├── admin/index.html (Menu)
│   ├── admin/dashboard.html
│   ├── admin/paket-data/index.html
│   ├── admin/transaksi/index.html
│   └── admin/users/index.html
└── customer/index.html (Menu)
    ├── customer/dashboard.html
    ├── customer/paket-data/index.html
    ├── customer/transaksi/index.html
    └── customer/profile/index.html
```

## 📝 Deskripsi File

### HTML Files (Total: 16 files)

#### 1. Root
- **index.html** (15KB)
  - Halaman beranda utama
  - Hero section dengan welcome message
  - Carousel untuk showcase paket data
  - Menu navigasi utama
  - Links ke admin/customer panels

#### 2. Auth Folder
- **login.html** (8KB)
  - Form login dengan email & password
  - Remember me checkbox
  - Link ke register
  - Demo credentials display
  
- **register.html** (10KB)
  - Form register dengan validation
  - Field: name, email, phone, password
  - Password confirmation
  - Link ke login

#### 3. Admin Folder
- **index.html** (6KB)
  - Menu admin portal
  - Links ke dashboard & management pages
  - Demo credentials display

- **dashboard.html** (8KB)
  - Admin dashboard dengan overview
  - Statistics cards (users, transactions, revenue, packages)
  - Quick links ke management pages
  - Current time display

- **paket-data/index.html** (12KB)
  - Table list paket data
  - Search functionality
  - Status filter
  - Edit & delete buttons

- **transaksi/index.html** (10KB)
  - Table list transaksi
  - Status indicators (pending, success, failed)
  - Transaction details
  - Daily transaction count

- **users/index.html** (11KB)
  - Table list pengguna
  - Role badges (admin, customer)
  - User management buttons
  - Total user count

#### 4. Customer Folder
- **index.html** (6KB)
  - Menu customer portal
  - Links ke dashboard & pages
  - Demo credentials display

- **dashboard.html** (8KB)
  - Customer dashboard dengan overview
  - Statistics cards (active packages, quota, spending)
  - Quick links
  - Important info section

- **paket-data/index.html** (14KB)
  - Paket cards dengan pricing
  - Quota & features display
  - Buy buttons
  - FAQ section

- **transaksi/index.html** (9KB)
  - Transaction history table
  - Status badges
  - Transaction details button
  - Filterable data

- **profile/index.html** (15KB)
  - Profile card dengan avatar
  - Editable personal info form
  - Security settings section
  - Change password button

### CSS Files (Total: 2 files)

- **css/style.css** (18KB)
  - Global styles untuk navbar, buttons, forms, tables
  - Responsive design utilities
  - Status badges
  - Utility classes (margins, padding, colors)
  - Mobile responsive breakpoints (768px)

- **css/auth.css** (12KB)
  - Styles untuk login/register pages
  - Form styling & animations
  - Alert messages styling
  - Responsive adjustments

### JavaScript Files (Total: 2 files)

- **js/auth.js** (8KB)
  - Form validation untuk login
  - Form validation untuk register
  - Error display functions
  - Alert handling
  - Field error management

- **js/utilities.js** (25KB)
  - Format currency (IDR)
  - Format date & time
  - Get greeting by time
  - Mobile menu toggle
  - SPA navigation dengan transitions
  - Data table search & sort
  - Pagination logic
  - Local storage manager
  - API utilities

### Documentation Files (Total: 3 files)

- **README.md** - Dokumentasi umum dan cara penggunaan
- **STRUCTURE.md** - File ini, penjelasan struktur lengkap
- **FILE_SIZES.txt** - Estimasi ukuran file

## 📊 Statistics

### File Count by Type
- HTML files: 16
- CSS files: 2
- JavaScript files: 2
- Documentation files: 3
- **Total: 23 files**

### Code Breakdown
- HTML: ~145 KB total
- CSS: ~30 KB total
- JavaScript: ~33 KB total
- **Total code: ~208 KB**

### Average File Size
- HTML: ~9 KB average
- CSS: ~15 KB average
- JavaScript: ~16.5 KB average

## 🎯 Feature Checklist

### Global Features
- ✅ Responsive design (mobile, tablet, desktop)
- ✅ Navbar with menu
- ✅ Mobile menu toggle
- ✅ Footer/links
- ✅ Dark/light color scheme (gradient)
- ✅ Smooth transitions

### Authentication
- ✅ Login form
- ✅ Register form
- ✅ Form validation
- ✅ Error messages
- ✅ Success alerts
- ✅ Remember me checkbox

### Admin Features
- ✅ Dashboard with statistics
- ✅ Paket data management
- ✅ Transaction management
- ✅ User management
- ✅ Search functionality
- ✅ Data filtering
- ✅ Status badges

### Customer Features
- ✅ Customer dashboard
- ✅ Package browsing
- ✅ Transaction history
- ✅ Profile management
- ✅ Password management
- ✅ Personal info editing

### UI Components
- ✅ Tables with search/sort
- ✅ Cards with hover effects
- ✅ Forms with validation
- ✅ Buttons with styles
- ✅ Status badges
- ✅ Alert messages
- ✅ Carousel
- ✅ Modals/dialogs
- ✅ Icons/emojis

## 🔄 CSS Classes & Structure

### Global Classes
```css
.navbar, .nav-container, .nav-menu, .nav-icons
.btn, .btn-primary, .btn-secondary, .btn-danger
.alert, .alert-success, .alert-danger
.form-group, .form-control, .form-check
table, thead, tbody, td, th
.status-badge, .status-success, .status-pending
```

### Responsive Breakpoints
```css
Max-width: 768px (mobile)
```

## 🌐 Navigation Flow

```
START: index.html
├── AUTH PATH:
│   ├── login.html → [Success] → admin/index.html OR customer/index.html
│   └── register.html → [Success] → login.html
│
├── ADMIN PATH:
│   ├── admin/index.html
│   ├── admin/dashboard.html
│   ├── admin/paket-data/index.html
│   ├── admin/transaksi/index.html
│   └── admin/users/index.html
│
└── CUSTOMER PATH:
    ├── customer/index.html
    ├── customer/dashboard.html
    ├── customer/paket-data/index.html
    ├── customer/transaksi/index.html
    └── customer/profile/index.html
```

## 💾 Data Structure

### Package Data
```javascript
{
    id: 1,
    name: "Paket Hemat",
    quota: "3 GB",
    price: 25000,
    description: "Internet 3GB/bulan",
    status: "active"
}
```

### Transaction Data
```javascript
{
    id: "TRX001",
    user_email: "user@example.com",
    package_name: "Paket Hemat",
    amount: 25000,
    status: "success", // pending, failed
    date: "2025-01-22 10:30"
}
```

### User Data
```javascript
{
    id: 1,
    name: "John Doe",
    email: "john@example.com",
    phone: "08123456789",
    role: "customer", // admin
    created_at: "2025-01-01"
}
```

## 🚀 Getting Started Quick Link

1. **Open index.html** - Start from home
2. **Click "Login"** - Go to login page
3. **Use demo credentials** - Admin or Customer
4. **Explore** - Browse different sections
5. **Test forms** - Try validation & alerts

## 📱 Mobile Optimization

- All pages responsive at 768px breakpoint
- Touch-friendly buttons (min 40px height)
- Mobile menu toggle
- Proper font sizes for readability
- Optimized table layouts for mobile

## 🔐 Security Notes

This is a FRONTEND-ONLY static website for demo/prototype purposes.
- No real data stored
- No authentication backend
- Demo credentials shown in alerts
- All data is hardcoded
- Form submissions are simulated

For production use:
- Implement proper backend authentication
- Use HTTPS
- Secure sensitive data
- Implement CSRF protection
- Add rate limiting
- Use proper error handling

---

**Version**: 1.0
**Last Updated**: 22 November 2025
**Total Pages**: 16 HTML files
**Total Size**: ~208 KB
