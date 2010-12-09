<?php

class sqft extends controller {
    
    public function action_view(){
        global $args;
        $bed = $args[3];
        $sqftid = $args[4];

        $this->assign('veggies', db::getAllRows('select * from veggie'));
        $this->assign('bed', $bed);
        $this->assign('sqft', $sqftid);
        $items = db::getAllRows('select s.*, v.name as type_name from square_foot_item s JOIN veggie v on v.id = s.veggie_id WHERE garden_bed_id=' . $bed .' AND item='.$sqftid);
        $this->assign('sqft_items',$items);
        $this->display('sqft/view.tpl');
        
    }

    public function action_additem(){
        $sqft =     (int)$_POST['sqft'];
        $bed =      (int)$_POST['bed_id'];
        $bed =      (int)$_POST['bed_id'];
        $veggie =   (int)$_POST['veggie'];
        $percent =  (int)$_POST['percent'];
        $quantity = (int)$_POST['quantity'];
        $frmdate = $_POST['frmdate'];
        $todate = $_POST['todate'];

        $q = 'INSERT INTO square_foot_item (garden_bed_id,item, start_date, end_date, percent, veggie_id,quantity)';
        $q.= "VALUES({$bed},{$sqft},'{$frmdate}','{$todate}',{$percent},{$veggie},{$quantity})";

        db::query($q);

        $this->action_view();
    }
    
}