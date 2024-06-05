<?php

class Matkul {
   public $kode;
   public $jenis;
   public $prodi;
   public $semester;
   public $no_urut;
   
   public function __construct($jenis, $prodi, $semester, $no_urut) {
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

class Queue{
   private $items = [];
   private $head = 0;
   private $tail = -1;
   private $size = 0;
   private $max = 10;
   
   public function isEmpty(){
      return $this->size == 0;
   }
   
   public function isFull(){
      return $this->size == $this->max;
   }
   public function enqueue($item) {
      if ($this->isFull()) {
         echo "Antrian Penuh";
         return;
      }
      $this->tail = ($this->tail + 1) % $this->max;
      $this->items[$this->tail] = $item;
      $this->size++;
   }
   
   public function dequeue() {
      if ($this->isEmpty()) {
         echo "Queue kosong";
         return null;
      }
      $item = $this->items[$this->head];
      $this->head = ($this->head + 1) % $this->max;
      $this->size--;
      return $item;
   } 
}
$matkul1 = new Matkul("T", "01", 1 , 1);
$matkul2 = new Matkul("P", "02", 2 , 2);
$queue = new Queue();
$queue->enqueue($matkul1);
$queue->enqueue($matkul2);
$queue->dequeue();
print_r($queue);
