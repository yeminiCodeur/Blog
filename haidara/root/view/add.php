<?php
          require_once 'headPages.php' ;
?>
<?= MENU;?>
<div class="container">
    <h4><i class="material-icons">note_add</i> Public Un Nouveau  article</h4>
<?php
        $db       = App::getDatabase();
        $article  = App::getPost();
        $validator = App::getValidator();

        if(isset($_POST['action']) && $_POST['action'] == "action")
        {
            if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['corrige']) && isset($_POST['id_classe']) && isset($_POST['id_type_post'])) {

                // Recuperation de du contenu de champq
                $title        = $_POST['title'];
                $content      = $_POST['content'];
                $corrige      = $_POST['corrige'];
                $id_cls       = $_POST['id_classe'];
                $id_type_post = $_POST['id_type_post'];
                $posted       = isset($_POST['posted']) ? '1' : '0';

                //Validation des champs

                $validator->check($title, $content, $id_cls, $id_type_post, $corrige, "Tout le champs sont obligatoire");
                $validator->check($title, "le champ content est Obligatoire!");
                $validator->check($content, "le champ Contenu est Obligatoire!");
                $validator->check($corrige, "le champ corriger est Obligatoire!");
                $validator->check($id_type_post, "le type de post Contenu est Obligatoire!");
                $validator->check($id_cls, "le champ Classe est Obligatoire!");
                $v = $validator->uploadIMage($_FILES, md5(uniqid()));

                if (!$validator->isValid()) {
                    ?>
                    <div class="card red">
                        <div class="card-content white-text">
                            <?php
                            foreach ($validator->getErrors() as $err) {
                                echo $err . '<br>';
                            }
                            ?>
                        </div>
                    </div>
                <?php
                } else {

                    if (!$v)
                        $article->insert(
                            $db,
                            [
                                "title_post" => $title,
                                "content_post" => $content,
                                "writer_post" => 'abouba@gmail.com',
                                "posted_post" => $posted,
                                "corrige_post" => $corrige,
                                "id_classe" =>   $id_cls,
                                "id_type_post" => $id_type_post
                            ]);
                    else
                        $article->insert(
                            $db,
                            [
                                "title_post" => htmlentities(trim($_POST['title'])),
                                "content_post" => htmlentities(trim($_POST['content'])),
                                "writer_post" => "abouba@gmail.com",
                                "image_post" => $v,
                                "posted_post" => isset($_POST['posted']) ? '1' : '0',
                                "corrige_post" => htmlentities(trim($_POST['corrige'])),
                                "id_classe" => htmlentities(trim($_POST['id_classe'])),
                                "id_type_post" => htmlentities(trim($_POST['id_type_post']))
                            ],
                            true);

                    App::redirect('post&ref=' . $db->getLastInsert());
                    ?>
                <?php
                }
            }

        }
        ?>


    <form class="col s12" action="add" method="post" enctype="multipart/form-data" >
        <div class="row">
            <div class="input-field col s8">
                <i class="material-icons prefix">mode_edit</i>
                <input id="icon_title" name="title" type="text"  required class="validate">
                <label for="icon_title">Titre</label>
            </div>

            <div class="input-field col s8">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="textarea1" name="content"  required class="materialize-textarea"></textarea>
                <label for="textarea1">Ecrire Un nouveau Article</label>
            </div>
            <div class="input-field col s8">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="textarea1" name="corrige"  required class="materialize-textarea"></textarea>
                <label for="textarea1">Corriger</label>
            </div>


            <div class="input-field col s8">
               <select name="id_type_post" id="classe">
                <option value=""></option>
                   <?php foreach(App::getOp()->getAllByFilter(App::getDatabase(),'type_post') as $value){?>
                       <option value="<?=$value->id?>"><?=$value->nom;?></option>
                   <?php
                   }?>
               </select>
                <label for="classe">Matiere</label>
            </div>

            <div class="input-field col s8">
                <select  name="id_classe" id="classe">
                    <option value=""></option>
                    <?php foreach(App::getOp()->getAllByFilter(App::getDatabase(),'classe') as $value){?>
                        <option value="<?=$value->id?>"><?=$value->nom;?></option>
                    <?php
                    }?>
                </select>
                <label for="classe">Classe</label>
            </div>

            <div class="file-field input-field col s8">
                <div class="btn btn-floating">
                    <span class="material-icons">open_in_browser</span>
                    <input type="file" name="image" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" name="image" type="text" readonly placeholder="Choisi une image">
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

                <div class="col s2">
                    <br>
                    <br>
                    <button class="btn col waves-effect waves-light btn-flat right" type="submit" name="action" value="action">
                        <span class="material-icons">input </span>
                    </button>
                </div>
            </div>
     </form>
    </div>
