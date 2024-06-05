<?php
define("max", 6);
$antrian = array(
   'head' => -1,
   'tail' => -1,
   'data' => array()
);
$q = $antrian;

function inisialisasi(){
   global $q;
   $q['head'] = $q['tail'] = -1;
}

function isFull(){
   global $q;
   if($q['tail'] == max - 1){
      return 1; 
   }
   else{
      return 0;
   }
}

function isEmpty(){
   global $q;
   if ($q['tail'] == -1){
      return 1;
   }
   else{
      return 0;
   }
}

function enqueue($d){
   global $q;
   if(!isFull()){
      if(isEmpty() == 1){
         $q['head'] = $q['tail'] = 0;
      } 
      $q['data'][$q['tail']] = $d;
      $q['tail']++;
      echo "<br>Data ", $d, " telah ditambahkan ke dalam antrian";
   } else{
      echo "<br>Maaf Antiran Sudah Penuh";
   }
}

function dequeue(){
   global $q;
   if(isEmpty() != 1){
      echo "<br>Data yang keluar dari antrian : ", $q['data'][$q['head']];
      for($i = $q['head']; $i < $q['tail'] - 1; $i++){
         $q['data'][$i] = $q['data'][$i + 1];
      }
      $q['tail']--;
      echo "<br>Data saat ini";
   } else {
      echo "<br>Maaf, antrian kosong";
   }
}



function clear(){
   global $q;
   $q['head'] = $q['tail'] = -1;
}

function cetak(){
   global $q;
   if ($q['tail'] != -1){
      for($i = $q['head']; $i < $q['tail']; $i++){
         echo "<br>Antrian ke ", $i+1, ": ", $q['data'][$i], " ";
      }
   } else {
      echo "<br>Antrian kosong";
   }
}

echo "<br>Menambah data";
enqueue(11);
enqueue(22);
enqueue(33);
enqueue(44);
print_r($q);

?>