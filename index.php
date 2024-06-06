<?php
require 'dllncht.php';
session_start();

if(!isset($_SESSION['data'])){
   $_SESSION['data'] = new dllncht();
   
}

if(isset($_POST['inpD'])){
   $data = $_POST['inp'];
   $_SESSION['data']->insertD($data);
   header("Location: ".$_SERVER['PHP_SELF']);
   exit();
}

if(isset($_POST['inpB'])){
   $data = $_POST['inp'];
   $_SESSION['data']->insertB($data);
   header("Location: ".$_SERVER['PHP_SELF']);
   exit();
}

if(isset($_POST['hpsD'])){
   $data = $_POST['inp'];
   $_SESSION['data']->hapusD();
   header("Location: ".$_SERVER['PHP_SELF']);
   exit();
}

if(isset($_POST['hpsB'])){
   $data = $_POST['inp'];
   $_SESSION['data']->hapusB();
   header("Location: ".$_SERVER['PHP_SELF']);
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      form{
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;

      }
      .container{
         display: flex;
         flex-direction: column;
         height: 50%;
         width: 20vw;
      }
      button{
         margin-bottom: 7px;
         height: 2em;
      }
      .inp{
         height: 50px;

      }
   </style>
</head>
<body>
  <form action="index.php" method="post">
   <div class="container">
      <label for="inp">Input Data :</label><br>
      <input type="text" name="inp" class="inp" ><br>
      <button type="submit" name="inpD">Tambah data depan</button>
      <button type="submit" name="inpB">Tambah data belakang</button>
      <button type="submit" name="hpsD">Hapus data depan</button>
      <button type="submit" name="hpsB">Hapus data belakang</button>
   </div>
   <h3>Data: </h3>
   <table>
      <tr>
      </tr>
   </table>
   <div><?php $_SESSION['data']->printL() ?></div>

  </form> 
</body>
</html>
<?php
session_abort();
?>
