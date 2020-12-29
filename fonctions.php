<?php
//****************Fonctions utilisées**************************************
function compteExiste($mail,$pass){
$retour = false;
$madb = new PDO('sqlite:bdd/SecurEsaip.sqlite');
$madb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Affiche les erreurs
$mail= $madb->quote($mail);
$pass = $madb->quote($pass);
$requete = "SELECT mail,mdp FROM CompteClient WHERE mail LIKE ".$mail." AND mdp LIKE ".$pass;	
$resultat = $madb->query($requete);
$tableau_assoc = $resultat->fetchAll(PDO::FETCH_ASSOC);
if (sizeof($tableau_assoc)!=0) $retour = true;
return $retour;
}
//********************************************************************************
//Vérifie que la personne est le Directeur ou un des admins de l'entreprise ou du site internet
function isAdmin($mail){
$retour = false;
$madb = new PDO('sqlite:bdd/SecurEsaip.sqlite'); 
$madb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Affiche les erreurs
$mail= $madb->quote($mail);
$requete = "SELECT status FROM CompteClient WHERE mail LIKE ".$mail;
$resultat = $madb->query($requete);
$tableau = $resultat->fetch(PDO::FETCH_ASSOC);
if($tableau['status']=='admin') $retour=true;
return $retour;		
}
//*******************************************************************************************
function ajoutClient($mail,$pass,$nom,$prenom,$tel,$adresse,$cp,$ville,$pays,$status,$coffre){
	
$retour=0;
$madb = new PDO('sqlite:bdd/SecurEsaip.sqlite'); 	
// filtrer les paramètres
$mail=$madb->quote($mail);
$pass=$madb->quote($pass);
$nom=$madb->quote($nom);
$prenom=$madb->quote($prenom);
$tel=$madb->quote($tel);
$adresse=$madb->quote($adresse);
$cp=$madb->quote($cp);
$ville=$madb->quote($ville);
$pays=$madb->quote($pays);
$status=$madb->quote($status);
$coffre=$madb->quote($coffre);

$requete = "INSERT INTO CompteClient (mail,mdp,Nom,Prenom,Telephone,Adresse,CP,Ville,Pays,status,id_coffre,verifie) VALUES($mail,$pass,$nom,$prenom,$tel,$adresse,$cp,$ville,$pays,$status,$coffre,0)";
$resultat = $madb->exec($requete);

if($resultat) $retour=1;
return $retour;
}
//*******************************************************************************************
function supprimerClient($mail){
$retour=0;
$madb = new PDO('sqlite:bdd/SecurEsaip.sqlite'); 
// filtrer le paramètre	
$mail=$madb->quote($mail);

$requete = "DELETE FROM CompteClient WHERE mail=$mail";
$resultat = $madb->exec($requete);

if($resultat) $retour=1;
return $retour;
}
//*******************************************************************************************
function modifierClient($mail,$pass,$nom,$prenom,$tel,$adresse,$cp,$ville,$pays,$status,$coffre,$verif){
$retour=0;
$madb = new PDO('sqlite:bdd/SecurEsaip.sqlite'); 
// filtrer les paramètres	

$pass=$madb->quote($pass);
$nom=$madb->quote($nom);
$prenom=$madb->quote($prenom);
$tel=$madb->quote($tel);
$adresse=$madb->quote($adresse);
$cp=$madb->quote($cp);
$ville=$madb->quote($ville);
$pays=$madb->quote($pays);
$status=$madb->quote($status);
$coffre=$madb->quote($coffre);
$verif=$madb->quote($verif);

$requete = "UPDATE CompteClient SET mdp=".$pass.", Nom=".$nom.", Prenom=".$prenom.", Telephone = ".$tel.",  Adresse= ".$adresse.", CP= ".$cp.", Ville= ".$ville.", Pays= ".$pays.",  status=".$status.", id_coffre= ".$coffre.", verifie= ".$verif." WHERE mail like ".$mail;

$resultat = $madb->exec($requete);

if($resultat){
	$retour=1;
	if($verif=="'1'"){
	    shell_exec("cp uploads/".$mail.".jpg /home/pi/TheSafeBox/profiles");
	}
}
	
return $retour;
}
//*******************************************************************************************
function modifierProfil($mail,$nom,$prenom,$tel,$adresse,$cp,$ville,$pays,$coffre){
$retour=0;
$madb = new PDO('sqlite:bdd/SecurEsaip.sqlite'); 
// filtrer les paramètres	
$nom=$madb->quote($nom);
$prenom=$madb->quote($prenom);
$tel=$madb->quote($tel);
$adresse=$madb->quote($adresse);
$cp=$madb->quote($cp);
$ville=$madb->quote($ville);
$pays=$madb->quote($pays);
$coffre=$madb->quote($coffre);

$requete = "UPDATE CompteClient SET Nom=".$nom.", Prenom=".$prenom.", Telephone = ".$tel.",  Adresse= ".$adresse.", CP= ".$cp.", Ville= ".$ville.", Pays= ".$pays.", id_coffre= ".$coffre." WHERE mail like ".$mail;

$resultat = $madb->exec($requete);

if($resultat) $retour=1;
	
return $retour;
}
//*******************************************************************************************
function modifierMdp($mail,$pass){
$retour=0;
$madb = new PDO('sqlite:bdd/SecurEsaip.sqlite'); 
// filtrer les paramètres
$mail=$madb->quote($mail);
$pass=$madb->quote($pass);

$requete = "UPDATE CompteClient SET mdp=".$pass." WHERE mail like ".$mail;

$resultat = $madb->exec($requete);

if($resultat) $retour=1;
	
return $retour;
}


//*******************************************************************************************
//Nom : redirect()
//Role : Permet une redirection en javascript
//Parametre : URL de redirection et Délais avant la redirection
//Retour : Aucun
//*******************
function redirect($url,$tps){
    $temps = $tps * 1000;
    echo "<script type=\"text/javascript\">\n"
    . "<!--\n"
    . "\n"
    . "function redirect() {\n"
    . "window.location='" . $url . "'\n"
    . "}\n"
    . "setTimeout('redirect()','" . $temps ."');\n"
    . "\n"
    . "// -->\n"
    . "</script>\n";
}
//*******************************************************************************************
function check_email_address($email) { 
    return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) ? false : true; 
}
//*******************************************************************************************
function verifmdp($mail,$pass){
$retour = false;
$madb = new PDO('sqlite:bdd/SecurEsaip.sqlite'); 
$madb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Affiche les erreurs
$mail=$madb->quote($mail);
$requete = "SELECT mdp FROM CompteClient WHERE mail LIKE ".$mail;
$resultat = $madb->query($requete);
$tableau = $resultat->fetch(PDO::FETCH_ASSOC);
if($tableau['mdp']==$pass) $retour=true;
return $retour;
}
//*******************************************************************************************

function updateverif($mail){
$retour = false;
$madb = new PDO('sqlite:bdd/SecurEsaip.sqlite'); 
$madb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Affiche les erreurs
$mail=$madb->quote($mail);

$requete = "UPDATE CompteClient SET verifie=0 WHERE mail like ".$mail;

$resultat = $madb->exec($requete);

if($resultat) $retour=1;
	
return $retour;

}
 ?>
