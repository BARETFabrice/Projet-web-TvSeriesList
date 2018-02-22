<?php

class ControlleurLangue
{
    private static function verifierLangue()
    {
        if(!isset($_COOKIE['langue']))
            setcookie('langue','en_CA', time()+100000000, '/');
    }
    
    public static function getLangue()
    {
        self::verifierLangue();
	    return $_COOKIE['langue'];
    }
    
    public static function setLangue($langue)
    {
        self::verifierLangue();
            
        if($langue==='en_CA' || $langue==='fr_CA'){
            setcookie('langue', $langue, time()+100000000,'/');
            $_COOKIE['langue'] = $langue;
        }
        return $_COOKIE['langue'];
    }
    
}
?>