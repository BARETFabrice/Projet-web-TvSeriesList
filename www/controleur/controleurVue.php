<?php
echo "<script>console.log('controleurVue inclue v2');</script>";

include "../action/SerieDAO.php";

class ControleurVue
{
    private $serieDAO;
    
    
    
	function test()
    {
        echo "<script>console.log('test');</script>";
    }
}
?>