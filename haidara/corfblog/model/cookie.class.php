<?php
class Cookie
{
protected $name;
protected $value;
protected $domain;
protected $expire;
protected $path;
protected $secure;
protected $httpOnly;

    public function __construct($name, $value = null, $expire = 0, $path = '/', $domain = null, $secure = false, $httpOnly = true)
    {

    if (preg_match("/[=,; \t\r\n\013\014]/", $name)) {
    throw new \InvalidArgumentException(sprintf('The cookie name "%s" contains invalid characters.', $name));
    }

    if (empty($name)) {
    throw new \InvalidArgumentException('The cookie name cannot be empty.');
    }


    if ($expire instanceof \DateTime) {
    $expire = $expire->format('U');
    } elseif (!is_numeric($expire)) {
    $expire = strtotime($expire);

    if (false === $expire || -1 === $expire) {
    throw new \InvalidArgumentException('The cookie expiration time is not valid.');
    }
    }

    $this->name = $name;
    $this->value = $value;
    $this->domain = $domain;
    $this->expire = $expire;
    $this->path = empty($path) ? '/' : $path;
    $this->secure = (Boolean) $secure;
    $this->httpOnly = (Boolean) $httpOnly;
    }

    public function __toString()
    {
    $str = urlencode($this->getName()).'=';

    if ('' === (string) $this->getValue()) {
        $str .= 'deleted; expires='.gmdate("D, d-M-Y H:i:s T", time() - 31536001);
    } else {
       $str .= urlencode($this->getValue());

    if ($this->getExpiresTime() !== 0) {
    $str .= '; expires='.gmdate("D, d-M-Y H:i:s T", $this->getExpiresTime());
      }
    }

    if ('/' !== $this->path) {
    $str .= '; path='.$this->path;
    }

    if (null !== $this->getDomain()) {
    $str .= '; domain='.$this->getDomain();
    }

    if (true === $this->isSecure()) {
    $str .= '; secure';
    }

    if (true === $this->isHttpOnly()) {
    $str .= '; httponly';
    }

    return $str;
    }

    public function getName()
    {
    return $this->name;
    }

    public function getValue()
    {
    return $this->value;
    }

    public function getDomain()
    {
    return $this->domain;
    }

    public function getExpiresTime()
    {
    return $this->expire;
    }

    public function getPath()
    {
    return $this->path;
    }


    public function isSecure()
    {
    return $this->secure;
    }

    public function isHttpOnly()
    {
     return $this->httpOnly;
    }

    public function isCleared()
    {
      return $this->expire < time();
    }


    public function setName(){

    }

    public function  setValue($value){

    }

    public function setTime(){

    }

    public function create(){

    }
    public function  get(){

    }

    public function delete(){

    }

}

/*/**
 * Create a cookie with the name "myCookieName" and value "testing cookie value"
 */
/*
$cookie = new Cookie();
// Set cookie name
$cookie->setName('myCookieName');
// Set cookie value
$cookie->setValue("testing cookie value");
// Set cookie expiration time
$cookie->setTime("+1 hour");
// Create the cookie
$cookie->create();
// Get the cookie value.
print_r($cookie->get());
// Delete the cookie.
//$cookie->delete();