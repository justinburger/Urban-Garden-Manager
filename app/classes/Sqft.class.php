<?php

class Sqft{
    private $id;
    private $pos_x;
    private $pos_y;
    private $label;
    private $modified_ts;
    private $modified_by;
    private $veggie_items;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getPosX(){
        return $this->pos_x;
    }

    public function setPosX($x){
        $this->pos_x = $x;
    }

    public function getPosY(){
         return $this->pos_y;
    }

    public function setPosY($y){
         $this->pos_y = $y;
    }

    public function getLabel(){
        return $this->label;
    }

    public function setLabel($lbl){
        $this->label = $lbl;
    }

    public function getModifiedTs(){
        return $this->modified_is;
    }

    public function setModifiedTs($ts){
        $this->modified_ts = $ts;
    }

    public function getModifiedBy(){
        return $this->modified_by;
    }

    public function setModifiedBy($by){
        $this->modified_by = $by;
    }

    public function getVeggieItems(){
        return $this->veggie_items;
    }

    public function addVeggieItem($veggie){
        $this->veggie_items[] = $veggie;
    }



}
