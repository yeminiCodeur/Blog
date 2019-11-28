<?php require_once '/../view/headPages.php' ; ?>
    <div class="row">
        <div class="container">
            <?php
            
             $db =  App::getDatabase();
             $validator = App::getValidator();
            // $session = Session::getInstance();

           /* if(App::getAuth()->user($session))
            {
                App::redirect('profile');
            }
             */
            if(isset($_POST['submit']) )
            {
                if(isset($_POST['username']) && isset($_POST['password']))
                {
                    //filtrage de base
                    $password = trim(htmlentities(strip_tags(strval($_POST['password']))));
                    $username = trim(htmlentities(strip_tags(strval($_POST['username']))));
                    //filtrage restrictif
                    $password= $validator->filtrer($password);
                    $username = $validator->filtrer($username);
                    $remember= isset($_POST['remember']) ? '1' : '0';

                    $validator->check($username, $password, "Tout le champ sont obligatoire !");
                    $validator->check($username, "Veuillez renseigner le champ username or email");
                    $validator->check($password, "veuillez renseigner le champ de mot de passe");


                    if($validator->isValid())
                    {
                        if($validator->anti_injection($username, $password))
                        {
                            $validator->setError('command','sql injection ');
                        }else {
                            //$user = App::getAuth()->login($db, $validator->filtrer($username), $validator->filtrer($password), 'mesusers',$remember, Session::getInstance());
                            /*  if($user == null)
                              {
                                  $validator->setError("doesNotExist","La Combinaison du username/email et password ne correspondent pas");
                              }else{
                                 // $session->setFlash('success','Vous étes bien connecter');
                                  echo 'ok';
                              }*/
                        }
                    }
                    if (!$validator->isValid())
                      {
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
                           // $session->write('user', $username);
                          //  App::redirect("profile");
                        echo 'tout va bien';
                        }
                    }

                }
                ?>
            <div class="section">
                <div class="col s12 m8 l6">
                    <div class="card horizontal indigo medium"style="border-radius: 5px;" >
                        <form class="col s12" action="aygaConnectee" method="post">
                            <div class="row">
                                <h4 class="center white-text">Se Connecter</h4>
                                <div class="card-content">
                                    <div class="input-field white-text  s6">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="last_name" type="text" name="username" class="validate">
                                        <label for="last_name" class="white-text">Nom Utilisateur OU email</label>
                                    </div>
                                    <div class="input-field white-text s6">
                                        <i class="material-icons  prefix">lock</i>
                                        <input id="last_name" type="password" name="password" class="validate white-text">
                                        <label for="last_name" class="white-text">mot de passe</label>
                                    </div>
                                    <div class="input-field  s6">
                                    <input type="checkbox" class="filled-in" id="filled-in-box" name="remember"  />
                                    <label for="filled-in-box" class="white-text">Se Souvenir de moi</label>
                                   </div><br>
                                    <button class="btn green" type="submit" name="submit">Valider</button>
                                    <br><br>
                                    <a href="forget" class="white-text">mot de passe Oublié ?</a>
                               </div>

                            </div>
                        </form>

                    </div>
                </div>
                <div class="col s12 m8 l6">
                    <div class="card medium" style="border-radius: 5px">
                        <div class="card-content">
                            <h4>Pourquoi se Connecter ?</h4>
                            <p>Se Connecté sur SchoolBit, C'est  pour  acceder à toute les fonctionnalités et ainsi de pouvoir
                             acceder à votre space membre...
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 20/03/2017
 * Time: 00:23
 */

require_once '/../view/footer.php';

?>