<?php

class ControlleurLangue
{
    private static function verifyLangue()
    {
        if(!isset($_COOKIE['langue']))
            setcookie('langue','en_CA', time()+100000000);
    }
    
    public static function getLangue()
    {
        self::verifyLangue();
	    return ($_COOKIE['langue']);
    }
    
    public static function setLangue($langue)
    {
        self::verifyLangue();
            
        if($langue==='en_CA' || $langue==='fr_CA')
            $_COOKIE['langue']=$langue;
        
        return $_COOKIE['langue'];
    }
    
}
?>