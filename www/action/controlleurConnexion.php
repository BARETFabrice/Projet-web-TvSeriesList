<?php

class controlleurConnexion
{
    
    public static function isConnecte()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';
        session_start();
		return isset($_SESSION["membreConnexion"]);
    }
    
    public static function getMembre()
    {
		if(self::isConnecte())
		    return $_SESSION["membreConnexion"];
		else
		    return null;
    }
    
    public static function validerHTTPConnexion()
    {
        if(self::isConnecte())
            header("Location: ./liste");
        
        if(isset($_POST['submitConnexion']))
        {
            $resultat=self::connecter($_POST['pseudonyme'],$_POST['motDePasse']);
            
            if($resultat===true)
                header("Location: ./liste");
        }
    }
    
    public static function connecter($pseudonyme, $motDePasse)
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';
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
		    print_r($e->getMessage());
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
        require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';
        session_start();
		unset($_SESSION["membreConnexion"]);
    }
    
}
?>