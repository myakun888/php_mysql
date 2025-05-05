<?php

//! ini adalah file koneksi
//* ini adalah datanya 

namespace  helper\koneksi;

use PDO;

   function getKoneksi()
   {
      $database = "phpmysql";
      $user = 'root';
      $pass = 'muhammad';
      
      
      return new PDO("mysql:host=localhost;dbname=$database", $user, $pass);
   };
   
