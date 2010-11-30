<?php
	class garden extends controller{
		public function action_index(){
		    $this->assign('page','garden');
		    $rb =db::getAllRows('select * from garden_bed where garden_id = '. 1 . ' order by name asc');
		    foreach($rb as &$r){
		        $rbHTML = array();
		        $count = 0;
		        for ($h=1; $h<=$r['height']; $h++){
		          for ($w=1; $w<=$r['width']; $w++){
		              $count++;
		              $rbHTML[$h][$w] = array('id'=>'sqft_' .$count, 'label'=> $count);
		          }    
		          $r['rb'] = $rbHTML;
		        }
		        
		    }
		    $this->assign('raisedbeds', $rb);
			$this->display('garden/index.tpl');
			
			return true;
		}

    public function action_new(){
        $this->display('garden/new_index.tpl');
    }

    public function action_getJSONListBeds(){
        global $args;

        $id = (isset($args[3]) && is_numeric($args[3])) ? $args[3]:null;

        $garden =db::getAllRows('select id from garden_bed where garden_id = '. $id);
        $list = array();

        foreach ($garden as $g){
            $list[] = $g['id'];
        }


        header('X-JSON:' . json_encode(array('beds'=>$list)));
        exit;

    }

    public function action_getGardenJSONConstructor(){
        global $args;

        $id = (isset($args[3]) && is_numeric($args[3])) ? $args[3]:null;
        $date = $_POST['date'];
        
        $rb =db::getAllRows('select * from garden where id = '. $id);
        $gb =db::getAllRows('select * from garden_bed where garden_id = '. $id);
        $sqft =db::getAllRows('select * from square_foot_item where garden_bed_id in(select id from garden_bed WHERE garden_id = '. $id . ')');

        foreach($sqft as &$f){
            $q = "SELECT sum(percent) as total_percent FROM square_foot_item WHERE garden_bed_id= {$f['garden_bed_id']} AND item={$f['item']}  AND end_date > '{$date}' AND start_date <'{$date}'";
            
                       
                  
            $sqft_item =db::getSingleRow($q);
            $f['total_percent'] = (isset($sqft_item['total_percent']))? ((int)$sqft_item['total_percent']) : 0;

        }
        

        $garden = (isset($rb[0]) && is_array($rb[0])) ? $rb[0]: false;
        
        $construct = array();
        $construct['garden'] = $garden;
        $construct['beds'] = $gb;
        $construct['sqftitems'] = $sqft;

        header('X-JSON:' . json_encode($construct));
        exit;
    }

    public function loadJSONBed(){
         global $args;

        $id = (isset($args[3]) && is_numeric($args[3])) ? $args[3]:null;

        $garden =db::getAllRows('select * from garden_bed where id = '. $id);

        header('X-JSON:' . json_encode($garden[0]));
        exit;
    }

	}