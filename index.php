<?php require_once 'autoloadClasses.php';
$pages =  scandir("haidara/corfblog/view/");
$users = scandir('haidara/corfblog/users/');
$file_ajax=scandir('haidara/corfblog/ajax/');
if(isset($_GET['url']) && !empty($_GET['url']))
{
    if(in_array($_GET['url'] .  '.php', $pages) or in_array($_GET['url'] .  '.php',$users) or in_array($_GET['url'] .  '.php',$file_ajax) )
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
    <link href="haidara/public/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="haidara/public/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="haidara/public/css/style1.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<?php
switch($page)
{
    case "test1":
        require_once'haidara/corfblog/view/'. $page . '.php';
        break;
    case "test":
        require_once'haidara/corfblog/view/'. $page . '.php';
        break;
    /********************* ARTICLES ********************/
    case "sujet":
    case 'post':
    case 'info':
    case 'foromo':
    case 'search':
    case 'reply':
    case '404':
        require_once 'haidara/corfblog/view/'.  $page .'.php';
        break;
    /**********************USERS DU SITE*****************************/

    //demande fourmulaire

    case 'aygaAyContote' :
    case 'aygaConnectee' :
    case 'confirm' :
        require_once 'haidara/corfblog/users/'.  $page .'.php';
        break;
    //verification de validité de fourmulaire a v   nt toute chose

    //traitement ici....
    case 'profile' :
        require_once 'haidara/corfblog/users/'.  $page .'.php';
        break;
    case 'abouba' :
        require_once 'haidara/corfblog/view/'.  $page .'.php';
        break;
    // Partie Ajax
    case 'categorie':
        require_once 'haidara/corfblog/ajax/'.$page.'.php';
        break;
    case 'solutionProposee':
        require_once 'haidara/corfblog/ajax/'.$page.'.php';
        break;
    default:
        require_once 'haidara/corfblog/view/hougo.php';
        break;
}
?>

<script src="haidara/public/js/jquery-3.2.0.min.js"></script>
<!--  Scripts-->
<script src="haidara/public/js/materialize.js"></script>
<script src="haidara/public/js/script.js"></script>
<script src="haidara/public/js/scritpAjax.js"></script>
<script src="haidara/public/js/init.js"></script>
</body>
</html>