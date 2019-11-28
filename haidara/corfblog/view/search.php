<?php
require_once 'headPages.php';
?>
<div class="container">
    <div class="row">
        <div class="card-panel">
            <form id="searchForm" action="search" method="get">
                <fieldset>
                    <div class="input-field col s8">
                        <i class="material-icons prefix">mode_edit</i>
                        <input id="s" type="text" class="validate" name="q" />
                        <label for="icon_prefix">Taper Votre Recherche Ici.</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-floating btn-small right" value="search"  >
                        <i class="material-icons"> search</i></button>
                </fieldset>
            </form>
      </div>

    </div>
    <div id="resultsDiv">
    <?php

        if(isset($_GET['q']) && $_GET['submit'] == "search")
        {
            $q = trim(htmlentities(strip_tags(strtolower($_GET['q']))));
            if ($q !="")
            {
                if (strlen($q) == 1 or strlen($q) == 2)
                {
                    echo '<p>Vous devez taper au minimun 3 <strong> Carateres</strong></p>';
                }else if(strlen($q) >= 3)
                {
                    $search = App::getOp()->searchByContent($q, App::getDatabase()) ;

                    if($search)
                    {
                        ?>
                        <p>Resultat sugger pour : <strong><?=$_GET['q']?></strong></p>
                        <?php
                        foreach ($search as $k) {
                            ?>
                            <div class="row">
                                <div class="col s12 m8 l4">
                                    <div class="card small hoverable">
                                        <div class="card-content">
                                            <div class="card-content">
                                                <a href="post&ref=<?=$k->id .'998#8!9'.md5($k->id) . '/' .time() ?>">
                                                    <?= '<h4> '. $k->title_post . '</h4><br>'?>
                                                </a>
                                                <a href="post&ref=<?=$k->id .'998#8!9'.md5($k->id) . '/' .time() ?>">
                                                    <?=substr(nl2br($k->content_post),0, 80);?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }else
                    {
                        $search = App::getOp()->searchByTitle($q, App::getDatabase()) ;
                        if($search)
                        {
                            ?>
                            <p>Resultat sugger pour : <strong><?=$_GET['q']?></strong></p>
                            <?php
                            foreach ($search as $k) {
                                ?>
                                <div class="row">
                                    <div class="col s12 m8 l4">
                                        <div class="card small hoverable">
                                            <div class="card-content">
                                                <div class="card-content">
                                                    <a href="post&ref=<?=$k->id .'998#8!9'.md5($k->id) . '/' .time() ?>">
                                                        <?= '<h4> '. $k->title_post . '</h4><br>'?>
                                                    </a>
                                                    <a href="post&ref=<?=$k->id.'998#8!9'. md5($k->id) ?>">
                                                        <?=substr(nl2br($k->content_post),0, 80);?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }else
                        {
                            echo "Aucun resultat trouvé à votre recherche : <strong>". $_GET['q']. "</strong>";
                        }
                    }
                }
            }
    }

 ?>
</div>
</div>
