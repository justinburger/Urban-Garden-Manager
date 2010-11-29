<?php
class veggies extends controller {
    
    public function action_index(){
        $veggies = db::getAllRows('select v.id, v.name, v.description, v.category, vc.label as cate_name from veggie v inner join veggie_category vc on vc.id = v.category order by name asc');
        $this->assign('page','veggies');
        $this->assign('veggies', $veggies);
        $this->display('veggies/index.tpl');
    }
    
    public function action_add(){
        $this->assign('page','veggies');
        $this->assign('categories',db::getAllRows('select * from veggie_category'));
         $this->display('veggies/add.tpl');
        
    }
    
    public function action_confirmadd(){

        $name = (isset($_POST['name'])) ? $_POST['name']: null;
        $light = (isset($_POST['light'])) ? $_POST['light']: null;
        $water = (isset($_POST['water'])) ? $_POST['water']: null;
        $description = (isset($_POST['description'])) ? $_POST['description'] :null;
        $category = (isset($_POST['category'])) ? (int)$_POST['category']: 1;
        $default_percent = (isset($_POST['default_percent'])) ?(int) $_POST['default_percent']: 1;
        $num_per_sqft = (isset($_POST['num_per_sqft'])) ? (int)$_POST['num_per_sqft']: 1;
        
        foreach ($_POST as $k=>$p){
          $this->assign($k,$p);
        }
            
        if(empty($name)){
            $this->assign('errors',array('Name is required.'));
            $this->action_add();
            exit;
        }
        
        
        $q = "INSERT INTO veggie (name, description, category, default_percent, lighting, water, persqft) VALUES('{$name}','{$description}','{$category}',{$default_percent}, '{$light}','{$water}',{$num_per_sqft})";

        db::query($q);
        
        header('Location:/veggies');
        exit;
    }
    
    
    public function action_view(){
        global $args;
        $this->assign('page','veggies');
        $id = (isset($args[3])) ? $args[3] : 1;
        $this->assign('edit',true);
        $veggie = db::getSingleRow('select * from veggie where id=' . $id);
        $this->assign('name', $veggie['name']);
        $this->assign('description', $veggie['description']);
        $this->assign('default_percent', $veggie['default_percent']);
        $this->assign('num_per_sqft', $veggie['persqft']);
        $this->assign('light', $veggie['lighting']);
        $this->assign('water', $veggie['water']);
        $this->assign('id', $veggie['id']);
        
         $this->assign('categories',db::getAllRows('select * from veggie_category'));
         $this->display('veggies/edit.tpl');
        
    }
    
    public function action_confirmupdate(){
         $id = (isset($_POST['id'])) ? $_POST['id']: null;
         $name = (isset($_POST['name'])) ? $_POST['name']: null;
        $light = (isset($_POST['light'])) ? $_POST['light']: null;
        $water = (isset($_POST['water'])) ? $_POST['water']: null;
        $description = (isset($_POST['description'])) ? $_POST['description'] :null;
        $category = (isset($_POST['category'])) ? (int)$_POST['category']: 1;
        $default_percent = (isset($_POST['default_percent'])) ?(int) $_POST['default_percent']: 1;
        $num_per_sqft = (isset($_POST['num_per_sqft'])) ? (int)$_POST['num_per_sqft']: 1;
        
        foreach ($_POST as $k=>$p){
          $this->assign($k,$p);
        }
            
        if(empty($name)){
            $this->assign('errors',array('Name is required.'));
            $this->action_add();
            exit;
        }
        
        
        $q = "UPDATE veggie set name = '{$name}', description = '{$description}', category = {$category}, default_percent = {$default_percent}, lighting = '{$light}', water = '{$water}', persqft={$num_per_sqft} WHERE id = {$id}";

        db::query($q);
        
        header('Location:/veggies');
        exit;
    }
}