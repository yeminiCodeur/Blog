<?php require_once 'headPages.php'; ?>
<div id="index-banner" class="parallax-container"  xmlns="http://www.w3.org/1999/html">
    <div class="section no-pad-bot" >
        <div class="row blue" style="margin-top: -15px ;">
            <div class="slider">
                <ul class="slides">
                    <li>
                        <img src="./haidara/images/background/1.jpg" alt="Unsplashed background img 1"> <!-- random image -->
                        <div class="caption center-align">
                            <h3><a href="#" class="a-haidara"> This is our big Tagline!</a></h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                    </li>
                    <li>
                        <img src="./haidara/images/background/2.jpg" alt="Unsplashed background img 1"> <!-- random image -->
                        <div class="caption left-align">
                            <h3><a href="#" class="a_haidara">Left Aligned Caption</a></h3>
                            <h5 class="light grey-text text-lighten-3">Abouba ahahaha.</h5>
                        </div>
                    </li>
                    <li>
                         <!-- random image -->
                        <img src="./haidara/images/background/3.jpg" alt="Unsplashed background img 1">
                        <div class="caption right-align">
                            <h3><a href="#" class="a_haidara">Right Aligned Caption</a></h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                    </li>
                    <li>
                        <img src="./haidara/images/background/a.jpg" alt="Unsplashed background img 1">
                        <div class="caption center-align">
                            <h3><a href="#" class="a_haidara">This is our big Tagline!</a></h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                    </li>
                </ul>
            </div><div class="row center">
                <h4>Apprenez Facilement Vos Exercices Tout Prêt et Ameliorez-vous!!!  </h4>
            </div>
        </div>

    </div>
</div>
<div class="container">
    <div class="row" style="background: #c2185b">
    <h3 class="center">Derniers Exercices</h3>
        <hr>
    <?php
    $db = App::getDatabase();
    foreach(App::getPost()->getsPosts($db) as $k=>$v){
        ?>
        <!--   Icon Section   -->
        <div class="col s12 m6 l4">
            <div class="card small hoverable">
                <div class="card-content">
                    <div class="center"><i class="material-icons">more_vert</i></div>
                    <div class="icon-block">
                       <h5 class="center"><?=$v->title_post?></h5>
                        <h6 class="grey-text">Publié le <?=date("d/m/Y à H:i:s", strtotime($v->created_post))?>&nbsp;par <?=$v->nom_supuser?>&nbsp;<?=$v->prenom_supuser?></h6>
                    </div>
                    <div class="col s1">
                        <img src="./haidara/images/userImage/avatar.png" alt="" class="circle responsive-img valign profile-post-uer-image">
                    </div>
                </div>
                <div class="card-image waves-effect waves-block waves-light" >
                    <img src="./haidara/images/posts/<?=$v->image_post ;?>"  width="80px" height="80px" class="activator" alt="<?=$v->title_post?>">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-accent-4"><i class="material-icons right">more_vert</i></span>
                    <p><a href="post&ref=<?=$v->id .'998#8!9'. md5($v->id) .'/'. $v->title_post; ?>">Lire Complet</a></p>
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
    <div class="row">
        <br><br>
    <h3> Derniers Discussions et Questions?</h3>
        <hr>
    <div class="col s12 m8 l12">
        <div class="card medium" style="border-radius: 8px">
            <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th>Statut</th>
                            <th>Sujet</th>
                            <th>Reponse</th>
                            <th>Nombre de Reponse</th>
                        </tr>
                    </thead>
                        <tbody>
                            <tr>
                                <td><i class="material-icons green">done</i></td>
                                <td><a href="forum">ujdsjkjdjkdjkkjdkjdjf fdjhfdjdfjjhdf dfdfjjhdf</a> </td>
                                <td>Voir Reponse&nbsp;<a href="allReply&id=5"><i class="material-icons">reply</i></a> </td>
                                <td><a href="#allReply&id=5">5</a></td>

                            </tr>
                             <tr>
                                 <td><i class="material-icons ">timer</i></td>
                                 <td>un programe qui permet de .....</td>
                                 <td>Aucune</td>
                                 <td>0</td>
                             </tr>
                        </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<?php

require_once 'footer.php' ;?>


