<?php require_once 'headPages.php'; unset($_SESSION['admin']) ;?>
<?=MENU?>
<div class="container">
<div class="row">
    <h2>Tableau de Board</h2>
    <?php
     $tableaux = [
                     'Publication'           =>'posts',
                     'Commentaires'          =>'commentaire',
                     'Administrateurs'       =>'supuser',
                     'Classes'               =>'classe',
                     'Type Posts'            =>'type_post',
                     'Reponse Aux Questions' =>'reponse_questions',
                     'Forum'                 =>'forum_posts',
                     'Fil Actualité '        =>'thread',
                     'Channel'               =>'reponse_questions',
                     'Utilisateurs (Etudiants)'  =>'mesusers',
                      'Votes'  =>'votes'
                 ];
    $colors =
        [
            'posts'               => 'orange',
            'commentaire'         => 'green',
            'supuser'             => 'red',
            'classe'              => 'blue',
            'type_post'           => 'grey',
            'reponse_questions'   => 'brown',
            'forum_posts'           => 'teal',
            'thread'              => 'lime',
            'channel'             => 'yellow',
            'mesusers'            => 'indigo',
            'votes'               => 'purple'

        ];
    foreach($tableaux as $table_name => $table_from_db)
    {
        ?>
            <div class="col l4 m6 s12">
                <div class="card">
                    <div class="card-content hoverable <?=App::getOp()->addColor($table_from_db, $colors);?> white-text">
                        <span class="card-title"> <?=$table_name ?></span>
                        <?php $nb = App::getOp()->inTable(App::getDatabase(), $table_from_db);?>
                        <h4><?= $nb->id; ?></h4>
                    </div>
                </div>
            </div>
     <?php
    }
    ?>
    <br>
    <h1>Operation sur les articles</h1>
<table>
    <thead>
        <tr>
            <th>Article</th>
            <th>Commentaire</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php

      $tab_cmt = App::getOp()->getComments(App::getDatabase());
      if(!empty($tab_cmt))
      {
          foreach ($tab_cmt as $comment) {
              ?>
              <tr id="commentaire_<?= $comment->id; ?>">
                  <td><?= $comment->title_post; ?></td>
                  <td><?= substr($comment->content, 0, 100); ?>...</td>
                  <td>
                      <a href="#" id="<?= $comment->id; ?>"
                         class="btn-floating  btn-small waves-light green waves-effect see_comment ">
                          <i class="material-icons">done</i>
                      </a>
                      <a href="#" id="<?= $comment->id; ?>"
                         class="btn-floating  btn-small waves-light red waves-effect delete_comment ">
                          <i class="material-icons"> delete</i>
                      </a>
                      <a href="#comment_<?= $comment->id; ?>"
                         class="btn-floating  btn-small waves-light orange waves-effect modal-trigger ">
                          <i class="material-icons">more_vert</i>
                      </a>

                      <div class="modal" id="comment_<?= $comment->id; ?>">
                          <div class="modal-content ">
                              <h4><?= $comment->title_post; ?></h4>

                              <p>Commenté par :
                                  <strong><?= $comment->username . '(' . $comment->email . ')</strong><br>Le : <em>' . date("d:m:Y à H:i:s", strtotime($comment->date_comment)) . '</em>'; ?>
                              </p>

                              <hr>
                              <p> <?= nl2br($comment->content); ?></p>
                          </div>
                          <div class="modal-footer">
                              <a href="#!" id="comment<?= $comment->id; ?>"
                                 class="modal-action modal-close waves-effect waves-red delete_comment waves-green btn-flat"><i
                                      class="material-icons">delete</i> </a>
                              <a href="#!" id="comment<?= $comment->id; ?>"
                                 class="modal-action modal-close waves-effect waves-green see_comment waves-green btn-flat"><i
                                      class="material-icons">done</i> </a>
                          </div>
                      </div>
                  </td>
              </tr>
          <?php
          }
      }else{
          ?>
           <tr>
               <td></td>
               <td><center><p>Aucun Commentaire à valider</p></center></td>
           </tr>
      <?php
      }?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
    <?php var_dump(App::getInstance()->read('admin'));?>
</div>
</div>