<?php require_once 'headPages.php'; ?>
<div id="index-banner" class="parallax-container" xmlns="http://www.w3.org/1999/html">
    <div class="section no-pad-bot indigo">
            <div class="row center">
                <h4 class="header col s12 light">Bienvenue</h4>
            </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="section">
            <?php
            $db = App::getDatabase();
            foreach(App::getPost()->getsPosts($db) as $k=>$v){
                ?>
                <!--   Icon Section   -->

                <div class="col s12 m8 l4">
                    <div class="card small">
                        <div class="card-content">
                            <div class="icon-block">
                                <h5 class="center"><?=$v->title_post?></h5>
                                <h6 class="grey-text">le <?=date("d/m/Y à H:i:s", strtotime($v->created_post))?>&nbsp;par <?=$v->nom_supuser?>&nbsp;<?=$v->prenom_supuser?></h6>
                            </div>
                        </div>

                        <div class="card-image waves-effect waves-block waves-light" >
                            <img src="images/posts/<?=$v->image_post ;?>"  width="100" height="100" class="activator" alt="<?=$v->title_post?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-accent-4"><i class="material-icons right">more_vert</i></span>
                            <p><a href="post&ref=<?=$v->id .'998#8!9'. md5($v->id);?>">voir complet</a></p>
                        </div>
                        <div class=" card-reveal">
                            <span class="card-title grey-text darken-4"><?=$v->title_post;?><i class="material-icons right">close</i> </span>
                            <p><?= substr(nl2br($v->content_post),0, 500);?>...</p>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<footer class="page-footer teal">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Company Bio</h5>
                <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>

            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="brown-text text-lighten-3" href="contact">abouba@gmail.com</a>
        </div>
    </div>
</footer>