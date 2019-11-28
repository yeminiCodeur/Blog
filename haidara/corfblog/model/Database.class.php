<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 00:16
 */

class Database {

    private  $dbname ;
    private  $hostDB ;
    private  $pwdBD ;
    private  $userDB;

    /**
     * @return mixed
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param mixed $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * @return mixed
     */
    public function getPwdBD()
    {
        return $this->pwdBD;
    }

    /**
     * @param mixed $pwdBD
     */
    public function setPwdBD($pwdBD)
    {
        $this->pwdBD = $pwdBD;
    }

    /**
     * @return string
     */
    public function getHostDB()
    {
        return $this->hostDB;
    }

    /**
     * @param string $hostDB
     */
    public function setHostDB($hostDB)
    {
        $this->hostDB = $hostDB;
    }

    /**
     * @return mixed
     */
    public function getUserDB()
    {
        return $this->userDB;
    }

    /**
     * @param mixed $userDB
     */
    public function setUserDB($userDB)
    {
        $this->userDB = $userDB;
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param PDO $pdo
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }

    private $pdo ;

    public  function  __construct($hostdb ="localhost", $dbname,  $userdb, $pwdb )
    {
        $this->hostDB = $hostdb ;
        $this->dbname = $dbname ;
        $this->userDB = $userdb ;
        $this->pwdBD  = $pwdb ;
        try{
            $this->pdo = new PDO("mysql:host=".$this->hostDB.";dbname=".$this->dbname, $this->userDB, $this->pwdBD);
            //$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,true);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo->exec("SET NAMES 'UTF8'");

        }catch (PDOException $e)
        {
            die("Erreur survenue :" . $e->getMessage()) ;
        }
    }

    /**
     * @param $sql
     * @param bool|array $params
     * @return bool|array
     */
    public  function  myQuery($sql, $params = false)
    {
        try
        {
            if($params == true)
            {
                $req = $this->pdo->prepare($sql);
                $req->execute($params) ;
                return $req ;
            }else{
                return $this->pdo->query($sql);
            }
        }
        catch(Exception $ex)
        {
            die("see error :" . $ex->getMessage()  . $ex->getCode());
        }

    }


    public  function  getLastInsert()
    {
        return $this->pdo->lastInsertId();
    }

    public  function  Myupdate($query)
    {
        return $this->pdo->exec($query);
    }



}