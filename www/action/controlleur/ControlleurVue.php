<?php
class ControlleurVue 
{
    private static $_instance;
    
    public static function getInstance()
    {
        if ((self::$_instance) == null) 
        {
            self::$_instance = new ControlleurVue();
        }
        return self::$_instance;
    }
    
    private function __construct()
    {
        
    }
    
    public function test()
    {
        echo "<script>console.log('ControlleurVue::test()');</script>";
    }
    
}
?>