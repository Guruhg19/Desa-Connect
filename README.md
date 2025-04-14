# DesaConnect --- Desa : Communication & Online Network for E-Citizen Technology

DesaConnect adalah aplikasi **Desa Digital Modern** berbasis web yang dikembangkan menggunakan Laravel 12 dan Vue 3. Aplikasi ini ditujukan untuk mempermudah proses administrasi desa dan interaksi antara pihak pemerintahan desa (kepala desa) dengan masyarakat (kepala rumah tangga).

## 📚 Tentang Proyek

Repository ini dibuat sebagai bagian dari pembelajaran pada:
**Kelas Online - Full Stack Laravel 12 & Vue 3 Developer: Website Desa Digital**

### 🎯 Fitur Utama Aplikasi
- Manajemen data penduduk
- Pengelolaan bantuan sosial
- Perencanaan pembangunan desa
- Sistem tiket acara desa terintegrasi Midtrans
- Statistik dan visualisasi data desa
- Pengajuan klaim bantuan oleh warga
- Manajemen data keluarga

---

## 🧑‍💻 Teknologi yang Digunakan

- **Laravel 12** – Backend API dan sistem autentikasi
- **Vue 3** – Frontend interaktif dan SPA (Single Page Application)
- **MySQL** – Database relasional
- **Midtrans** – Integrasi Payment Gateway

---

## 👥 Role User

1. **Kepala Desa**
   - Mengelola data penduduk, acara, bantuan sosial, dan pembangunan
2. **Kepala Rumah Tangga**
   - Melihat informasi keluarga
   - Mengajukan bantuan
   - Membeli tiket acara desa secara online


## 🧠 Penutup

Dengan **DesaConnect**, digitalisasi pelayanan masyarakat desa bukan hanya menjadi lebih mudah, tapi juga lebih cepat, transparan, dan efisien. Mari bangun masa depan digital untuk desa Indonesia!

---

## 🚀 Cara Menjalankan Proyek

### Persiapan
Pastikan sudah menginstal:
- PHP ^8.2
- Composer
- Node.js & npm
- MySQL

### Langkah-langkah
1. Clone repository:
```bash
git clone https://github.com/Guruhg19/Desa-Connect.git
cd Desa-Connect
```

2. Install dependency Laravel:
```bash
composer install
```

3. Copy file `.env`:
```bash
cp .env.example .env
```

4. Generate key:
```bash
php artisan key:generate
```

5. Buat database baru di MySQL dan sesuaikan konfigurasi di `.env`

6. Jalankan migrasi dan seeder:
```bash
php artisan migrate --seed
```

7. Install dependency frontend:
```bash
npm install && npm run dev
```

8. Jalankan server lokal:
```bash
php artisan serve
```


---

> 🌐 Repository GitHub: [DesaConnect](https://github.com/Guruhg19/Desa-Connect.git)

Silakan kontribusi, fork, dan beri bintang ⭐ jika kamu suka proyek ini!

