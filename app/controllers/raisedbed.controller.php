<?php
class raisedbed extends controller{
    public function index_action(){
        
    }
    
    public function action_add(){
        $this->assign('garden_id',1);
        $this->display('raisedbed/add.tpl');
    }
    
    public function action_confirmadd(){
        $name = (isset($_POST['name'])) ? $_POST['name'] :null;
        $height = (isset($_POST['height'])) ? $_POST['height'] :0;
        $width = (isset($_POST['width'])) ? $_POST['width'] :0;
        $garden_id = (isset($_POST['garden_id'])) ? $_POST['garden_id'] :null;
        
        $q = "INSERT INTO garden_bed (garden_id, height, width, name) VALUES({$garden_id},$height, $width, '{$name}')";
        
        db::query($q);
        
        header('Location:/garden');
        
    }
}