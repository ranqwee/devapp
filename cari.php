<?php
   include "connect.php"; //menyisipkan file koneksi.php
   $cari = isset($_GET['cari']) ? mysqli_real_escape_string($database,$_GET['cari']):'';
   $data = array();
   $sql  = "select * from mst_komponen where kd_komponen LIKE '".$cari."%'";
   
   if($res = $database->query($sql)) {
      while ($row = $res->fetch_assoc()) {
     $data[] = $row;
      }
   }
   echo json_encode($data);
   
   /* tutup koneksinya */
   $database->close();
?>