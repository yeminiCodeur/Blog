<?php require_once '/../view/headPages.php';?>
<?=MENU?>
<div class="container">
 <h4>Listing de Tout le Membre Inscrit</h4>
<div class="row">
    <div class="col m6 s12">
        <form id="searchForm" action="search" method="get">
                <div class="input-field col s8">
                    <i class="material-icons prefix">mode_edit</i>
                    <input id="icon_prefix" type="text" class="validate" name="q"  onkeypress="this" />
                    <label for="icon_prefix">Taper Votre Recherche Par Mot Clé</label>
                </div>
        </form>
        <table>
            <thead>
            <tr>
                <th>Statut</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $help = App::getHelperMe();
            foreach(App::getAuth()->get_users(App::getDatabase(),'mesusers') as $v) {
                ?>
                <tr>
                    <td><?= ($v->user_statut == 0) ? 'banni' : 'active' ;?></td>
                    <td><?= $help->getDecoded($v->username)   ;?></td>
                    <td><?= $help->getDecoded($v->email)  ;?></td>
                    <td>
                        <a href="#" id="<?= $v->id; ?>"
                              class="btn-floating  btn-small waves-light green waves-effect see_comment " title="Modifier">
                            <i class="material-icons">edit</i>
                        </a>
                        <a href="#" id="<?= $v->id; ?>"
                           class="btn-floating  btn-small waves-light red waves-effect delete_comment " title="Supprimer">
                            <i class="material-icons"> delete</i>
                        </a>
                        <a href="#user_<?= $v->id; ?>"
                           class="btn-floating  btn-small waves-light orange waves-effect modal-trigger " title="Voir Detail">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <div class="modal" id="user_<?= $v->id; ?>">
                            <div class="modal-content ">
                                <h4><?= $v->username; ?></h4>
                                <p> <?= $v->email; ?></p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" id="comment<?= $v->id; ?>"
                                   class="modal-action modal-close waves-effect waves-red delete_comment waves-green btn-flat"><i
                                        class="material-icons">delete</i> </a>
                                <a href="#!" id="user<?= $v->id; ?>"
                                   class="modal-action modal-close waves-effect waves-green see_comment waves-green btn-flat"><i
                                        class="material-icons">done</i> </a>
                            </div>
                        </div>
                    </td>
               </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<div class="container">
    <div class="row">
        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>
</div>