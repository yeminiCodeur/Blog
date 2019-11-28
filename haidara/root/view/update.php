<?php
require_once 'headPages.php';
$ref = 0 ;
$id = explode("4998#8!9",$_GET['ref']);
$ref = (int)substr($id[0],0,1);
$db =App::getDatabase();
 $p = App::getPost();

$post = $p->getPostById($ref, $db);
if($post == false)
{
   ?>
   <script>window.location.replace("404");</script>
<?php
}
else
    {?>
        <div class="parallax-container">
            <div class="parallax">
                <img src="images/posts/<?= $post->image_post; ?>"  alt="<?= $post->title_post ?>">
            </div>
        </div>
        <?php  echo MENU;
          if(isset($_POST['title']) && isset($_POST['content']))
          {
             $valid=App::getValidator();
              $valid->check($_POST['title'],$_POST['content'], "tout le champ sont obligtoire");
              if (!$valid->isValid())
              {
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
              } else {
               $success =  $p->update($db,['title'=>htmlentities(trim($_POST['title'])), 'content'=>htmlentities(trim($_POST['content'])), 'posted_post'=>isset($_POST['posted']) ? '1' : '0', 'ref'=>$ref]);
                  if($success)
                  {
                      ?>
                      <div class="container">
                          <div class="row">
                      <div class="card green">
                          <div class="card-content white-text">
                            <p>L'article a été bien modifier</p>
                          </div>
                      </div>
                      <script>window.location.replace("listing");</script>
                      <?php
                  }else
                  {
                      ?>
                      <div class="card red">
                          <div class="card-content white-text">
                              <p>Une erreur est survenue</p>
                          </div>
                      </div>
                      </div>
                      </div>
                  <?php
                  }
              }
          }

        ?>
        <div class="container">
            <div class="row">
                <form method="post">
                <div class="col s12  m12 l12">
               <div class="input-field col s6">
                        <i class="material-icons prefix">mode_edit</i>
                          <input id="icon_title" name="title" type="text"  value="<?= $post->title_post; ?>" required class="validate">
                        <label for="icon_title">Titre</label>
                    </div>
                    <div class="row">
                        <div class="col l8 m6 s12 ">
                            <div class="input-field col s8">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="textarea1" name="content"   required class="materialize-textarea">
                                    <?= $post->content_post ?>
                                </textarea>
                                <label for="textarea1">Modifer</label>
                            </div>
                    </div>
                        <div class="col s6">
                            <p>public</p>
                            <div class="switch">
                                <label>
                                    <label class="red-text">Non</label>
                                    <input type="checkbox" name="posted">
                                    <span class="lever"></span>
                                    <label class="green-text">Oui</label>
                                </label>
                            </div>

                        </div>
                  </div>
                    <button class="btn waves-effect waves-light right" type="submit" name="action" value="action">modifié
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>