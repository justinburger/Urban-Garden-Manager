<?php
	class home extends controller{
		public function action_index(){
		    $this->assign('page','home');
			$this->display('home/index.tpl');
			
			return true;
		}
		
	}