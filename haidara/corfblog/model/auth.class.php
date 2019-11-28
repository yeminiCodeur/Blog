<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 21/11/2016
 * Time: 00:16
 */

class Auth {

    private $username ;
    private $prenom ;
    private  $email ;
    private  $passwd ;

   private $options = [
       'restriction_msg' => "Vous n'avez pas le droit d'accéder à cette page"
   ] ;

    public function __construct($options = []){
        $this->options=array_merge($this->options,$options);
    }

    /**

     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * @param mixed $passwd
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    /********************* Operation ************************/

    public  function   login($db, $login, $password, $table, $remember = 0, $session = null)
    {
        $user = $db->myQuery("SELECT * FROM $table WHERE (username=:username or email=:username) AND confirm_at IS NOT NULL ", ["username"=>base64_encode($login)])->fetch();

        if(password_verify($password, $user->password))
        {
            $this->connect($user,$session);
            if($remember == 1){
               $token_remember =  Str::random(60);
                $db->myQuery('UPDATE mesusers SET remember_token=? WHERE id=?',[$token_remember, $user->id]);
            }
            return $user ;
        }else
        {
            return null;
        }

    }



    private  function  getEncoded($field)
    {
     return base64_encode(htmlentities(trim($field)));
    }




    private function   sendMail($email, $token)
    {
        $message = "
                     <html lang='en' style='font-family: sans-serif'>
                            <head>
                                <meta charset='UTF-8'>
                            </head>
                            <body>
                              <p> Confirmation de votre inscription..</p>
                              <p>Votre Identifiant et Code Unique sur <a href='http://localhost:82/blog/haidara/newModo'>cliquez ici</a> </p>

                            <p>Identifiant :  $email</p>
                            <p>Mot de passe:  $token</p>
                            <p>Apres insertion de ces informations , veuillez une nouvelles mot passe de passe !</p>
                            </body>
                    </html>
                   ";
        $subject = "Modorateur sur le site";
        $headers = "MIME-Version: 1.0\r\n";
        $headers.= "Content-type:  text/html charset=UTF-8\r\n";
        $headers.= "From: no-reply@abouba.sn" . "\r\n". "Reply-To: contact@abouba.sn" . "\r\n". "X-Mailer: PHP/". phpversion();
       $email = str_ireplace(array("\r", "\n", "%0a", "%0d"), '', stripslashes($email));
        mail($email, $subject, $message, $headers);
    }



    public  function   registerUser($field)
    {
        $num =  func_num_args();
        $args =  func_get_args();

        if($num >=5)
        {
            switch($num)
            {
                case 5:
                    $this->registerMember($args[0], $args[1], $args[2], $args[3], $args[4]) ;
                    break;
                case 6:
                    $this->registerAdmin($args[0], $args[1], $args[2], $args[3], $args[4],$args[5]) ;
                    break;
            }
        }
       else
           return;
    }


    private  function  registerMember($db, $table, $username, $email,  $password)
    {
       $password = $this->getPasswordHash($password);
        $token = Str::random(60);
      $db->myQuery(
                "INSERT INTO $table SET username =?, password =?, email=?, confirmation_token =?",
                [
                    $username,
                    $password,
                    $email,
                    $token
                ]
            );
    }


    private  function  registerAdmin($db, $table, $username, $prenom, $email, $role)
    {
        $token = Str::random(60);
            $user = $db->myQuery(
                "INSERT INTO $table SET nom_supuser=?, prenom_supuser = ?, email_supuser =?, role_supuser =? , token_supuser =?",
                [
                    $this->getEncoded($username),
                    $this->getEncoded($prenom),
                    $this->getEncoded($email),
                    $this->getEncoded($role),
                    $token
                ]
            );

        $user_id = $db->getLastInsert();
         $this->sendMail($email, $token);
    }


    public function    restrict($session)
    {
        if(!$session->read('user')){
            $session->setFlash('danger', $this->options['restriction_msg']);
            header('location:login');
            exit();
        }
    }

    private function   getPasswordHash($password)
    {
        return password_hash(htmlentities(trim(strval($password))), CRYPT_BLOWFISH);
    }


    public  function   get_users($db, $table){
        return $db->myQuery("SELECT * FROM $table")->fetchAll();
    }


    public function    confirm($user_id,$token,$db,$session){
       $user =  $db->myQuery('SELECT * FROM mesusers WHERE id=?',[$user_id])->fetch();
        if($user && $user->confirmation_token==$token){
            $db->myQuery('UPDATE mesusers SET confirmation_token=NULL , confirm_at=NOW() WHERE id=?',[$user_id]);
            $session->write('user', $user);
            return true;
        }else
            return false;
    }


    //check if user is connect
    public function user($session)
    {
        if(!$session->read('user')){
            return false;
        }else{
            return $session->read('user');
        }
    }


    public function connect($user, $session){
        $session->write('user',$user);
    }


    public function connectFromCookie($session, $cookie){
       $user= $this->user($session);
     if($user){
         $this->connect($user, $session);
         $cookie->create();
     }
    }
}