<?php
	class error extends controllers{
	   public function action_e404(){

	       $this->display('global/error.tpl');
	       return true;
	   } 
	       
	}