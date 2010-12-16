<?php
	class settings extends controller{
		public function action_index(){
            $this->assign('page','settings');
            $this->display('settings/index.tpl');
        }
        }