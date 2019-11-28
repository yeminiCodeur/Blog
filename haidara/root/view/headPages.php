<header>
<div class="navbar-fixed">
    <nav class="fixed teal" role="navigation">
        <div class="nav-wrapper">
            <a id="logo-container" href="#" class="brand-logo">Administration</a>
            <ul class="right hide-on-med-and-down">
                <li class="left <?=$page=='home' ? 'active':''?>"><a href="home" class="medium"><i class="material-icons left">home</i>Acceuil</a></li>
                <li class="left <?=$page=='dashboard' ? 'active':''?>"><a href="dashboard" class="medium"><i class="material-icons left">dashboard</i>Dashboard</a></li>

                <?php

                if($page !='login' && $page !='new')
                {
                    ?>
                    <li class="<?=$page=='info' ? 'active':''?>"><a href="listing" ><i class="material-icons left">list</i> Listing</a></li>
                    <li class="<?=$page=='forum' ? 'active':''?>"><a href="setting"  ><i class="material-icons left">settings</i>Paramétrage</a></li>
                    <li class="<?=$page=='blog' ? 'active':''?>"><a href="add" ><i class="material-icons left">mode_edit</i>Créer Nouvau Post</a></li>
                    <li class="<?=$page=='blog' ? 'active':''?>"><a href="showAllMember" ><i class="material-icons left">people</i>Membres</a></li>
                    <li class="<?=$page=='quit' ? 'active':''?>"><a href="../home"  ><i  class="material-icons left">exit_to_app</i>Quitter</a></li>
                    <li class="<?=$page=='logout' ? 'active':''?>"><a href="logout" ><i class="material-icons left">power_settings_new</i> Se deconnecter</a></li>
                    <?php
                }
                ?>

            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li class="<?=$page=='home' ? 'active':''?>"><a href="home">Acceuil</a></li>
                <li class="<?=$page=='info' ? 'active':''?>"><a href="home">Informatique</a></li>
                <li class="<?=$page=='forum' ? 'active':''?>"><a href="forum">Forum</a></li>
                <li class="<?=$page=='signUp' ? 'active':''?>"><a href="signUp"><button>S'inscrire</button></a></li>
                <li class="<?=$page=='signIn' ? 'active':''?>"><a href="signIn"><button>Se Connecter</button></a></li>
                <li class="<?=$page=='listing' ? 'active':''?>"><a href="#">Listing</a></li>
            </ul>
        </div>
        <ul id="slide-out" class="side-nav teal">
            <li><div class="userView">
                    <div class="background">
                        <img src="images/userImage/avatar.png">
                    </div>
                    <br>
                    <a href="#!user"><img class="circle" src="images/userImage/avatar.png"></a>
                    <a href="#!name"><span class="white-text name">User dans la session</span></a>
                    <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
                </div>
            </li>
            <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
            <li><a href="#!">Second Link</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Titre</a></li>
            <li><a class="waves-effect" href="#!">link</a></li>
        </ul>
    </nav>
</div>

</header>
<?php
$menu = '';
$menu .='<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>';
define("MENU",$menu);
?>

<?php if(App::getInstance()->hasFlashes()):?>
    <?php foreach(App::getInstance()->getFlashes() as $type =>$message):?>
   <div class="card">
        <?=$message;?>
   </div>
   <?php endforeach;?>
<?php endif ; ?>
