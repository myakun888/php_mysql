<?php

//* function queri hampir mirip dengan exec perbedaan nya query mereturn object PDO statement
//* dimana pdo statement adalah class turunan dari class iterator aggregate, ini berarti kita bisa iterasi dengan foreach;

require_once __DIR__ . "/../helper/getKoneksi.php";

use function helper\koneksi\getKoneksi;


$koneksi = getKoneksi();


$hasil = $koneksi->query("select * from club"); //! return pdo statement;


//todo silahkan buka komentar dari kode dibawah ini
// var_dump($hasil); // pdo statement

//* untuk melihat hasil data kita harus mengiterasi nya
//* ini kita coba iterasi dengan forEach;
foreach ($hasil as $key => $value) {

   // var_dump($value); // ini pdo setelah di iterasi

   echo " nama club : " . $value["nama"] . PHP_EOL;  // ini mengambil value array nya      
};

// ini kita tutup koneksi nya 
$hasil = null;
