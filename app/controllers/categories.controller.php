<?php
	class categories extends controller{
		public function action_index(){
            $this->assign('page','categories');
            $this->display('categories/index.tpl');
        }
        }