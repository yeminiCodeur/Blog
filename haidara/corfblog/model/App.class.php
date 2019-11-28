<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 00:16
 */



class App{

    private static $db = null;
    private static $validator = null;
    private  static  $auth = null;
    private static  $post  =  null;
    private  static  $comment =  null;
    private  static  $operation = null;
    private  static $help = null;
    private  static $session = null;
    private static $pagination;

    public  function  __wakeup()
    {
        trigger_error("Cannot deserialize instance of class", E_USER_ERROR) ;
    }
    private  function  __clone()
    {
        trigger_error("Cannot clone instance of class ",E_USER_ERROR) ;
    }
    private function __construct(){}

     static function getDatabase()
    {
        if(!self::$db){
            self::$db = new Database("localhost",'blog','root','');
        }
        return self::$db;
    }

    static  function  redirect($page){
        header("location:" . $page  . "");
        exit;
    }

     static function getOp()
    {
        if(!self::$operation){
            self::$operation = new Operation();
        }
        return self::$operation;
    }
    static function getInstance()
    {
        if(!self::$session){
            self::$session = new Session();
        }
        return self::$session;
    }

    static  function  getAuth()
    {
        if(!self::$auth)
        {
            self::$auth = new Auth(['restriction_msg' => 'Veuillez nous execuser']);
        }
        return  self::$auth ;
    }

      static  function  getValidator()
    {
        if(!self::$validator)
        {
            self::$validator = new Validator();
        }
        return self::$validator;
    }

    static  function  getHelperMe()
    {
        if(!self::$help)
        {
            self::$help = new HelperMe();
        }
        return self::$help;
    }

     static  function  getPost()
    {
        if(!self::$post)
        {
            self::$post = new Post();
        }
        return  self::$post;
    }

    static  function  getComment()
    {
        if(!self::$comment)
        {
            self::$comment = new Comments();
        }
        return  self::$comment;
    }

    static  function  Pagination($db)
    {
        if(!self::$pagination)
        {
            self::$pagination = new Pagination($db);
        }
        return  self::$pagination;
    }
}