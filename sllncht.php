<?php

class Node{
   public $data, $next;

   public function __construct($d){
      $this->data = $d;
   }
}

class sllncht{
   private $head, $tail;

   public function isEmpty(){
      return $this->head == null;
   }   

   public function insertD($d){
      $newNode = new Node($d);
      if($this->isEmpty()){
         $this->head = $this->tail = $newNode;
      }
      $newNode->next = $this->head;
      $this->head = $newNode;
   }
   public function insertB($d){
      $newNode = new Node($d);
      if($this->isEmpty()){
         $this->head = $this->tail = $newNode;
      }
      $this->tail->next = $newNode;
      $this->tail = $newNode;
   }
   public function hapusD(){
      if($this->isEmpty()){
         echo "link list kosong";
         return;
      }
      $del = $this->head;
      $this->head = $this->head->next;
      unset($del);
   }
   public function hapusB(){
      if($this->isEmpty()){
         echo "Link List kosong";
         return;
      }
      $temp = $this->head;
      $del = $this->tail;
      while($temp->next->next != null){
         $temp = $temp->next;
      }
      $this->tail = $temp;
      $this->tail->next = null;
   }
   public function printL(){
      if($this->isEmpty()){
         echo "Link list kosong";
         return;
      }
      $curr = $this->head;
      while($curr != null){
         echo $curr->data . "\n";
         $curr = $curr->next;
      }
   }
}

$p = new sllncht();
$p->insertD(5);
$p->insertD(4);
$p->insertD(3);
$p->insertB(6);
$p->printL();
print_r($p);

