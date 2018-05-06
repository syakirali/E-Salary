# E-Salary
Sistem penggajian online berbasis web yang dibangun menggunakan laravel framework. 

# requirement
1. php versi 7 keatas (alternatinya pakai xampp versi 3 keatas)
2. mysql-server (alternatifnya pakai xampp versi 3 keatas)
3. composer, download di https://getcomposer.org/Composer-Setup.exe

# cara instalasi di laptop
1. download project (buka https://github.com/syakirali/E-Salary lalu klik "clone or download", kemudian "download zip")
2. extract project E-Salary.zip
3. buka folder hasil extract, buat database baru bernama e-salary, lalu import file DB_E-salary.sql ke database baru di mysql-server (phpmyadmin)
4. copy file .env.example, paste di folder yang sama dan beri nama .env
5. edit file .env sesuai dengan kebutuhan (untuk localhost edit DB_HOST=localhost. atur DB_USERNAME, DB_PASSWORD sesuai dengan username dan password database yang tersedia, atur juga DB_DATABASE=e-salary sesuai dengan nama database baru yang dibuat
6. buka cmd lalu arahkan ke folder project (untuk memastikan, ketik dir, jika terdapat artisan.php beserta file lainnya anda sudah benar)
7. di cmd, ketik composer insatall
8. di cmd, ketik php artisan key:genearte
9. di cmd, ketik php artisan serve
10. buka browser, masukkan url localhost:8000, lalu enter
