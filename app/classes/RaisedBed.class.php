<?php

/**
 * @author Justin Burger <justin@loudisrelative.com>
 *
 * A Raised bed is defined as one of many areas within a garden which can be planted. The user has the ability to
 * change the size and segments of a raised bed.
 */
class RaisedBed{
    /** Height Of the raised bed in Pixels */
    private $height;

    /** Width Of the raised bed in Pixels */
    private $width;

    /** Number of roles this bed is split into */
    private $rows;

    /** Number of columns this bed is split into */
    private $columns;

    /** Name of this raised bed */
    private $name;

    /** Short description for this raised bed */
    private $description;

    /** Garden this raised bed is part of. */
    private $garden_id;

    /** Identifier for this raised bed. */
    private $bed_id;

    /** Last time this raised bed was modified */
    private $modified_ts;

    /** Who last modified this raised bed. */
    private $modified_by;

    /** Array of Sqft Objects. */
    private $sqft_items;

    public function getWidth(){
        return $this->width;
    }

    public function setWidth($w){
        $this->width = $w;
    }

    public function getHeight(){
        return $this->height;
    }

    public function setHeight($h){
        $this->height = $h;
    }

    public function getRows(){
        return $this->rows;
    }

    public function setRows($rows){
        $this->rows = $rows;
    }

    public function getColumns(){
        return $this->columns;
    }

    public function setColumns($cols){
        $this->columns = $cols;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($n){
        $this->name = $n;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getGardenId(){
        return $this->garden_id;
    }

    public function setGardenId($id){
        $this->garden_id = $id;
    }

    public function getBedId(){
        return $this->bed_id;
    }

    public function setBedId($id){
        $this->bed_id = $id;
    }

    public function getModifiedTs(){
        return $this->modified_ts;
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

    public function getSqftItems(){
        return $this->sqft_items;
    }

    public function addSqftItem($item){
        $this->sqft_items[] = $item;
    }



}
