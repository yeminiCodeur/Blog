
<div class="navbar-fixed">
   <nav class="fixed indigo" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="hougo" class="brand-logo"><img style="border-radius: 50px;" src="./haidara/images/background/logo.jpg" width="60" height="65"><b style="margin-left:10px;position: absolute;">Tiarafaba</b></a>
        <ul class="right hide-on-med-and-down">
            <li class="left <?=$page=='hougo' ? 'active':''?>"><a href="hougo"><i class="material-icons left">home</i>Acceuil</a></li>
            <li class="<?=$page=='sujet' ? 'active':''?>"><a href='sujet'><i class="material-icons left">dehaze</i>Sujet</a></li>
            <li class="<?=$page=='foromo' ? 'active':''?>"><a href="foromo"><i class="material-icons left">forum</i>Forum</a></li>
            <li class="<?=$page=='aygaContote' ? 'active':''?>"><a  href="aygaAyContote" title="S'inscrire"><i class=" material-icons left">person_add</i>S'inscrire</a></li>
            <li class="<?=$page=='aygaConnectee' ? 'active':''?>"><a href="aygaConnectee" title="Se Connecter"><i class=" material-icons left">account_circle</i>Sign in</a></li>
            <li class="<?=$page=='search' ? 'active':''?>"><a  href="search" title="Se Connecter"><i class=" material-icons left">search</i></a></li>
        </ul>
        <ul id="nav-mobile" class="side-nav">
            <li class="<?=$page=='hougo' ? 'active':''?>"><a href="home">Acceuil</a></li>
            <li class="<?=$page=='sujet' ? 'active':''?>"><a href="sujet">Sujet</a></li>
            <li class="<?=$page=='foromo' ? 'active':''?>"><a href="forum">Forum</a></li>
            <li class="<?=$page=='register' ? 'active':''?>"><a href="register"><button>S'inscrire</button></a></li>
            <li class="<?=$page=='login' ? 'active':''?>"><a href="login"><button>Se Connecter</button></a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
</div>



