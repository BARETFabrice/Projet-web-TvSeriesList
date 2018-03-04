<?php

class controlleurConnexion
{
    
    public static function isConnecte()
    {
        session_start();
		return isset($_SESSION["membreConnexion"]);
    }
    
    public static function getMembre()
    {
        session_start();
		if(self::isConnecte())
		    return $_SESSION["membreConnexion"];
		else
		    return null;
    }
    
    public static function connecter($pseudonyme, $motDePasse)
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';

        $membre = new Membre();
		$membre->setGestionErreur(true);
		
		try{
		    $membre->setPseudonyme($pseudonyme);
		    $membre->setMotDePasse($motDePasse);
		    
		    $membre->hashMotDePasse();
		    
		    $membre=MembreDAO::getInstance()->connecterMembre($membre);
		}
		catch(Exception $e){
		    return $e->getMessage();
		}
		
		
		if(!empty($membre))
		{
		    session_start();
		    $_SESSION["membreConnexion"]=$membre;
		    return true;
		}
		
		return false;
    }
    
    public static function deconnecter()
    {
        session_start();
		unset($_SESSION["membreConnexion"]);
    }
    
}
?>