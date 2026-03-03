# Marketplace Catering (Laravel)

Project web sederhana untuk manajemen:
- Menu dan kategori
- Customer
- Pesanan (order)
- Invoice

Stack:
- PHP `^8.2`
- Laravel `^12`
- PostgreSQL (recommended di project ini)
- PHP extension `pdo_pgsql` dan `pgsql` aktif
- Bootstrap 5

## Setup Cepat

1. Clone project lalu masuk folder project.
2. Install dependency backend:
```bash
composer install
```
3. (Opsional frontend) install dependency Vite:
```bash
npm install
```
4. Copy env:
```bash
cp .env.example .env
```
Untuk PowerShell:
```powershell
Copy-Item .env.example .env
```
5. Generate key:
```bash
php artisan key:generate
```
6. Atur koneksi database di `.env`:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nama_database
DB_USERNAME=postgres
DB_PASSWORD=*****
```
7. Migrate + seed:
```bash
php artisan migrate:fresh --seed
```
8. Jalankan app:
```bash
php artisan serve
```

App akan jalan di `http://localhost:8000`.

## Akun Default

Seeder membuat user default:
- Email: `test@example.com`
- Password: `password`

## Alur Pakai Utama

1. Buka `Menu` untuk lihat daftar menu.
2. Buka `Pesanan` lalu klik `Buat Pesanan`.
3. Isi customer, tanggal antar, menu, quantity.
4. Simpan, lalu cek `Detail` pesanan.
5. Dari `Detail` pesanan, buat invoice.
6. Buka `Invoice` untuk lihat daftar dan detail invoice.

## Struktur Modul (Status Saat Ini)

- `Menu`: basic CRUD jalan.
- `Customer`: basic CRUD jalan.
- `Order`: list, create, show jalan.
- `Invoice`: list, create, show jalan.
- `Merchant`: masih scaffold, belum complete.
- `Category`: list + store ada, CRUD belum complete.
- `OrderMenu`: masih scaffold/legacy, belum jadi flow utama.

## Catatan Teknis Penting

- Nama tabel pivot order-menu di migration adalah `order__menus` (double underscore), bukan `order_menus`.
- Relasi model sudah diarahkan ke `order__menus`.
- Kalau habis ubah relasi / route / view dan masih lihat error lama, jalankan:
```bash
php artisan optimize:clear
```

## Seeder Yang Tersedia

- `CategorySeeder`
- `CustomerSeeder`
- `MenuSeeder`
- `OrderSeeder`
- `OrderMenuSeeder`
- `InvoiceSeeder`
- `MerchantSeeder`

Semua dipanggil dari `DatabaseSeeder`.

## Troubleshooting

- Error `relation "order_menus" does not exist`:
  - Pastikan migration terbaru sudah dijalankan (`migrate:fresh --seed`).
  - Pastikan relasi model `Order` pakai tabel `order__menus`.
- Halaman detail kosong:
  - Pastikan method `show()` controller return view.
  - Jalankan `php artisan optimize:clear`.

## Next Improvement (Opsional)

- Multi-menu dalam 1 pesanan (saat ini 1 order = 1 menu + qty).
- Lengkapi CRUD Category, Merchant, dan OrderMenu.
- Tambah validasi yang lebih strict dan flash message sukses/gagal.
