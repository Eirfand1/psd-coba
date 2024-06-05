<?php

class Matkul {
   public $kode, $nama, $sks, $jenis, $prodi, $semester, $no_urut;
   
   public function __construct($nama, $sks, $jenis, $prodi, $semester, $no_urut) {
      $this->nama = $nama;
      $this->sks = $sks;
      $this->jenis = $jenis;
      $this->prodi = $prodi;
      $this->semester = $semester;
      $this->no_urut = $no_urut;
      $this->generateKode();
   }
   
   private function generateKode() {
      $this->kode = $this->prodi . $this->semester . $this->jenis . $this->no_urut;
   }
}

class Stack{
   //menentuan maksimal jumlah stack
   private $max = 5 ;
   //inisialisasi nilai awal top dengan 0
   private $top = 0;
   //property untuk menampung stack
   public $items = [];
   
   public function isEmpty() {
      return $this->top == 0;
   }
   
   public function isFull() {
      return $this->top == $this->max;
   }
   
   public function push($nama, $sks, $jenis, $prodi, $semester, $no_urut){
      if($this->isFull()){
         echo "Data penuh";
         return ;
      }
      $item = new Matkul($nama, $sks, $jenis, $prodi, $semester, $no_urut);
      //akan mengepush data pada indek top increment
      $this->items[++$this->top] = $item;
   }
   public function pop(){
      if($this->isEmpty()){
         echo "Stack kosong";
         return;
      }
      $this->items[$this->top--];
   }
   public function peak(){
      if(!$this->isEmpty()){
         echo $this->items[$this->top]->nama;
         return;
      }
      echo "Stack kosong";
      return;
      
   }
   public function printS(){
      if($this->top != -1){
         for($i = $this->top; $i> 0;$i--){
            echo $this->items[$i]->nama . "\n";
         }
      }else{
         echo "data kosong";
         return;
      }
   }
}
$p = new Stack();
$p->push("Inggris", 2, "P", "01", 2, 1);
$p->push("ALIM",2,"T", "07", 4, 2);
$p->push("PBO",2,"P", "08", 6, 3);
$p->push("WEB",2,"P", "03", 4, 4);
$p->push("KWN",2,"T", "04", 4, 5);
echo "Data Teratas : " ;
$p->peak();
echo "\nList semua data : \n";
$p->printS();
