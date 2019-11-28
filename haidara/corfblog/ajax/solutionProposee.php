<h3>Correction</h3>
<?php
if(isset($_POST['submit']) && $_POST['submit'] == 'action')
{

    $validator = App::getValidator();

    $classe = trim(htmlentities((strval($_POST['classe']))));
    $content =trim(htmlentities(strval($_POST['content'])));
    $validator->check($classe, $content, "vous devez renseigner tout le champs");
    $validator->check($classe,"Veuillez Saisie votre classe svp !");
    $validator->check($content, "Veuillez proposé votre solution  svp!");

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
        $p->updateField($db,['corrige_post' =>$_POST['content'],'ref' =>$ref],'corrige_post');
    }
}
?>
<p><?= !empty($post->corrige_post) ?
        strip_tags($post->corrige_post) : 'En attente de correction.<br>Suggéré une Solution&nbsp;&nbsp;
                                <a href="#modal1"
                                   class="btn-floating  btn-small waves-light orange waves-effect modal-trigger ">
                                    <i class="material-icons">mode_edit</i>
                              </a>
                               ' ;
    ?></p>