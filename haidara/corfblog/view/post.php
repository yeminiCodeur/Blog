<?php
require_once 'headPages.php';
$ref = 0 ;
$id = explode("4998#8!9",isset($_GET['ref'])? $_GET['ref'] : '14998#8!9');
$ref = (int)substr($id[0],0,1);
$db =App::getDatabase();
$p =App::getPost();
  $post = $p->getPostById($ref, $db);
if($post == false){
    header("location:404");
}else
{?>
    <div class="parallax-container">
        <div class="parallax">
                <img src="./haidara/images/posts/<?= strip_tags($post->image_post); ?>"  alt="<?= strip_tags($post->title_post) ?>">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12  m12 l12">
                <h6 class="grey-text">Fait le <?=date("d/m/Y à H:i:s", strtotime($post->created_post))?>&nbsp;par <?= strip_tags($post->nom_supuser)?>&nbsp;<?= strip_tags($post->prenom_supuser)?></h6>
                <h3><?= strip_tags($post->title_post); ?></h3>

                <div class="row">
                    <div class="col l8 m6 s12 ">
                        <p><?= strip_tags($post->content_post) ?></p>
                    </div>
                     <div class="col l8 m6 s12 " id="afficherSolution"></div>
                </div>

            </div>
        </div>
    </div>
<?php
}
?>
<div class="container">

    <hr>
    <?php

 if(isset($_POST['action']) && $_POST['action']=='commenter')
 {
     $errors = array();
     $db = App::getDatabase();
     $coment = App::getComment();

     if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['content']) && isset($_POST['ref'])) {
         if (empty($_POST['username'])) {
             $errors['empty'] = 'votre Nom est obligatoire';
         }
         if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['username'])) {
             $errors['empty'] = 'le caractere speciaux sont pas autorisé dans le nom';
         }

         if (empty($_POST['email'])) {
             $errors['empty'] = 'votre Email est obligatoire';
         }
         if (empty($_POST['content'])) {
             $errors['empty'] = 'Vous devez rentrer tout le champs pour commenter ce post!';
         }
         if (strlen($_POST['username']) <= 3 or strlen($_POST['username'] > 20)) {
             $errors['empty'] = 'Votre Nom doit etre au minimun 3 caracteres !';
         }

         if (!empty($errors)) {
             ?>
             <div class="card red">
                 <div class="card-content white-text">
                     <?php
                     foreach ($errors as $err) {
                         echo $err . '<br>';
                     }
                     ?>
                 </div>
             </div>
         <?php
         }else{
                     $coment->saveComment($db,
                     trim(htmlentities($_POST['username'])),
                     trim(htmlentities($_POST['email'])),
                     trim(htmlentities($_POST['content'])),
                     'posts',$ref);
             }
         ?>
         <?php
     }
 }?>
    <div class="comment row" style="margin: 10px 0">
      <?php $cmt = App::getComment()->getLastComment(App::getDatabase(), 'posts', $ref); ?>
            <h4><?=count($cmt)?>&nbsp;Commentaire<?=(count($cmt) <= 1 ? '' : 's') ?></h4>
         <?php
            if($cmt !=false)
            {
                foreach ($cmt  as $v) {?>
                    <blockquote>
                        <div class="s2">
                            <img src="http://www.gravatar.com/avatar/<?= md5($v->email); ?>"
                                 style="border-radius: 50px;" width="40" height="40" alt=""/>
                        </div>
                        <h6>
                            <strong><?= $v->username ?></strong>
                            &nbsp;<em> <?= date("d/m/Y à H:i:s", strtotime($v->date_comment)); ?> </em>
                            <a href="" class="reply" data-id="<?= $v->parent_id ? $v->parent_id : $v->id; ?>">&nbsp;&nbsp;<i class="material-icons">reply</i> </a>
                        </h6>
                        <p><?= nl2br($v->content); ?></p>
                    </blockquote>
                    <div style="margin-left: 60px">
                    <?php foreach ($v->replies as $replie){ ?>
                        <blockquote>
                            <div class="s2">
                                <img src="http://www.gravatar.com/avatar/<?= md5($replie->email); ?>"
                                     style="border-radius: 50px;" width="40" height="40" alt=""/>
                            </div>
                            <h6>
                                <strong><?= $replie->username ?></strong>
                                &nbsp;<em> <?= date("d/m/Y à H:i:s", strtotime($replie->date_comment)); ?> </em>
                           </h6>
                            <p><?= nl2br($replie->content); ?></p>
                        </blockquote>
                        </div>
                        <?php
                    }
                }
             }else
            {
             ?>
              <p>Aucun commentaire ne posté pour cet Post ! soyez-le premier...</p>
            <?php
            }
            ?>
    </div>
      <h4>Commenter</h4>
<div class="row">
    <form class="col s12" action="#comment" method="post" id="comment" >
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix"  name="username" required type="text" class="validate">
                <label for="icon_prefix">Nom</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">email</i>
                <input id="icon_email" name="email" type="email"  required class="validate">
                <label for="icon_email">Email</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="textarea1" name="content"  required class="materialize-textarea"></textarea>
                <label for="textarea1">Laisser Votre Commenatire</label>
            </div>
        </div>
        <input type="hidden" name="ref" value="<?php echo $ref ?>" />
        <input type="hidden" name="commenterEn" value="commenter" />
        <input type="hidden" name="parent_id" value="0" id="parent_id"/>

        <button class="btn waves-effect waves-light" type="submit" name="action" value="action">Commenter
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
</div>
<br><br>
    <h4>Suggestion : </h4>
<div class="row">
    <div class="card">
        <?php
        foreach(App::getPost()->getbyRandom($db) as $k=>$v)
        {?>
        <!--   Icon Section   -->
        <div class="col s12 m8 l4">
            <div class="card-content small hoverable">
                <div class="card-image center waves-effect waves-block waves-light" >
                    <a href="post&ref=<?=$v->id .'998#8!9'. md5($v->id) . '/' .time();?>">
                        <img src="./haidara/images/posts/<?=$v->image_post ;?>" style="min-height: 200px; width: 200px;" class="activator" alt="<?=$v->title_post?>">
                    </a>
                </div>
                <div class="card-content">
                    <p><a href="post&ref=<?=$v->id .'998#8!9'. md5($v->id) . '/' . time();?>"><?=$v->title_post ;?></a></p>
                    <p><a href="post&ref=<?=$v->id .'998#8!9'. md5($v->id) . '/'. time();?>"><?= substr(nl2br($v->content_post),0, 50);?>...</a></p
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>