<?php
include "../../public/fragmentHautPage.php";

$erreur="";

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurParametres.php';

$membre=getMembre();
?>
<script>
	function ChangerNotification(valeur)
	{
		if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("paramNotification").style.color = "Green";
				setTimeout( function(){document.getElementById("paramNotification").style.color = "Black";}, 1000);
            }
        };
        xmlhttp.open("GET","/action/controlleurParametres.php?notification="+valeur,true);
        xmlhttp.send();
	}
	
	function ChangerNom(valeur)
	{
		if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("paramNom").style.color = "Green";
				setTimeout( function(){document.getElementById("paramNom").style.color = "Black";}, 1000);
            }
        };
        xmlhttp.open("GET","/action/controlleurParametres.php?nom="+valeur,true);
        xmlhttp.send();
	}
</script>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" method="post">
      <h4 class="text-center">Modifier parametres du membre</h4>
      
      <hr>
      
      <p class="messageErreure"><?=$erreur?></p>
      
      <label id="paramNotification">Notifications
        <input name="notification" onchange="ChangerNotification(this.checked)" type="checkbox" <?php if($membre->isNotification())echo 'checked'; ?>>
      </label>
      
      <label>Courriel
        <input type="email" name="courriel" value="<?=$membre->getCourriel()?>" disabled>
      </label>
	  
	  <label id="paramNom">Changer de nom
        <input type="text" name="pseudonyme" onchange="ChangerNom(this.value)" value="<?=$membre->getPseudonyme()?>">
      </label>
      
	   <hr>
	   
     <h4 class="text-center">Changer le mot de passe</h4>
        <input name="vieuxMotDePasse" type="password" placeholder="Old Password">
        <input name="motDePasse" type="password" placeholder="New Password">
      
      <p><input name="submitParametres" type="submit" class="button expanded" value="Changer mot de passe"></input></p>
    </form>
</div>

<?php
include "../../public/fragmentBasPage.php";
?>