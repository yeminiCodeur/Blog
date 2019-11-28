<?php require_once 'headPages.php';?>
<?=MENU?>
<div class="container">
    <?php
    if(isset($_POST['submit'])){
        if(isset($_POST['role']) && isset($_POST['supuser_name']) && isset($_POST['supuser_prenom']) &&isset($_POST['supuser_email']) && isset($_POST['supuser_email_again'])){

            $validator = App::getValidator();
            $db = App::getDatabase();
            $n =        htmlentities(trim(strval($_POST['supuser_name']))) ;
            $p =        htmlentities(trim(strval($_POST['supuser_prenom']))) ;
            $e =        htmlentities(trim(strval($_POST['supuser_email']))) ;
            $eagain=    htmlentities(trim(strval($_POST['supuser_email_again'])));
            $role =     htmlentities(trim(strval($_POST['role'])));

            $checked = $validator->check($n, $p, $e, $eagain, "Tout le champs sont obligatire");

            if(!$checked)
            {
                $validator->userImputValidate($n);
                $validator->passwordValidate($e, $eagain, "les adresses emails ne correspondent pas");
                $validator->isAlpha($n, "votre Nom ne pas valide (Alphanumerique) ");
                $validator->isEmail($e, "cet Email ne pas valide");

                if ($validator->isValid())
                {
                    $validator->isUniq('email_supuser', $e, "supuser", $db, "cet email est deja utilisé par un autre compte");
                }
            }

            if (!$validator->isValid())
            {
                ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <i class="material-icons">error</i>
                        <?php
                        foreach ($validator->getErrors() as $err) {
                            echo $err . '<br>';
                        }
                        ?>
                    </div>
                </div>
            <?php
            } else {
                  App::getAuth()->registerUser($db,'supuser',$n, $p, $e, $role);
            }
        }
    }
    ?>
    <h4>Parametre</h4>
    <div class="row">
        <div class="col m6 s12">
              <h4>Modérateurs</h4>
            <table>
                  <thead>
                  <tr>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Email</th>
                      <th>Rôle</th>
                      <th>Validé</th>
                  </tr>
                  </thead>
                <tbody>
                <?php
                $help = App::getHelperMe();
                foreach(App::getAuth()->get_users(App::getDatabase(),'supuser') as $v) {
                    ?>
                    <tr>
                        <td><a href="infoAdmin&ref=<?= $v->id ;?>"> <?= $help->getDecoded($v->nom_supuser)   ;?></a></td>
                        <td><?= $help->getDecoded($v->prenom_supuser) ;?></td>
                        <td><?= $help->getDecoded($v->email_supuser)  ;?></td>
                        <td><?= $help->getDecoded($v->role_supuser)   ;?></td>
                        <td><?= empty($v->password_supuser) ? '<i class="material-icons">av_timer</i>' : '<i class="material-icons">verified_user</i>'?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col m6 s12">
            <h4>Ajouter un nouveau modo</h4>
            <form action="" method="post">
                <div class="row">
                      <div class="input-field col s12 ">
                          <input type="text" name="supuser_name" id="sn">
                          <label for="sn" data-error="wrong" data-success="right">Nom</label>
                      </div>
                    <div class="input-field col s12 ">
                        <input type="text" name="supuser_prenom" id="sp">
                        <label for="sp" data-error="wrong" data-success="right">Prenom</label>
                    </div>
                    <div class="input-field col s12 ">
                        <input type="email" name="supuser_email" id="se">
                        <label for="se" data-error="wrong" data-success="right">Email</label>
                    </div>
                    <div class="input-field col s12 ">
                        <input type="email" name="supuser_email_again" id="sea">
                        <label for="sea" data-error="wrong" data-success="right">Retaper Votre Email</label>
                    </div>
                    <div class="input-field col s12">
                        <select name="role" id="role">
                            <option value="admin">Administrateur</option>
                            <option value="modo">Modorateur</option>
                        </select>
                        <label for="role">Grade</label>
                    </div>
                    <div class="col s12">
                        <button type="submit" name="submit" class="btn">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>