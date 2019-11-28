<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 01/04/2017
 * Time: 16:51
 */

class Pagination {

    private  $db ;

    private  $current ;   // la page courante selectionner
    private  $nb_page ;  // le nombre de page a créer
    private  $PerPage  = 3; // nombre d'article par page
    private $total ;    // le nombre total d'article dans la base
    private $first_page; // la premier page
    public function __construct($db){
        $this->db = $db ;
    }

    /**
     * @param array $url
     * @return mixed
     */
    public function getPaginate($url = [], $idcateg = 0)
    {

        if($idcateg !=0)
        {
            /* coompter le nombre de rengistrement total  */

            $t =  $this->db->myQuery("SELECT count(*) as TotalRecord FROM posts p JOIN type_post t ON p.id_type_post = t.id WHERE p.id_type_post =?",[$idcateg])->fetch();

            $this->total = $t->TotalRecord;

            /*On calcul la partie entier */

            $this->nb_page = ceil($this->total / $this->PerPage);

            if(isset($url[0]) && !empty($url)  && ctype_digit($url[0]) == 1)
            {
                if($url[0]  > $this->nb_page){
                    $this->current = $this->nb_page ;
                }else
                {
                    $this->current = $url[0] ;
                }
            }
            else {
                $this->current = 1 ;
            }
            $this->first_page = ($this->current - 1 ) * $this->PerPage ;
            return $this->db->myQuery("SELECT * From posts WHERE id_type_post =? ORDER BY  id  ASC LIMIT  $this->first_page,$this->PerPage",[$idcateg])->fetchAll();


        }else {
            /* coompter le nombre de rengistrement total  */

            $t =  $this->db->myQuery("SELECT count(*) as TotalRecord FROM posts ")->fetch();

            $this->total = $t->TotalRecord;

            /*On calcul la partie entier */

            $this->nb_page = ceil($this->total / $this->PerPage);

            if(isset($url[0]) && !empty($url)  && ctype_digit($url[0]) == 1)
            {
                if($url[0]  > $this->nb_page){
                    $this->current = $this->nb_page ;
                }else
                {
                    $this->current = $url[0] ;
                }
            }
            else {
                $this->current = 1 ;
            }
            $this->first_page = ($this->current - 1 ) * $this->PerPage ;
            return $this->db->myQuery("SELECT * From posts ORDER BY  id  ASC LIMIT  $this->first_page,$this->PerPage")->fetchAll();

        }

    }


    /**
     * @return mixed
     */
    public function getNbPage()
    {
        return $this->nb_page;
    }

    /**
     * @param mixed $nb_page
     */
    public function setNbPage($nb_page)
    {
        $this->nb_page = $nb_page;
    }

    /**
     * @return mixed
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param mixed $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->PerPage;
    }

    /**
     * @param int $PerPage
     */
    public function setPerPage($PerPage)
    {
        $this->PerPage = $PerPage;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getFirstPage()
    {
        return $this->first_page;
    }

    /**
     * @param mixed $first_page
     */
    public function setFirstPage($first_page)
    {
        $this->first_page = $first_page;
    }





}