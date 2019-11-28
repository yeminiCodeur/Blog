<?php
require_once '/../view/headPages.php' ; ?>
<div class="row">
    <div class="container">
        <?php
        if(isset($_POST['submit']))
        {
            if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_again']))
            {
                $username         = htmlentities(strip_tags(strval(trim($_POST['username']))));
                $email            = htmlentities(strip_tags(strval(trim($_POST['email']))));
                $password         = htmlentities(strip_tags(strval(trim($_POST['password']))));
                $password_again   = htmlentities(strip_tags(strval(trim($_POST['password_again']))));

                $db = App::getDatabase();
                $validator = App::getValidator();

                $checked = $validator->check($username, $email, $password, $password_again, "Tout le champ sont obligatoire.");
                if(!$checked)
                {
                    $validator->isAlpha($username, "votre pseudo ne pas valide (Alphanumerique) ");
                    $validator->isEmail($email, "cet email ne pas valide");
                    $validator->passwordValidate($password, $password_again, "le mot de passe ne correspondent pas");
                    $validator->passwordValidate($password);
                    $validator->userImputValidate($username);

                    if ($validator->isValid()) {
                        $validator->isUniq('username', $username, "mesusers", $db, "ce pseudo est dejà pris");
                        $validator->isUniq('email', $email, "mesusers", $db, "cet email est deja utilisé par un autre compte");
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

                    App::getAuth()->registerUser($db,'mesusers', $validator->filtrer($username),$validator->filtrer($email),$validator->filtrer($password));
                    //Session::getInstance()->write('username',$username);
                    session_start();
                    $_SESSION['a'] = $username ;
                    App::redirect('confirm');

                }
            }
        }?>
        <div class="section">
            <div class="col s12 m8 l6">
                <div class="card medium indigo" style="border-radius: 8px">

                <form class="col s12" action="aygaAyContote" method="post">
                        <div class="row">
                            <h4 class="center white-text">Inscription</h4>
                                <div class="input-field col s6">
                                    <i class="material-icons white-text prefix">account_circle</i>
                                    <input id="user_name" type="text" name="username" class="validate">
                                    <label for="user_name" class="white-text">Nom Utilisateur</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons white-text prefix">email</i>
                                    <input id="email" type="text" name="email" class="validate">
                                    <label for="email" class="white-text">Email</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons white-text prefix">lock</i>
                                    <input id="password" type="password" name="password" class="validate" >
                                    <label for="password" class="white-text">Password</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons  white-text prefix">lock</i>
                                    <input id="password_again" type="password" name="password_again" class="validate">
                                    <label for="password_again" class="white-text">Comfirmer Password</label>
                                </div>

                                    <input type="checkbox" class="filled-in" id="filled-in-box" name="remember"  />
                                    <label for="filled-in-box" class="white-text">Je lus et accepté <a href="condition">Condition Génération</a></label>
                                 <br><br>
                                <button class="btn" name="submit" type="submit">Je m'inscris</button>
                                <button class="btn red" type="reset" >Annulé</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s12 m8 l6">
                <div class="card medium" style="border-radius: 8px">
                    <div class="card-content">
                        <h3>Pourquoi s'inscrire ?</h3>
                        <p>
                            Devenir membre sur SchoolBit, c'est accéder à du contenu exclusif pour apprendre et s'améliorer dans le domaine du développement web et du graphisme.
                            La création d'un compte est totalement gratuite. Vous pourrez ensuite choisir de devenir premium pour télécharger les sources ou les tutoriels.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once '/../view/footer.php';