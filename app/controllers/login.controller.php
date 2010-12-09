<?php
class login extends controller {
    
    public function action_index(){
        $this->display('login/index.tpl');
    }
    
    public function action_validate(){
        $email = (isset($_POST['email']))?$_POST['email']:null;
        $password = (isset($_POST['password']))?$_POST['password']:null;
         
        $count = db::getSingleRow('select count(*) as cnt FROM user WHERE email=\'' . $email . '\' AND PASSWORD(\''.$password.'\') = pass');
        
        if($count['cnt'] == 1){
            $id = db::getSingleRow('select id FROM user WHERE email=\'' . $email . '\' AND PASSWORD(\''.$password.'\') = pass');
        
            $_SESSION['user_id'] = $id['id'];
            header('Location: http://www.urbangardenmanager.com/home');
        }
    }
}