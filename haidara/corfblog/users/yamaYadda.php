<?php
session_start();
$db = App::getDatabase();
$auth = App::getAuth();
echo 'confirm';
var_dump($_SESSION['a']);
/*
if($auth->confirm($_GET['id'], $_GET['token'],$db, Session::getInstance())){
    Session::getInstance()->setFlash('success','votre compte a été bien validé');
    App::redirect('profile');
}else{
    Session::getInstance()->setFlash('error','ce token ne pas valide');
    App::redirect('login');
}
*/