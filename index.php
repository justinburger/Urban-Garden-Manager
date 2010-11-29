<?php
session_start();
require_once('app/classes/db.abstract.php');
			
require '/var/www/lwmvc-read-only/lwmvc.class.php';

$fm = new lwmvc();

$fm->setControllerDir($_SERVER['DOCUMENT_ROOT'] . '/app/controllers');
$fm->setTemplateDir($_SERVER['DOCUMENT_ROOT'] . '/app/templates');
$fm->setDefaultController('home');

$fm->setFrameworkDir('/var/www/lwmvc-read-only');
$fm->setCaptureExternalFormPosts(true);
$fm->setFileNotFoundURL('/error/e404');




$args = explode('/',$_SERVER['REQUEST_URI']);

$controller = (isset($args[1]) && !empty($args[1])) ? $args[1]: 'home';
$action = (isset($args[2]) && !empty($args[2])) ? $args[2]: 'index';

$fm->overrideRequestParms(array('controller'=>$controller,'action'=>$action));
$request = $fm->getRequestParams();

if($request['controller'] != 'login' && !isset($_SESSION['user_id'])){
    header('Location:/login/index');
   
}
$fm->assignGlobalSmarty('BASE_URL','http://www.urbangardenmanager.com/');

$fm->handleRequest();


