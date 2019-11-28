<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 27/03/2017
 * Time: 19:25
 */

class Operation {

    public  function __construct(){
    }

    public function inTable($db,$table_name)
    {
       return $db->myQuery("SELECT COUNT(*) as id FROM  $table_name ")->fetch();
    }

    public  function  addColor($table, $colors = []){
        if(isset($colors[$table])){
            return $colors[$table];
        }else{
            return 'blue';
        }
    }

    public function getComments($db){
        return $db->myQuery("
                            SELECT
                            commentaire.id,
                            commentaire.username,
                            commentaire.email,
                            commentaire.date_comment,
                            commentaire.ref_id,
                            commentaire.content,
                            posts.title_post
                            FROM
                            commentaire
                            JOIN posts
                            ON commentaire.ref_id = posts.id
                            WHERE  commentaire.seen = '0'
                            ORDER BY commentaire.date_comment

                            ")->fetchAll();
    }

    public  function  searchByContent($kw, $db)
    {
        $where = "";
        $kw = preg_split('/[\s\-]/',$kw);
        $count_kw= count($kw);
        foreach($kw as $key =>$value)
        {
            $where .=" content_post LIKE '%$value%'";

            if($key !=($count_kw - 1 )){
                $where .=" AND";
            }
        }

        return $db->myQuery("SELECT * FROM posts WHERE $where")->fetchAll();
    }

    public  function  searchByTitle($kw, $db)
    {
        $where = "";
        $kw = preg_split('/[\s\-]/',$kw);
        $count_kw= count($kw);
        foreach($kw as $key =>$value)
        {
            $where .=" title_post LIKE '%$value%'";

            if($key !=($count_kw - 1 )){
                $where .=" OR";
            }
        }

        return $db->myQuery("SELECT * FROM posts WHERE $where")->fetchAll();
    }

    public function searchAll($kw, $db){
        $words =  str_replace('#[^\w\d?!]#i','',$kw);
        $q = "
              SELECT * from posts WHERE MATCH (title_post, content_post) AGAINST('$words')
              UNION
              SELECT * FROM supuser WHERE MATCH (prenom_supuser, nom_supuser) AGAINST('$words')
              ";
        return $db->myQuery($q)->fetchAll();

    }

    public function getUserIpAddress( )
    {
        if( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
            return
            $_SERVER['HTTP_X_FORWARDED_FOR' ] ;
        else return $_SERVER[ 'REMOTE_ADDR' ] ;
    }

    public function getAllByFilter($db, $table){

        $req  = "SELECT * FROM $table";
            return $db->myQuery($req)->fetchAll();
    }



    public function getByFilter($db,$id){

        $req  = "SELECT * FROM posts
              JOIN classe ON posts.id_classe = classe.id
              JOIN type_post ON posts.id_type_post = type_post.id
              WHERE posts.id_classe=? ";
        return $db->myQuery($req,[$id])->fetchAll();
    }


}


