Katering Portal
Aplikasi Katering Portal ini dibuat dengan menggunakan Laravel untuk mengelola platform katering yang melayani dua jenis pengguna: Merchant (penyedia katering) dan Customer (kantor). Merchant dapat mengelola menu makanan mereka, sementara kantor dapat mencari dan memesan katering berdasarkan kriteria tertentu.

Fitur Utama
1. Portal Merchant
Registrasi dan Login: Merchant dapat mendaftar dan login ke portal mereka.

Pengelolaan Profil: Merchant dapat mengelola informasi profil mereka, seperti nama perusahaan, alamat, kontak, dan deskripsi.

Pengelolaan Menu: Merchant dapat menambahkan, mengedit, dan menghapus menu makanan. Setiap menu dapat mencakup deskripsi, foto, dan harga.

Daftar Order: Merchant dapat melihat daftar semua pesanan dan invoice yang masuk dari pelanggan.

2. Portal Kantor (Customer)
Registrasi dan Login: Kantor dapat mendaftar dan login untuk mengakses portal mereka.

Pencarian Katering: Kantor dapat mencari katering berdasarkan kriteria seperti lokasi dan jenis makanan.

Pembelian: Kantor dapat memilih menu, menentukan jumlah porsi, dan memilih tanggal pengiriman.

Invoice: Setelah melakukan pemesanan, sistem akan menghasilkan invoice yang dapat diakses oleh merchant dan kantor.

Struktur Direktori
```
/app
    /Http
        /Controllers
            - MenuController.php
            - OrderController.php
            - CategoryController.php
            - MerchantController.php
            - CustomerController.php
        /Models
            - Category.php
            - Menu.php
            - Order.php
            - Invoice.php
            - Merchant.php
            - Customer.php
    /Database
        /Migrations
            - 2021_01_01_create_merchants_table.php
            - 2021_01_02_create_customers_table.php
            - 2021_01_03_create_categories_table.php
            - 2021_01_04_create_menus_table.php
            - 2021_01_05_create_orders_table.php
            - 2021_01_06_create_invoices_table.php
        /Seeders
            - MerchantSeeder.php
            - CustomerSeeder.php
            - CategorySeeder.php
            - MenuSeeder.php
            - OrderSeeder.php
            - InvoiceSeeder.php
/resources
    /views
        /menus
            - create.blade.php
            - index.blade.php
        /categories
            - index.blade.php
            - create.blade.php
        /orders
            - index.blade.php
        /auth
            - login.blade.php
            - register.blade.php
/routes
    - web.php
```
Fitur Autentikasi
Untuk autentikasi, kita menggunakan Laravel Breeze atau Laravel UI untuk menangani registrasi, login, dan autentikasi pengguna.

Merchant menggunakan role untuk membedakan antara merchant dan kantor.

Customer (Kantor) dapat melakukan pencarian dan pemesanan katering.

Teknologi yang Digunakan
Laravel: PHP Framework untuk backend dan manajemen aplikasi.

Blade: Templating engine Laravel untuk tampilan.

PostgreSQL: Database yang digunakan dalam proyek ini.

Bootstrap: Framework CSS untuk desain responsif (jika menggunakan Laravel UI).
