<?php
class Session {
    private  $sessions = [] ;
    public  function __construct(){session_start();}

    public  function setFlash($key,$value)
    {
     $_SESSION['flash'][$key] = $value;
    }

    public  function  getFlashes(){
      $flash = $_SESSION['flash'];
        unset ($_SESSION['flash']) ;
        return $flash ;
    }

    public  function hasFlashes()
    {
      return  isset($_SESSION['flash']);
    }



    public function write($key, $value){
        $_SESSION[$key] = $value;
    }


    public function read($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function isDefine($key){
        return isset($_SESSION[$key]);
    }
    public function delete($key){
        unset($_SESSION[$key]);
    }





function _getIpForSecure (){

   if (isset ($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']){
      $IP_ADDR = $_SERVER['HTTP_X_FORWARDED_FOR'];
   }else if (isset ($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP']){
      $IP_ADDR =  $_SERVER['HTTP_CLIENT_IP'];
   }else{
      $IP_ADDR = $_SERVER['REMOTE_ADDR'];
   }

   // cherche IP serveur et la traite
   $FIRE_IP_ADDR = $_SERVER['REMOTE_ADDR'];
   $ip_resolved = gethostbyaddr($FIRE_IP_ADDR);
   // construit la chaine d'identification serveur IP
   $FIRE_IP_LITT = ($FIRE_IP_ADDR != $ip_resolved && $ip_resolved) ? $FIRE_IP_ADDR." - ". $ip_resolved : $FIRE_IP_ADDR;
   // construit la chaine d'identification client IP
   $toReturn = ($IP_ADDR != $FIRE_IP_ADDR) ? "$IP_ADDR | $FIRE_IP_LITT" : $FIRE_IP_LITT;
   return $toReturn;

}

function getUserConnected () {

   $secure_with_ip_passed = 0;

   if(!isset($_SESSION['secure_with_ip_name'])) {
      $_SESSION['secure_with_ip_name'] = $this->_getIpForSecure();
   }
   else {
      $secure_with_ip_passed = ($_SESSION['secure_with_ip_name'] == $this->_getIpForSecure ());
   }
   return $secure_with_ip_passed;

}

    public  function  _read($db, $id)
    {
        $id = htmlentities($id);
        $d = $db->myQuery("SELECT data from sessions WHERE $id=?", [$id])->fetch() ;
         if($d)
             return $d->data;
         else
             return '';
    }


    public function _open(){

    }

    public function _write($id, $data, $db)
    {
        $access = time();
        $id = htmlentities($id);
        $access = htmlentities($access);
        $data = htmlentities($data);
        return $db->myQuery("REPLACE INTO sessions VALUES(?,?,?)",[$id, $access, $data]);
    }


    public  function  _destroy($db, $id)
    {
        $id = htmlentities($id);
        return $db->myQuery("DELETE from sessions WHERE $id=?", [$id]) ;
    }

   public function _clean($max, $db)
    {
        $old = time() - $max;
        $old = htmlentities($old);
        $sql = "
          DELETE
          FROM   sessions
          WHERE  acess < ? ";

        return $db->myQuery($sql, [$old]);
    }


    public function mySessionHandler(){
        session_set_save_handler(
            '_open',
            '_close',
            '_read',
            '_write',
            '_destroy',
            '_clean');
    }


    public  function  regeneSessionAfterFiveMinute(){
        // Make sure we have a canary set
        if (!isset($_SESSION['canary'])) {
            session_regenerate_id(true);
            $_SESSION['canary'] = time();
        }
// Regenerate session ID every five minutes:
        if ($_SESSION['canary'] < time() - 300) {
            session_regenerate_id(true);
            $_SESSION['canary'] = time();
        }
    }

    public  function handlerSessionMe(){
        // Make sure we have a canary set
        if (!isset($_SESSION['canary']))
        {
            session_regenerate_id(true);
            $_SESSION['canary'] = [
                'birth' => time(),
                'IP' => $_SERVER['REMOTE_ADDR']
            ];
        }
        if ($_SESSION['canary']['IP'] !== $_SERVER['REMOTE_ADDR']) {
            session_regenerate_id(true);
            // Delete everything:
            foreach (array_keys($_SESSION) as $key) {
                unset($_SESSION[$key]);
            }
            $_SESSION['canary'] = [
                'birth' => time(),
                'IP' => $_SERVER['REMOTE_ADDR']
            ];
                }
        // Regenerate session ID every five minutes:
        if ($_SESSION['canary']['birth'] < time() - 300) {
            session_regenerate_id(true);
            $_SESSION['canary']['birth'] = time();
        }
    }

}
