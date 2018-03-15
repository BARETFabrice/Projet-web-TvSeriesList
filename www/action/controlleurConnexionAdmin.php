<?php

class controlleurConnexionAdmin
{
    
    public static function isConnecte()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Administrateur.php';
        session_start();
		return isset($_SESSION["adminConnexion"]);
    }
    
    public static function getMembre()
    {
		if(self::isConnecte())
		    return $_SESSION["adminConnexion"];
		else
		    return null;
    }
    
    public static function validerHTTPConnexion()
    {
        if(self::isConnecte())
            header("Location: ./index.php");
        
        if(isset($_POST['submitConnexion']))
        {
            $resultat=self::connecter($_POST['pseudonyme'],$_POST['motDePasse']);
            
            if($resultat===true)
                header("Location: ./index.php");
        }
    }
    
    public static function connecter($pseudonyme, $motDePasse)
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Administrateur.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/dao/AdministrateurDAO.php';

        $admin = new Administrateur();
		$admin->setGestionErreur(true);
		
		try{
		    $admin->setPseudonyme($pseudonyme);
		    $admin->setMotDePasse($motDePasse);
		    
		    $admin->hashMotDePasse();
		    
		    $admin=AdministrateurDAO::getInstance()->connecterAdmin($admin);
		}
		catch(Exception $e){
		    print_r($e->getMessage());
		    return $e->getMessage();
		}
		
		
		if(!empty($admin))
		{
		    session_start();
		    $_SESSION["adminConnexion"]=$admin;
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