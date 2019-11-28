<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 11/03/2017
 * Time: 21:06
 */

class Post {
    public  function __constuct(){

  }
    public  function getsPosts($db){
        return $db->myQuery("
                    SELECT
                          p.id,
                          p.title_post,
                          p.content_post,
                          p.image_post,
                          p.created_post,
                          a.nom_supuser,
                          a.prenom_supuser
                    FROM
                          posts p
                    JOIN
                         supuser a
                     ON
                         p.writer_post = a.email_supuser
                     WHERE
                         posted_post='1'
                    ORDER  BY p.created_post DESC
                    LIMIT 0,6
           ")->fetchAll();
    }
    public  function getAll($db){
        return $db->myQuery("
                    SELECT
                          p.id,
                          p.title_post,
                          p.content_post,
                          p.image_post,
                          p.created_post,
                          p.posted_post
                    FROM
                          posts p
                    ORDER  BY p.created_post DESC
           ")->fetchAll();
    }
    public  function getAllByCategorie($db,$id){
        return $db->myQuery("
                    SELECT
                          p.id,
                          p.title_post,
                          p.content_post,
                          p.image_post,
                          p.created_post,
                          p.posted_post,
                          t.id,
                          t.nom
                    FROM
                          posts p
                    JOIN type_post t
                    ON p.id_type_post = t.id
                    WHERE t.id =?
                    ORDER  BY p.created_post DESC
           ",[$id])->fetchAll();
    }
    public  function getPostById($ref, $db){
        return $db->myQuery("SELECT
                        *
                    FROM
                          posts p
                    JOIN
                         supuser a
                     ON
                         p.writer_post = a.email_supuser
         WHERE  p.id =:id",array('id'=>$ref))->fetch();
    }
    public  function  getbyRandom($db)
    {
        return $db->myQuery("SELECT * FROM posts  ORDER BY RAND() LIMIT 0,3")->fetchAll();
    }
    private  function addWithImage($db, $data = [], $tof)
    {
        if(empty($data) && $tof == true)
        {
            return false ;
        }
        return $db->myQuery("
               INSERT INTO posts
               SET title_post =:title_post, content_post=:content_post, writer_post=:writer_post, created_post=NOW(), image_post=:image_post, posted_post=:posted_post
               ,corrige_post=:corrige_post, id_classe=:id_classe,id_type_post=:id_type_post",
            $data);
    }
    private  function addWithOutImage($db, $data = [])
    {
        if(empty($data))
        {
            return false ;
        }
        return $db->myQuery("
                INSERT INTO posts
                SET title_post =:title_post, content_post=:content_post, writer_post=:writer_post, created_post=NOW(),
                posted_post =:posted_post,corrige_post=:corrige_post, id_classe=:id_classe,id_type_post=:id_type_post",
               $data);
    }
    public function  insert($db, $data =[])
    {
        $num =  func_num_args();
        $args =  func_get_args();
        switch($num)
        {
            case 3 :
                $this->addWithImage($args[0], $args[1],$args[2]);
                break;
            case 2 :
               $this->addWithOutImage($args[0], $args[1]);
                break;
        }
        return false;
    }
    public  function  update($db, $data = [])
    {
        if(empty($data))
        {
            return false;
        }
      return $db->myQuery("UPDATE posts set title_post=:title, content_post =:content, created_post = NOW(), posted_post =:posted_post WHERE id=:ref",$data);

    }
    public  function getTitle($db){
        return $db->myQuery("SELECT id, title_post FROM posts limit 0,3")->fetchAll();
    }
    public  function  updateField($db, $data = [],$field)
    {
        if(empty($data))
        {
            return false;
        }
        return $db->myQuery("UPDATE posts set  $field =:corrige_post WHERE id=:ref",$data);

    }
    public function getCatById($db,$id){
        return $db->myQuery("SELECT * FROM type_post WHERE  id =:id",array('id'=>$id))->fetch();
    }
}