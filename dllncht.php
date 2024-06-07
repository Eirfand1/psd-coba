<?php

class Node{
   public $data, $next, $prev;

   public function __construct($d){
      $this->data = $d;
   }
}

class dllncht{
   private $head, $tail;

   public function isEmpty(){
      return $this->head == null;
   }

   public function insertD($d){
      $newNode = new Node($d);
      if($this->isEmpty()){
         $this->head = $this->tail = $newNode;
         return;
      }
      $newNode->next = $this->head;
      $this->head->prev = $newNode;
      $this->head = $newNode;
   }
   public function insertB($d){
      $newNode = new Node($d);
      if($this->isEmpty()){
         $this->head = $this->tail = $newNode;
         return;
      }
      $this->tail->next = $newNode;
      $newNode->prev = $this->tail;
      $this->tail = $newNode;
   }
   public function hapusD(){
      if($this->isEmpty()){
         echo "Link list kosong";
         return;
      }
      if($this->head == $this->tail){
         unset($this->head);
         return;
      }

      $del = $this->head;
      $this->head = $this->head->next;
      $this->head->prev = null;
      unset($del);
   }
   public function hapusB(){
      if($this->isEmpty()){
         echo "Link list kosong";
         return;
      }
      if($this->head == $this->tail){
         unset($this->head);
         return;
      }

      $del = $this->tail;
      $this->tail = $this->tail->prev;
      $this->tail->next = null;
      unset($del);
   }
   public function printL(){
      if($this->isEmpty()){
         echo "Link list kosong";
         return;
      }
      $curr = $this->head;
      echo "Isi link list : <br>";
      while ($curr->next != null) {
         echo $curr->data . "<br>";
         $curr = $curr->next;
      }
      //ngeprint node terakhir
      echo $curr->data;
   }
   public function clear(){
      if($this->isEmpty()){
         echo "Link list kosong \n";
         return;
      }
      $curr = $this->head;
      $del = null;
      do{
         $del = $curr;
         $curr = $curr->next;
         unset($del);
      }while($curr != null);
      $this->head = $this->tail = null;
      echo "\nLink list berhasil di hapus \n";
   }
}
// $p = new dllncht();
// $p->insertD(6);
// $p->insertD(5);
// $p->insertD(4);
// $p->insertB(7);
// $p->insertB(8);
// $p->printL();
// print_r($p);
// $p->clear();
// $p->printL();
// $p->hapusB();
// $p->hapusB();
// print_r($p);
