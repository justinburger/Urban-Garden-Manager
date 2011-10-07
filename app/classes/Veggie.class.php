<?php
/**
 * Veggie Object Container.
 *
 * @package Garden
 * @subpackage Veggie
 * @author Justin Burger <justin_burger@adp.com>
 *
 */

/**
 * Veggie Class
 * Defines an item that can be planted into a garden (raised bed).
 *
 * @author Justin Burger <justin_burger@adp.com>
 *
 */
class Veggie{
    /**
     * @var Integer Unique identifier for an item planted in a garden.
     */
    private $id;
    /**
     * @var Integer
     */
    private $type;
    private $subtype;
    private $plant_date;
    private $harvest_date;
    private $comments;
    private $alerts;
    private $percent;
    private $quanitiy;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getSubtype(){
        return $this->subtype;
    }

    public function setSubtype($type){
        $this->subtype = $type;
    }

    public function getPlantDate(){
        return $this->plant_date;
    }

    public function setPlantDate($date){
        $this->plant_date = $date;
    }

    public function getHarvestDate(){
        return $this->harvest_date;
    }

    public function setHarvestDate($date){
        $this->harvest_date = $date;
        return true;
    }

    public function getComments(){
        return $this->comments;
    }

    public function addComment($comment){
        $this->comments[] = $comment;
        return true;
    }

    public function getAlerts(){}

    public function setAlert($alerts){
        $this->alerts = $alerts;
    }

    public function getPercent(){
        return $this->percent;
    }

    public function setPercent($percent){
        $this->percent = $percent;
    }

    public function getQuanitity(){
        return $this->quanitiy;
    }

    public function setQuanitity($quanitity){
        $this->quanitiy = $quanitity;
        return true;
    }
}
