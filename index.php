<?php

session_start();
require_once('app/classes/db.abstract.php');
require_once('/var/www/settings/ugm.inc.php');
require ($settings['lwmvc'] . 'lwmvc.class.php');

$fm = new lwmvc();

$fm->setControllerDir($settings['install_dir'] . 'app/controllers');
$fm->setTemplateDir($settings['install_dir'] . 'app/templates');
$fm->setDefaultController('home');

$fm->setFrameworkDir($settings['lwmvc']);
$fm->setCaptureExternalFormPosts(true);
$fm->setFileNotFoundURL($settings['base_url'].'error/e404');




$args = explode('/',$_SERVER['REQUEST_URI']);

$controller = (isset($args[1]) && !empty($args[1])) ? $args[1]: 'home';
$action = (isset($args[2]) && !empty($args[2])) ? $args[2]: 'index';

$fm->overrideRequestParms(array('controller'=>$controller,'action'=>$action));
$request = $fm->getRequestParams();

if($request['controller'] != 'login' && !isset($_SESSION['user_id'])){
    header('Location:/login/index');
   
}
$fm->assignGlobalSmarty('BASE_URL',$settings['base_url']);

$fm->handleRequest();


