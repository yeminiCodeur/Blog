<?php require_once 'headPages.php'; ?>
<?= MENU; ?>
<div class="container">
    <h2>Listing des Exercices </h2>
    <hr>
<?php
foreach(App::getPost()->getAll(App::getDatabase()) as $k=>$v){
    ?>
        <div class="row">
            <div class="col s12  m12 l12">
                <h3><?=$v->title_post;?>&nbsp;&nbsp;<?=  $v->posted_post == '0'  ?  '<i class="material-icons">lock</i>' :  '' ?></h3>
                <div class="row">
                    <div class="col l8 m6 s12 ">
                        <p><?= substr(nl2br($v->content_post),0,1200);?>...</p>
                    </div>
                    <div class="col s12  m6 l4">
                        <img src="images/posts/<?=$v->image_post ;?>" class="responsive-img materialboxed" alt="<?=$v->title_post?>">
                        <br/>
                        <a class="btn  light-green waves-light waves-effect" href="update&ref=<?=$v->id .'998#8!9'. md5($v->id).'!#0.98'; ?>">Lire l'article complet</a>
                    </div>
                </div>
            </div>
        </div>

<?php
}
?>
</div>
<div class="container">
    <div class="row">
        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>
</div>