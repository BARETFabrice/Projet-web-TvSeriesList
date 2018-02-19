<?php

class ControlleurLangue
{
    
    public static function getLangue()
    {
        if(!isset($_COOKIE['langue']))
            setcookie('langue','en_CA', time()+100000000);
	    return ($_COOKIE['langue']);
    }
    
    public static function setLangue($langue)
    {
        setcookie('langue',$langue, time()+100000000);
    }
    
}
?>