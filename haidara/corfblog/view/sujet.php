<?php require_once 'headPages.php';
//require_once 'listCategorie.php';
$db = App::getDatabase();
$post = App::getPost();
?>
<div class="container" >
<script>
    function showHint(str)
    {
        if (str.length == 0 ) {
            document.getElementById("txthint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txthint").innerHTML = this.responseText;
                    document.getElementById("cc").innerHTML = "";
                }
            };
            xmlhttp.open("GET", "categorie&&q=" + str , true);
            xmlhttp.send();
        }
    }
</script>
    <form method="post" action="">
        <div class="row">
            <div class="input-field col s4">
                <select  name="q" onchange="showHint(this.value);">
                    <option value="">Categorie</option>
                    <?php
                    foreach(App::getOp()->getAllByFilter($db,'type_post') as $t){ ?>
                        <option value="<?=$t->id?>"><?=$t->nom?></option>
                    <?php
                    } ?>
                </select>
            </div>
        </div>
    </form>
    </div>
    <div class="container">
    <div id="txthint"></div>
        <div id="cc">
           <?php
               $pagination = App::Pagination($db);
             if(!isset($_GET['p']))
             {
                 $_GET['p'] = 1;

             }else{
                 $_GET['p'] = $_GET['p'];
             }
              $ps = $pagination->getPaginate($_GET['p']);
               foreach ($ps as $k => $v) {
                   ?>
                   <div class="row">
                       <div class="col s12  m12 l12">
                           <h3><?= $v->title_post; ?></h3>

                           <div class="row">
                               <div class="col l8 m6 s12 ">
                                   <p><?= substr(nl2br($v->content_post), 0, 200); ?>...</p>
                               </div>
                               <div class="col s12  m6 l4">
                                   <img src="./haidara/images/posts/<?= $v->image_post; ?>"
                                        class="responsive-img materialboxed" width="80px" height="80px"
                                        alt="<?= $v->title_post ?>">
                                   <br/>
                                   <a class="btn  light-green waves-light waves-effec t" style="font-size: 8px"
                                      href="post&ref=<?= $v->id . '998#8!9' . md5($v->id) . '89' . '/' . $v->title_post; ?>"><b>Lire
                                           l'article</b></a>
                               </div>
                           </div>
                       </div>
                   </div>
               <?php
               }
               ?>
               <ul class="pagination">
                   <li class="<?php if ($pagination->getCurrent() == 1) echo 'disabled'; ?>">
                       <a href="?p=<?php if ($pagination->getCurrent() != 1) {
                           echo $pagination->getCurrent() - 1;
                       } else {
                           $pagination->getCurrent();
                       } ?>"
                           ><i class="material-icons">chevron_left</i></a>
                   </li>

                   <?php
                   for ($i = 1; $i <= $pagination->getNbPage(); $i++) {

                       if ($i == $pagination->getCurrent()) {
                           ?>
                           <li class="active teal"><a href="?p=<?= $i ?>"><?= $i ?></a></li>
                       <?php
                       } else {
                           ?>
                           <li class="waves-effect"><a href="?p=<?= $i ?>"><?= $i ?></a></li>
                       <?php
                       }
                   }
                   ?>
                   <li class="<?php if ($pagination->getCurrent() == $pagination->getNbPage()) echo 'disabled'; ?>">
                       <a href="?p=<?php if ($pagination->getCurrent() != $pagination->getNbPage()) {
                           echo $pagination->getCurrent() + 1;
                       } else {
                           $pagination->getCurrent();
                       }
                       ?>"><i class="material-icons">chevron_right</i></a>
                   </li>
               </ul>
            </div>
     </div>
    <?php
require_once 'footer.php' ;?>