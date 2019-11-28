<?php
function autoload($class)
{
    if(is_string($class) != null)
    {
        require_once 'haidara/corfblog/model/'.str_replace('\\', '/', $class).'.class.php';
    }
}
spl_autoload_register('autoload');


