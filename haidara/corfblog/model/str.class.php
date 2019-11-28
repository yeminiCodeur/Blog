<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 24/03/2017
 * Time: 23:18
 */

class Str {

     static  function  random($length){
      $alphabet = "abcdefghijklmnpqorstuvxyz0123456789#.ABCDEFGHIJKLMNPOQRSTUVWXYZ";
         return substr(str_shuffle(str_repeat($alphabet,$length)),0,$length);
    }

}