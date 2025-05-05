<?php

//* execute adalah sebuah function dari object pdo, yang dapat kita guanakan untuk membuat perintah sql,
//* tapi kusus perintah yang tidak memerlukan return data, karena execute tidak mengembalikan result data, hanya mereturn boolean 
require_once __DIR__."./../helper/getKoneksi.php";
use function helper\koneksi\getKoneksi;


// struktur penulisan nya

// $objectPDO->exec('perintah sql nya') 

try {
   $koneksi = getKoneksi();
   
// cara 1
   // $koneksi->exec("create table club (nama varchar(100) not null, negara varchar (100) not null, id int  not null  auto_increment ,primary key (id) ) engine = 'innoDB' ");


// cara 2
// $sql = "create table club (nama varchar(100) not null, negara varchar (100) not null, id int  not null  auto_increment ,primary key (id) ) engine = 'innoDB' ";
// $koneksi->exec($sql);   


// cara 3 dengan multi line
$sql = <<<perintah
insert into club (nama,negara) values ('manchester united','inggris');
perintah;
$koneksi->exec($sql);


// var_dump($koneksi->exec($sql)); // kalau di vardump tidak ada result data yang di kembalikan;
// tiga cara di atas hanya menampilkan cara menulis string nya saja;


//*tutup koneksi
$koneksi = null;
   // echo "berhasil menambahkan";
} catch ( PDOException $e) {
   
   echo $e->getMessage();
   //throw $th;
}


//todo gunakan function exec hanya untuk perintah yang tidak memerlukan return / kembalian berupa data, seperti perintah ddl, yaitu di antaranya insert, update, delete dan lainya;