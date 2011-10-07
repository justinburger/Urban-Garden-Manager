<?php
/**
 * Veggie Alert Object Container.
 *
 * @package Garden
 * @subpackage VeggieAlert
 * @author Justin Burger <justin_burger@adp.com>
 *
 */

/**
 * Veggie Alert Class
 * Defines an alert related to an item planted in a garden.
 *
 * @author Justin Burger <justin_burger@adp.com>
 */
class VeggieAlert{
    private $name;
    private $description;
    private $type;
    private $severity;
    private $status;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($desc){
        $this->description = $desc;
    }

    public function getType(){
        return $this->type();
    }

    public function getSeverity(){
        return $this->severity;
    }

    public function setSeverity($sev){
        $this->severity = $sev;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status=$status;
    }


}


