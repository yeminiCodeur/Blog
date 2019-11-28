<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 30/11/2016
 * Time: 21:57
 */

class Comments {

    public  function  __constuct(){

    }
    /**
     * permet d'envoyer tout les commmentaires liés a un contenu
     * @param $db
     * @param $ref
     * @param $ref_id
     * @return mixed
     */
    public  function  getAll($db, $ref, $ref_id)
    {
        $sql = "SELECT * FROM commentaire WHERE ref=:ref AND ref_id=:ref_id  ORDER  BY date_comment DESC " ;

        return $db->myQuery($sql, ['ref'=>$ref, 'ref_id'=>$ref_id])->fetchAll();
    }
 public  function countAll($db){
     return $db->myQuery("SELECT COUNT(*) as id FROM commentaire ")->fetch();
 }

    /**
     * permet d'envoyer le 10 dernier commentaires
     * @param $db
     * @param $ref
     * @param $ref_id
     * @return mixed
     */

    public  function  getLastComment($db, $ref, $ref_id)
    {
        $sql = "SELECT * FROM commentaire WHERE ref=:ref AND ref_id=:ref_id  ORDER  BY date_comment DESC  LIMIT 0, 10" ;

        $comments = $db->myQuery($sql, ['ref'=>$ref, 'ref_id'=>$ref_id])->fetchAll();

        $replies = []  ;

        foreach($comments as $k  => $comment)
        {
            /**
             * si le comment a un parent alors dans ce cas on supprime le commentaire
             */
            if($comment->parent_id)
            {
                $replies[$comment->parent_id][]   = $comment ; //on increment de ce commentaire
                unset($comments[$k] ); //on supprime le commentaire
            }
        }


        foreach($comments as $k  => $comment)
        {
            /**
             * on verifie à chaque fois qu'on detecte qu'un commentaire à un id dans le replies on rajoute un nouvelle index
             */

            if(isset($replies[$comment->id])) //ça veut dire que ce commentaiie une reponse
            {
                $comments[$k]->replies  = $replies[$comment->id] ;
            }
            else
            {
                /**
                 * sinon le commentaire n'as pas de reponse dans ce cas on lui injecte cette propiete replies
                 */
                $comments[$k]->replies = []  ;
            }
        }

        /**
         * on utilise la boucle foreach pour peubler le tableau contenant les differentes reponses
         *
         */
        return $comments ;
    }


    /**
     *
     * permet de sauvegarde d'un commentaire
     * @param $db
     * @param $ref
     * @param $ref_id
     * @return mixed
     */
    public  function  saveComment($db,$u, $e,$c, $ref, $ref_id)
    {
        $sql  = "INSERT INTO commentaire(id, username, email,content, ref, ref_id, date_comment) VALUES(null, :username,:email, :content, :ref, :ref_id, :date_created)";
        return $db->myQuery($sql,
                         [
                             'username'      =>        $u,
                             'email'         =>        $e,
                             'content'       =>        $c,
                             'ref'           =>        $ref,
                             'ref_id'        =>        $ref_id,
                             'date_created'  =>       date("Y-m-d-H:i:s")
                         ]);
    }


    public function see_comment($db, $id){
        return $db->myQuery("UPDATE commentaire SET seen='1' WHERE id=?",[$id]);
    }
    public function delete_comment($db, $id){
        return $db->myQuery("DELETE FROM commentaire WHERE id=?",[$id]);
    }

}