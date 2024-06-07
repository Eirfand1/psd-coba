<?php
require 'dllncht.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
   <h2>Double link list non circular head tail</h2>
   <form action="" method="post">
      <ol style="font-size: 18px">
         <li>
            <a href="?menu=insertD">Tambah data depan</a>
         </li>
         <li>
            <a href="?menu=insertB">Tambah data belakang</a>
         </li>
         <li>
            <a href="?menu=hapusD">Hapus depan</a>
         </li>
         <li>
             <a href="?menu=cetak">cetak data</a>
        </li>
     </ol>
</form>
</body>
</html>
<?php

if(isset($_GET['menu'])){
   if(!isset($_SESSION['data'])){
      $_SESSION['data'] = new dllncht();
   } 
   $menu = $_GET['menu'];
   if($menu == 'insertD'){
      ?>
      <form action="" method="post">
      <label for="inpD">Masukan data didepan</label><br>
      <input type="text" name="inpD"><br>
      <button type="submit" name="btnD" >Tambah data</button>
      </form>
      <?php
      if(isset($_POST['btnD'])){
         $inpD = $_POST['inpD'];
         $_SESSION['data']->insertD($inpD);
         echo "Data berhasil ditambahkan";
      }
   }
   if($menu == 'insertB'){
      ?>
      <form action="" method="post">
         <label for="inpB">Masukan data dibelakang</label><br>
         <input type="text" name="inpB"><br>
         <button type="submit" name="btnB">Tambah data</button>
      </form>  
      <?php
      if(isset($_POST['btnB'])){
         $inpB = $_POST['inpB'];
         $_SESSION['data']->insertB($inpB);
         echo "Data berhasil ditambahkan";

      }
   }
   if($menu == 'hapusD'){
      ?>
      <form action="" method="post">
         <button name="btnhapusD" type="submit">Hapus data depan</button>
      </form>
      <?php
      if(isset($_POST['btnhapusD'])){
         $_SESSION['data']->hapusD();
      }
   }
   if($menu == 'cetak'){
      ?>
      <div>
         <?php
            $_SESSION['data']->printL();
         ?>
      </div>
      <?php
   }
}