<?php

//* auto increment

/**
 * dalam beberapa kasus kita kadang ingin memebuat tabel  yang dimana kita akan membuat nilai / id, dimana nilai nya akan meningkat / naik satu tingakt secara otomatis
 * 
 * pada database mysql kita bisa mengunakan properti auto_increment
 * 
 * terkadang jika kita ingin melihat/ atau ingin mengetahui suatu nilai terakhir yang kita input / nilai tersedia, kita biasnya menggunakan atau queri secara manual dengan perintah pada mysql / sql
 *  `select last_inserid() ` 
 * 
 * dengan pdo , kita bisa lebih mudah cukup dengan function lastInsertId(), maka kita bisa mendapatkan id terakhir nya
 */


require_once __DIR__ ."/../helper/getKoneksi.php";
use function helper\koneksi\getKoneksi;


 $koneksi = getKoneksi();

$sql = "insert into data (club, negara) value ('manchester united', 'englan')"; 
$koneksi->query($sql);// ini kita mengisi nilainya
$data = $koneksi->lastInsertId(); // ini kita mengecek id nya

 var_dump($data);

 //* silahkan cek untuk perbandingan di tabel mysql nya, dalam contoh ini ada di database `phpmysql' dan tebel 'data';


 //* selain pada perintah queri di atas, bisa juga kita gunakan pada prepare statement;