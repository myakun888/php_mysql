<?php


require_once __DIR__."/../helper/getKoneksi.php";
use function helper\koneksi\getKoneksi;

$koneksi = getKoneksi();

$username = "nabi muhammad";
$pass = "rasulallah";

// menggunakan prepare statement


{
   //* cara satu binding parameter
   $sql = "select * from admin where username = :username and password= :password"; // penulisan string nya menggunkan titik dua : , pada paremater yang ingin kita binding

$result = $koneksi->prepare($sql); // kita melakukan prepare statement

$result->bindParam("username",$username); // lalu melakukan binding param
$result->bindParam("password",$pass);
$result->execute(); // kita execute untuk mengeksekusi dan menyimpan hasilnya

// kita iterasi untuk melihat hasilnya
foreach ($result as $key => $value) {
   echo "$value[username]".PHP_EOL;
}
echo "berhasil 1 , dengan cara binding param".PHP_EOL.PHP_EOL;

}




//* cara ke dua , binding dengan index atau posisiton parameter

{
   //penulisan perintah string sql nya dengan tanda ? untuk parameter nya
   $sql = "select * from admin where username = ? and password= ?"; // penulisan string nya menggunakan tanda ?  pada paremater yang ingin kita binding
   
   $result = $koneksi->prepare($sql); // kita melakukan prepare statement
   

   $result->bindParam(1,$username); // lalu melakukan binding param
   $result->bindParam(2,$pass);
   // index diawali dengan angka 1 sesuai urutan nya pada tanda ? , berarti parameter ke satu, 
   $result->execute(); // kita execute untuk mengeksekusi dan menyimpan hasilnya
   
   // kita iterasi untuk melihat hasilnya
   foreach ($result as $key => $value) {
      echo "$value[username]".PHP_EOL;
   }
   echo "berhasil 2 dengan binding param dengan index / posisition parameter".PHP_EOL.PHP_EOL;
   
   }


   //* cara 3 binding langsung di execute
   // cara menulis string nya mirip , tapi lebih simpel , tanpa harus menggunakan function binding parameter lagi, tapi langsung di dalam function execute


   {
      //penulisan perintah string sql nya dengan tanda ? untuk parameter nya
      $sql = "select * from admin where username = ? and password= ?"; // penulisan string nya menggunakan tanda ?  pada paremater yang ingin kita binding
      
      $result = $koneksi->prepare($sql); // kita melakukan prepare statement
      
   
      $result->execute([$username, $pass]); //kita langsung binding di dalam function execute, sesuai urutan param, pada tanda tanya ? 
      
      // kita iterasi untuk melihat hasilnya
      foreach ($result as $key => $value) {
         echo "$value[username]".PHP_EOL;
      }
      echo "berhasil 3 dengan binding di dalam execute".PHP_EOL.PHP_EOL;
      
      }
   
   

