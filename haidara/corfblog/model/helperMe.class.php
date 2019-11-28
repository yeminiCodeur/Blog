<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 01/04/2017
 * Time: 16:17
 */
class HelperMe{

    public  function __construct(){

    }

    public  function count_Visite()
    {
        $fv = fopen("f_visite.dat", "r");
        if(!$fv)
        {
            throw new Exception('error');
        }
        else{
            $str  = fgets($fv,6);
            $cpt = (int)$str;
            $cpt  = $cpt + 1 ;
            $cpt = str_pad($cpt,6);
            fwrite($fv,$cpt);
        }

        fclose($fv);
        return $cpt;
    }
    public  function  getDecoded($field)
    {
        return base64_decode(htmlentities(trim($field)));
    }

}
