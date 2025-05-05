<?php

//* sql injection
require_once __DIR__ . "/../helper/getKoneksi.php";

use function helper\koneksi\getKoneksi;


try {
   $koneksi = getKoneksi();

   // $username = "messi"; // ini normal
   // $pass= "alhamdulillah";
   // $sql = " select * from admin where username = '$username' and password = '$pass'";

   //todo jika ingin testing sql injection hapus komentar ini, dan tutup komentar diatas kecuali koneksi
   // $username = "messi';#";
   // $pass = "salah";
   // $sql = " select * from admin where username = '$username' and password = '$pass'";


   //todo dengan function , menangani sql injection
   //todo jika mengaktifkan function quote penulisan pada sql nya tidak perlu lagi tanda quote pada $variabel nya ' '
   $username = $koneksi->quote("messi';#");
   $pass = $koneksi->quote("alhamdulillah");
   $sql = " select * from admin where username = $username and password = $pass";





   $hasil = $koneksi->query($sql); // jika benar dia akan true

   $sttus = false; // ini hanya pemancing / triger

   foreach ($hasil as $key => $value) {

      echo "$value[username]" . PHP_EOL;
      $sttus = true;
   }

   if ($sttus) {
      echo "sukses login";
   } else {
      echo "gagal login";
   }
} catch (PDOException $e) {
   echo $e->getMessage();
}


//* rangkuman
/**
 * sql injection ini adalah teknik yang memanfaatkan kelemahan pada layer basi data , 
 * tapi bisa kita tanggani denagn funciton quote , 
 * cara ini cukup baik tapi ini masih secra manual 
 * 
 * akan ada lebih baik kita bisa menggunakan sql statement ,ini akan di bahas di materi kusus
 * 
 * 
 */