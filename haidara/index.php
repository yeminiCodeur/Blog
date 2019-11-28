<?php
require_once '../autoloadClasses.php';
$pages =  scandir("root/view/");
$users = scandir('root/users/');
if(isset($_GET['url']) && !empty($_GET['url']))
{
    if(in_array($_GET['url'] .  '.php',$pages) or in_array($_GET['url'] .  '.php',$users))
    {
        $page = $_GET['url'] ;
    }else if(!preg_match("/^([a-zA-Z0-9]+\.?)+$/",$_GET['url'])){
        $page ='404';
    }
    else{
        $page ='404';
    }
}
else
{
    $page = "home";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title><?= ucfirst($page) ?></title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="public/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="public/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<?php
/*
if($page !='login' && $page != "new" && !App::getInstance()->isDefine('admin'))
{
   App::redirect('login');
}
var_dump(App::getInstance()->isDefine('admin'));*/
switch($page)
{
    /********************* ARTICLES ********************/
    case "home":
        require_once 'root/view/'.  $page .'.php';
        break;
    case "404":
        require_once 'root/view/'.  $page .'.php';
        break;
    case 'add':
        require_once 'root/view/'.$page.'.php';
        break;
    case 'delete':
        require_once 'root/view/'.$page.'.php';
        break;
    case 'show':
        require_once 'root/view/'.$page.'.php';
        break;
    case 'update':
        require_once 'root/view/'.  $page .'.php';
        break;
    case 'dashboard':
        require_once 'root/view/'.  $page .'.php';
        break;
    case 'listing':
        require_once 'root/view/'.  $page .'.php';
        break;
    case 'setting':
        require_once 'root/view/'.  $page .'.php';
        break;
    /**********************USERS DU SITE*****************************/
    case  'login':
        require_once 'root/users/'.  $page .'.php';
        break;
    case  'showAllMember':
        require_once 'root/users/'.  $page .'.php';
        break;
    case  'logout':
        require_once 'root/users/'.  $page .'.php';
        break;
    case 'new' :
        require_once 'root/users/'.  $page .'.php';
        break;
    default :

        break;
}
?>

<script src="public/js/jquery-3.2.0.min.js"></script>
<!--  Scripts-->
<script src="public/js/materialize.js"></script>
<script src="public/js/script.js"></script>
<script src="public/js/init.js"></script>
</body>
</html>