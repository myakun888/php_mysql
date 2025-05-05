<?php
//! pastikan kita sudah membuat database nya
/**
 * lalu siapkan nama username
 * nama password databse ,  jika kosong tulis dengan kutip "";
 * untuk contoh ini host nya localhost karena kita local
 * jika online mungkin dengan ip addres dari server , hosting nya
 * 
 * 
 */

 //* ini adalah datanya 
$database = "phpmysql";
$user = 'root';
$pass = 'muhammad';


try {
   // kita membuat object dari class pdo 
   $koneksi = new PDO("mysql:host=localhost;dbname=$database",$user,$pass);
   echo "koneksi berhasil";

   // menutup koneksi
   $koneksi = null;

} catch (PDOException $e) {
   echo $e->getMessage();
}

/**
 * pada block try akan mengekseskusi jika koneksi berjalan dengan baik
 * dan pada block catch mengeksuksi jika terjadi error 
 * 
 * saat kode berjalan dengan baik, maka program berjalan dari atas ke bawah lalu kita info dengan echo "koneksi berhasil"
 * setelah itu kita tutup koneksi nya;
 * 
 */