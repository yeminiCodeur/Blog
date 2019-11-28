<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
   <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Profile</title>

    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->

</head>

<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<?php

  ///App::getAuth()->restrict(Session::getInstance());
?>
<!--Header-->
<div class="navbar-fixed">
    <nav class="fixed teal" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="home" class="brand-logo">
                <img src="./haidara/images/userImage/avatar.png" alt="" class="circle responsive-img valign profile-image-post">

            </a>
            <ul class="right hide-on-med-and-down">
                <li class="<?=$page=='home' ? 'active':''?>"><a href="home"><i class="material-icons">home</i></a></li>
                <li class="<?=$page=='notifaction' ? 'active':''?>"><a href='notification' ><i class="material-icons">notifications</i><?php  //echo 'votre compte a bien validé dans la session'?> </a></li>
                <li class="<?=$page=='message' ? 'active':''?>"><a  href='message&contact-id=1' ><i class="material-icons">messages</i> </a></li>
                <li class="<?=$page=='message' ? 'active':''?>"><a  href='#mod1' ><i class="material-icons">edit</i> </a></li>

            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li class="<?=$page=='home' ? 'active':''?>"><a href="home"><i class="material-icons">home</i> </a></li>
                <li class="<?=$page=='info' ? 'active':''?>"><a href="home"></a></li>
        </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>
<div class="modal" id="mod1">
    <div class="modal-content">
     <h4>Proposer Un sujet</h4>
        <form class="col s12" method="post" action="exoPropos" id="comment" >
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="icon_classe" name="classe"  type="text"  required class="validate">
                    <label for="icon_classe">Votre Classe</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="textarea1" name="content"  required class="materialize-textarea"></textarea>
                    <label for="textarea1">Laisser votre exercice</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action" value="action">Envoyer
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red delete_comment waves-green btn-flat">
            <i class="material-icons">delete</i> </a>
    </div>
</div>
<!-- end header -->
        <!-- START CONTENT -->
        <section id="content">

            <!--start container-->
            <div class="container">

                <div id="profile-page" class="section no-pad-top" style="margin-top: -63px;">
                    <!-- profile-page-header -->
                    <div id="profile-page-header" class="card" style="background-image:url('./haidara/images/background/3.jpg'); ">

                        <figure class="card-profile-image">
                            <img src="./haidara/images/userImage/abouba.PNG" alt="profile image" class=" z-depth-4 responsive-img activator">
                            <h4 class="card-title white-text text-darken-4">Abouba Haidara</h4>

                            <div class="file-field input-field">
                                <div>
                                    <a href=""> <span class="material-icons">open_in_browser</span></a>
                                  <input type="file" name="image" multiple>
                                </div>
                            </div>
                        </figure>
                        <div class="card-content">
                            <div class="row">
                                <div class="col s3 offset-s2">
                                    <h4 class="card-title white-text text-darken-4">Voir</h4>
                                    <p class="medium-small white-text">Nouveau</p>
                                </div>
                                <div class="col s2 center-align">
                                    <h4 class="card-title blue-text text-darken-4">10+</h4>
                                    <p class="medium-small blue-text">Mes Exercice En attente </p>
                                </div>
                                <div class="col s2 center-align">
                                    <h4 class="card-title white-text text-darken-4">6</h4>
                                    <p class="medium-small white-text">Partager</p>
                                </div>
                                <div class="col s2 center-align">
                                    <h4 class="card-title white-text text-darken-4">Progression</h4>
                                    <p class="medium-small blue-text">Révisé</p>
                                </div>
                            </div>
                            <div class="col s1 right-align">
                                <a class="btn-floating activator waves-effect waves-light darken-2 right">
                                    <i class="material-icons">account_circle</i>
                                </a>
                            </div>
                        </div>
                        <div class="card-reveal">
                            <p>
                                <span class="card-title white-text text-darken-4">Abouba<i class="material-icons right">close</i></span>
                                <span><i class="mdi-action-perm-identity blue-text text-darken-2"></i>Mes Projets</span>
                            </p>

                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>

                            <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                            <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>
                            <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
                            <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> BAR - AUS</p>
                        </div>
                    </div>

                    <div id="profile-page-content" class="row">
                        <!-- profile-page-sidebar-->
                        <div id="profile-page-sidebar" class="col s12 m4">
                            <!-- Profile About  -->
                            <div class="card light-blue">
                                <div class="card-content white-text">
                                    <span class="card-title">A propos de Moi!</span>
                                    <p>Je m'appelle A.Haidara Etudiant en STIC3 Option INFO.</p>
                                </div>
                            </div>

                            <ul id="profile-page-about-details" class="collection z-depth-1">
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s5 grey-text darken-1"><i class="mdi-action-wallet-travel"></i> Project</div>
                                        <div class="col s7 grey-text text-darken-4 right-align">ABC Name</div>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s5 grey-text darken-1"><i class="mdi-social-poll"></i> Skills</div>
                                        <div class="col s7 grey-text text-darken-4 right-align">HTML, CSS</div>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s5 grey-text darken-1"><i class="mdi-social-domain"></i> Lives in</div>
                                        <div class="col s7 grey-text text-darken-4 right-align">Java, C#</div>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s5 grey-text darken-1"><i class="mdi-social-cake"></i> Birth date</div>
                                        <div class="col s7 grey-text text-darken-4 right-align">18th June, 1991</div>
                                    </div>
                                </li>
                            </ul>

                            <div class="card amber darken-2">
                                <div class="card-content white-text center-align">
                                    <p class="card-title"><i class="mdi-social-group-add"></i> 3685</p>
                                    <p>Followers</p>
                                </div>
                            </div>

                            <ul id="profile-page-about-feed" class="collection z-depth-1">
                                <li class="collection-item avatar">
                                    <img src="./haidara/images/userImage/avatar.png" alt="" class="circle">
                                    <span class="title">Project Title</span>
                                    <p>Task assigned to new changes.
                                        <br> <span class="ultra-small">Second Line</span>
                                    </p>
                                    <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="mdi-file-folder circle"></i>
                                    <span class="title">New Project</span>
                                    <p>First Line of Project Work
                                        <br> <span class="ultra-small">Second Line</span>
                                    </p>
                                    <a href="#!" class="secondary-content"><i class="mdi-social-domain"></i></a>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="mdi-action-assessment circle green"></i>
                                    <span class="title">New Payment</span>
                                    <p>Last UK Project Payment
                                        <br> <span class="ultra-small">$ 3,684.00</span>
                                    </p>
                                    <a href="#!" class="secondary-content"><i class="mdi-editor-attach-money"></i></a>
                                </li>
                                <li class="collection-item avatar">
                                    <i class="mdi-av-play-arrow circle red"></i>
                                    <span class="title">Latest News</span>
                                    <p>company management news
                                        <br> <span class="ultra-small">Second Line</span>
                                    </p>
                                    <a href="#!" class="secondary-content"><i class="mdi-action-track-changes"></i></a>
                                </li>
                            </ul>
                            <div class="card center-align">
                                <div class="card-content purple white-text">
                                    <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Vos statut d'apprentissage</p>
                                    <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 70% <span class="purple-text text-lighten-5">last month</span>
                                    </p>
                                </div>
                                <div class="card-action purple darken-2">
                                    <div id="sales-compositebar"></div>
                                </div>
                            </div>
                            <!-- Map Card -->
                            <div class="map-card">
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <div id="map-canvas" data-lat="40.747688" data-lng="-74.004142"></div>
                                    </div>
                                    <div class="card-content">
                                        <a class="btn-floating activator btn-move-up blue waves-effect waves-light darken-2 right">
                                            <i class="mdi-maps-pin-drop"></i>
                                        </a>
                                        <h4 class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Company Name LLC</a>
                                        </h4>
                                        <p class="blog-post-content">Some more information about this company.</p>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Company Name LLC <i class="material-icons right">close</i></span>
                                        <p>Here is some more information about this company. As a creative studio we believe no client is too big nor too small to work with us to obtain good advantage.By combining the creativity of artists with the precision of engineers we develop custom solutions that achieve results.Some more information about this company.</p>
                                        <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> xxxxxxxxxxxxxxxxx</p>
                                        <p><i class="mdi-communication-business cyan-text text-darken-2"></i> 125, Uahb dakar senelgal</p>
                                        <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +221 777555225</p>
                                        <p><i class="mdi-communication-email cyan-text text-darken-2"></i> support@geekslabs.com</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Map Card -->

                        </div>
                        <!-- profile-page-sidebar-->

                        <!-- profile-page-wall -->
                        <div id="profile-page-wall" class="col s12 m8">
                            <!-- profile-page-wall-share -->
                            <div id="profile-page-wall-share" class="row">
                                <div class="col s12">
                                    <ul class="tabs tab-profile z-depth-1 light-blue">
                                        <li class="tab col s3"><a class="white-text waves-effect waves-light active" href="#UpdateStatus"><i class="mdi-editor-border-color"></i> Update Status</a>
                                        </li>
                                        <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#AddPhotos"><i class="mdi-image-camera-alt"></i> Add Photos</a>
                                        </li>
                                        <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#CreateAlbum"><i class="mdi-image-photo-album"></i> Create Album</a>
                                        </li>
                                    </ul>
                                    <!-- UpdateStatus-->
                                    <div id="UpdateStatus" class="tab-content col s12  grey lighten-4">
                                        <div class="row">
                                            <div class="col s2">
                                                <img src="./haidara/images/userImage/avatar.PNG" alt="" class="circle responsive-img valign profile-image-post">
                                            </div>
                                            <div class="input-field col s10">
                                                <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                                                <label for="textarea" class="">What's on your mind?</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m6 share-icons">
                                                <a href="#"><i class="material-icons">photo</i></a>
                                                <a href="#"><i class="material-icons">account_circle</i></a>
                                                <a href="#"><i class="material-icons">image</i></a>
                                                <a href="#"><i class="material-icons">location</i></a>
                                            </div>
                                            <div class="col s12 m6 right-align">
                                                <!-- Dropdown Trigger -->
                                                <a class='dropdown-button btn' href='#' data-activates='profliePost'><i class="mdi-action-language"></i> Public</a>

                                                <!-- Dropdown Structure -->
                                                <ul id='profliePost' class='dropdown-content'>
                                                    <li><a href="#!"><i class="mdi-action-language"></i> Public</a></li>
                                                    <li><a href="#!"><i class="mdi-action-face-unlock"></i> Friends</a></li>
                                                    <li><a href="#!"><i class="mdi-action-lock-outline"></i> Only Me</a></li>
                                                </ul>

                                                <a class="waves-effect waves-light btn"><i class="mdi-maps-rate-review left"></i>Post</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- AddPhotos -->
                                    <div id="AddPhotos" class="tab-content col s12  grey lighten-4">
                                        <div class="row">
                                            <div class="col s2">
                                                <img src="./haidara/images/userImage/avatar.PNG" alt="" class="circle responsive-img valign profile-image-post">
                                            </div>
                                            <div class="input-field col s10">
                                                <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                                                <label for="textarea" class="">Share your favorites photos!</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m6 share-icons">
                                                <a href="#"><i class="material-icons">camera</i></a>
                                                <a href="#"><i class="material-icons">account_circle</i></a>
                                                <a href="#"><i class="mdi-hardware-keyboard-alt"></i></a>
                                                <a href="#"><i class="mdi-communication-location-on"></i></a>
                                            </div>
                                            <div class="col s12 m6 right-align">
                                                <!-- Dropdown Trigger -->
                                                <a class='dropdown-button btn' href='#' data-activates='profliePost2'><i class="mdi-action-language"></i> Public</a>

                                                <!-- Dropdown Structure -->
                                                <ul id='profliePost2' class='dropdown-content'>
                                                    <li><a href="#!"><i class="mdi-action-language"></i> Public</a></li>
                                                    <li><a href="#!"><i class="mdi-action-face-unlock"></i> Friends</a></li>
                                                    <li><a href="#!"><i class="mdi-action-lock-outline"></i> Only Me</a></li>
                                                </ul>

                                                <a class="waves-effect waves-light btn"><i class="mdi-maps-rate-review left"></i>Post</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- CreateAlbum -->
                                    <div id="CreateAlbum" class="tab-content col s12  grey lighten-4">
                                        <div class="row">
                                            <div class="col s2">
                                                <img src="./haidara/images/userImage/avatar.png" alt="" class="circle responsive-img valign profile-image-post">
                                            </div>
                                            <div class="input-field col s10">
                                                <textarea id="textarea" row="2" class="materialize-textarea"></textarea>
                                                <label for="textarea" class="">Create album.</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 m6 share-icons">
                                                <a href="#"><i class="material-icons">share</i></a>
                                                <a href="#"><i class="material-icons ">account_circle</i></a>
                                                <a href="#"><i class="mdi-hardware-keyboard-alt">..</i></a>
                                                <a href="#"><i class="mdi-communication-location-on"></i></a>
                                            </div>
                                            <div class="col s12 m6 right-align">
                                                <!-- Dropdown Trigger -->
                                                <a class='dropdown-button btn' href='#' data-activates='profliePost3'><i class="mdi-action-language"></i> Public</a>

                                                <!-- Dropdown Structure -->
                                                <ul id='profliePost3' class='dropdown-content'>
                                                    <li><a href="#!"><i class="mdi-action-language"></i> Public</a></li>
                                                    <li><a href="#!"><i class="mdi-action-face-unlock"></i> Friends</a></li>
                                                    <li><a href="#!"><i class="mdi-action-lock-outline"></i> Only Me</a></li>
                                                </ul>

                                                <a class="waves-effect waves-light btn"><i class="mdi-maps-rate-review left"></i>Post</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ profile-page-wall-share -->


                                    <div id="profile-page-wall-post" class="card">
                                        <div class="card-profile-title">
                                            <div class="row">
                                                <div class="col s1">
                                                    <img src="./haidara/images/userImage/avatar.png" alt="" class="circle responsive-img valign profile-post-uer-image">
                                                </div>
                                                <div class="col s10">
                                                    <p class="grey-text text-darken-4 margin">Abouba Haidara</p>
                                                    <span class="grey-text text-darken-1 ultra-small">Shared publicly  -  26 Jun 2015</span>
                                                </div>
                                                <div class="col s1 right-align">
                                                    <i class="mdi-navigation-expand-more"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>.  I require little more information to use effectively.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-image profile-medium">
                                            <div class="video-container no-controls">
                                                <iframe width="640" height="360" src="https://www.youtube.com/embed/10r9ozshGVE" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                            <span class="card-title">Card Title</span>
                                        </div>
                                        <div class="card-content">
                                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                                        </div>
                                        <div class="card-action row">
                                            <div class="col s4 card-action-share">
                                                <a href="#"><i class="material-icons">photo</i></a>
                                                <a href="#"><i class="material-icons">share</i></a>
                                            </div>

                                            <div class="input-field col s12 margin">
                                                <input id="profile-comments" type="text" class="validate margin">
                                                <label for="profile-comments" class="">Comments</label>
                                            </div>

                                        </div>

                                    </div>
                    </div>
                </div>
            </div>
    </div>
    <!--end container-->
    </section>
    <!-- END CONTENT -->

