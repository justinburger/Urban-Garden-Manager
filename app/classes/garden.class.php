<?php
/**
 * Created by PhpStorm.
 * @author Justin Burger <justin@loudisrelative.com>
 * Date: Nov 7, 2010
 * Time: 3:13:39 PM
 * To change this template use File | Settings | File Templates.
 */
  class Garden{
     /**
      * An array of RaisedBed objects.
      * @var Array
      */
    private $raisedBeds;

    /**
     * Get all raised beds that are part of this garden;
     * @return Array
     */
    public function getRaisedBeds(){
        return $this->raisedBeds;
    }


    /**
     * Get a single raised bed based on it's array element key.
     * @param  $id Integer Array Element Key
     * @return Array
     */
    public function getRaisedBed($id){
        return $this->raisedBeds[$id];
    }

    public function getAllAlerts(){}  

    public function addRaisedBed($rb){
        $this->raisedBed[] = $rb;
    }


  }

