<?php
//* sebelumnya kita menggambil data dari query / prepare statement dengan return berupa pdostatemnt
/**
 * kita harus melalukan iterasi dengan foreach atau dengan conter sendiri
 * 
 * 
 * tapi kita bisa langsung mengambil data berup array, dengan function fetch, ini akan mengambil data pertama yang diatemukan
 * jika ingin mengambil lagi kita harus melakukan fetch lagi
 * 
 * 
 * jika ingin langsung mengambil semua kita bisa melakuakn fetch all
 * 
 * 
 */

require_once __DIR__."/../helper/getKoneksi.php";
use function helper\koneksi\getKoneksi;

//* ini dengan fetch

// kita buat beda scope dengan tanda kurung kurawal, atau curly bracket;
$koneksi = getKoneksi();
{

try{$sql = 'select * from admin';

$data = $koneksi->prepare($sql);
$data->execute();

//seharusny kan ada lebih dari satu data
 // ini akan mengambil data yang pertama kali ditemui;
$hasil = $data->fetch(); // ini data pertama
echo "ini dari fetch".PHP_EOL;
var_dump($hasil); 

$hasil2 = $data->fetch(); // ini data ke 2,
var_dump($hasil2); 

}catch(PDOException $e){
   echo $e->getMessage();
}

}


//* dengan fetch all 


{

try{$sql = 'select * from admin';

$data = $koneksi->prepare($sql);
$data->execute();

$hasil = $data->fetchAll();
echo "INI DARI FETCH ALL".PHP_EOL;
var_dump($hasil);

}catch(PDOException $e){
   echo $e->getMessage();
}

}


//* kita juga bisa mengambil langsung berupa array assiatif dengan menambahkan paremter, static metod dari pdo statemnt, diantarany pdo::fetch_assoc

//banyak parameter lain sesui kebutuhan silahkan explorer


{

try{$sql = 'select * from admin';

$data = $koneksi->prepare($sql);
$data->execute();

$hasil = $data->fetchAll(pdo::FETCH_ASSOC);
echo "INI dengan paremeter pdo fetch assoc".PHP_EOL;
var_dump($hasil);

}catch(PDOException $e){
   echo $e->getMessage();
}

}


//! fetch atau fetch all , bisa di lakukan pada return yang mengembalikan pdo statement, contoh yang mengembalikan pdo statement, adalah prepare (), query(), jadi query juga bisa menggunakan function fetc


{

try{
   $sql = 'select * from admin';

   $data = $koneksi->query($sql);

   $hasil = $data->fetchAll(pdo::FETCH_ASSOC);

   echo "ini dengan query".PHP_EOL;
   var_dump($hasil);

}catch(PDOException $e){
   echo $e->getMessage();
}

}