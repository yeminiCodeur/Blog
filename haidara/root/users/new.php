<?php
if(Session::getInstance()->read('admin')) {
    App::redirect('dashboard');
}
$db = App::getDatabase();
require_once '/../view/headPages.php';
?>
<div class="container">
    <div class="row">
        <div class="col l4 m6 s12 offset-l4 offset-m3">
            <div class="card-panel">
                <div class="row">
                    <div class="col s6 offset-s3">
                        <img src="images/background/avatar.png" width="100%" alt="Root">
                    </div>
                </div>
                <h4>Se Connecter</h4>
                <?php
                if(isset($_POST['send']))
                {
                    $validator = App::getValidator();
                    if(isset($_POST['username']) && isset($_POST['password']))
                    {
                        $validator->check($_POST['username'], $_POST['password'], "Tout le champ sont obligatoire");
                        if (!$validator->isValid()) {
                            ?>
                            <div class="card red fade-out">
                                <div class="card-content white-text ">
                                    <?php
                                    foreach ($validator->getErrors() as $err) {
                                        echo $err . '<br>';
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        } else {
                            $username = htmlentities(strip_tags(trim($_POST['username'])));
                            $password = htmlentities(strip_tags(trim($_POST['password'])));
                            $user = App::getAuth()->login($db,'mesuser', $username, $password);
                            Session::getInstance()->write('admin', $username);
                            App::redirect("dashboard");
                        }
                    }

                }
                ?>
                <form  action="login" method="POST">
                    <div class="row">
                        <h4 class="center white-text">Se Connecter</h4>
                        <div class="card-content">
                            <div class="input-field  s6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="last_name" type="text" name="username" class="validate">
                                <label for="last_name">Nom Utilisateur OU email</label>
                            </div>
                            <div class="input-field  s6">
                                <i class="material-icons prefix">lock</i>
                                <input id="last_name" type="password" name="password" class="validate">
                                <label for="last_name">mot de passe</label>
                            </div>
                            <center>
                                <button class="btn" type="submit" value="send" name="send"><i class="material-icons">perm_identity</i> se connecter</button>
                                <br><br>
                                <a href="forget">mot de passe Oublié ?</a>
                            </center>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>