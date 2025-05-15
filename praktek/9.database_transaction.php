<?php
//* Database Transaction
//fitur database transaction itu adalah salah satu fitur utama dari database mysql /sql
// secara default setiap kode yang kita lakukan / perintah sql itu akan otomatsi di commit, / di simpan ke database

// kita juga bisa melakukan agar setiap kode kita tidak otomatis tersimpan / di commit
// kita memanfaatkan fitur database transaction 

// pada pdo juga bisa kita lakukan 
//
/**
 * pada pdo kita juga bisa melakukan database transaction, 
 * sama seperti data base umum nya terdapat / terbagi menjadi tiga bagian
 * kita bisa menggunakan 
 * function beginTransaction()    untuk memulai transaction
 * function commit()   untuk melakukan commit
 * function rollback() untuk melakukan rollback
 */

//* beginTransaction()
/** ini digunakan sebagai tanda jika database transaction di mulai, lalu di bawah nya silahkan lakukan kode sql apapun */

//* commit ()
// adalah function yang di jalankan jika kita ingin menyimpan ke dalam database

//*rollback ()
// adalah functin yang dijalanknan jika kita ingin membatalkan setiap kode yang sudah terjadi

//! note: perlu di ingat saat kita melakukan perintah sql ,jika terdapat salah satu saja yang error baik kode, atau data/ tabel tidak tersedia  atau apa pun jenis error nya, meskipun kita melakukan commit maka akan tetap otomatis menjadi rollback;

require_once __DIR__ . "/../helper/getKoneksi.php";

use function helper\koneksi\getKoneksi;

$koneksi = getKoneksi();

//* contoh commit

try {
      $koneksi->beginTransaction();  //todo ini memulai transaction nya
   
   //todo semua kode akan di kerjakan
   $koneksi->query("insert into data (club) value ('real madrid')");
   $koneksi->query("insert into data (club) value ('inter milan')");
   $koneksi->query("insert into data (club) value ('bayer munich')");
   
   //todo ini commit jika sudah fix di lakukan;
   $koneksi->commit();
   $koneksi = null;
   echo " berhasil menambahkan data";
   } catch (PDOException $e) {
         echo "terjadi error ".$e->getMessage().PHP_EOL;
         echo "eksekusi di batalkan ROLLBACK";
      }
      
      
      
      
//todo hapus komentar jika ingin menjalankan

//* ini contoh jika kita rollback
// try {
//    $koneksi->beginTransaction();  //todo ini memulai transaction nya
         
//  //todo semua kode akan di kerjakan
//    $koneksi->query("delete from data where club = 'real madrid' ");
   
//    //todo ini commit jika sudah fix di lakukan;
//    $koneksi->rollBack();
//    $koneksi = null;
   
// } catch (PDOException $e) {
//       echo "terjadi error ".$e->getMessage().PHP_EOL;
// }





//* ini contoh error otomatis jadi rollback

//todo hapus komentar jika ingin menjalankan

// try {
//       $koneksi->beginTransaction();  //todo ini memulai transaction nya
   
//    //todo semua kode akan di kerjakan
//    $koneksi->query("insert into data (club) value ('real madrid')");
//    $koneksi->query("insert into data (club) value ('bayer munich')");
//    //* ini kita buat sengaja error , ada di insert ny
//    $koneksi->query("isrt into data (club) value ('inter milan')");
   
//    //todo ini commit jika sudah fix di lakukan;
//    $koneksi->commit();
//    $koneksi = null;
//    echo " berhasil menambahkan data";
//    } catch (PDOException $e) {
//          echo "terjadi error ".$e->getMessage().PHP_EOL;
//          echo "eksekusi di batalkan ROLLBACK";
//       }
      
      //! maka otomatis menjadi batal / atau di rollback;
      
      
   