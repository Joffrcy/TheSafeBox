<?php
//******************************************************************************
function afficheFormulaireConnexion()
{
?>
	<form id="form1" class="mb-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<h2 class="mb-4">Veuillez vous authentifier</h2>
			<div class="form-group">
				<label for="id_mail" class="mb-4">Adresse Mail</label>
				<input type="email" class="form-control-input" name="mail" id="id_mail" required>
			</div>
			<div class="form-group">
				<label class="mb-4" for="id_pass">Mot de passe</label>
				<input type="password" class="form-control-input" name="pass" id="id_pass" required>
			</div>
			<div class="form-group">
				<button type="submit" name="connexion" class="form-control-submit-button">Connexion</button>
			</div>
		</fieldset>
	</form>
<?php
}

//******************************************************************************
function afficheMenu()
{
?>
	
	<a class="btn-solid-reg" href="index.php?action=profil" title="Modifier mon profil">Modifier mon profil</a></li>
	<a class="btn-solid-reg" href="index.php?action=mdp" title="Modifier mon mot de passe">Modifier mon mot de passe</a></li></br></br>
	<a class="btn-solid-lg" href="index.php?action=photo" title="Modifier ma photo">Modifier ma photo</a></li>
	<a class="btn-solid-lg" href="index.php?action=qrcode" title="Générer un QR code">Générer un QR code</a></li></br></br>
	<?php
	if (!empty($_SESSION)){
		if (isAdmin($_SESSION["login"])) {
	?>
		<a class="btn-solid-reg" href="modification.php?action=inserer_utilisateur" title="Insérer un utilisateur">Insérer un utilisateur</a></li>
		<a class="btn-solid-reg" href="modification.php?action=supprimer_utilisateur" title="Supprimer un utilisateur">Supprimer un utilisateur</a></li>
		<a class="btn-solid-reg" href="modification.php?action=modifier_utilisateur" title="Modifier un utilisateur">Modifier un utilisateur</a></li>
	<?php
		}
	}
	?>
	<br><br>

<?php
}

//******************************************************************************
function afficheFormulaireAjoutClient()
{
	// connexion BDD et récupération des pays

	$bdd = new PDO('sqlite:bdd/SecurEsaip.sqlite');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Affiche les erreurs
	//Requête SQL
	$sql = "SELECT DISTINCT nom_fr, nom_en FROM pays";
	//Exécute la requête
	$res = $bdd->query($sql);
	$pays = $res->fetchAll(PDO::FETCH_ASSOC);

?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<div class="">
				<label for="id_Nom" class="mb-4">Nom : </label><input name="nom" id="id_Nom" placeholder="Nom" class="form-control-input" required><br>
				<label for="id_Prenom" class="mb-4">Prénom : </label><input name="prenom" id="id_Prenom" placeholder="Prenom" class="form-control-input" required><br>
				<label for="id_mail" class="mb-4">Adresse Mail : </label><input name="email" id="id_mail" placeholder="Mail" class="form-control-input" required><br>
				<label for="id_pass" class="mb-4">Mot de passe : </label><input type="password" name="password" id="id_pass" placeholder="Password" class="form-control-input" required><br>
				<label for="id_pass" class="mb-4">Confirmer votre mot de passe : </label><input type="password" name="verifpass" id="id_pass" placeholder="Mot de passe" class="form-control-input" required><br>
				<label for="id_tel" class="mb-4">Téléphone : </label><input name="tel" id="id_tel" placeholder="XX XX XX XX XX" class="form-control-input" required><br>
				<label for="id_adresse" class="mb-4">Adresse : </label><input name="adresse" id="id_adresse" placeholder="Adresse" class="form-control-input" required><br>
				<label for="id_cp" class="mb-4">Code postal : </label><input name="cp" id="id_cp" placeholder="Code postal" class="form-control-input" required><br>
				<label for="id_ville" class="mb-4">Ville : </label><input name="ville" id="id_ville" placeholder="Ville" class="form-control-input" required><br>
				<label for="id_pays">Pays :</label><select id="id_pays" name="pays" size="1" class="form-control-select">
					<?php // on se sert de value directement pour l'insertion
					foreach ($pays as $nom) {
						echo '<option value="' . $nom["nom_fr"] . '">' . $nom["nom_fr"] . '</option>';
					}
					?>
				</select><br />
				<label for="id_coffre" class="mb-4">Code du coffre : </label><input name="coffre" id="id_coffre" placeholder="Code du coffre" class="form-control-input" required>
			</div><br>

			<input type="submit" id="inscription" value="S'inscrire" class="form-control-submit-button" />
		</fieldset>
	</form>
<?php
	echo "<br/>";
} // fin afficheFormulaireAjoutClient

//******************************************************************************

function afficheFormulaireAjoutClientAdmin()
{
	// connexion BDD et récupération des villes

	$bdd = new PDO('sqlite:bdd/SecurEsaip.sqlite');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Affiche les erreurs
	//Requête SQL
	$sql = "SELECT DISTINCT nom_fr, nom_en FROM pays ORDER BY nom_fr";
	//Exécute la requête
	$res = $bdd->query($sql);
	$pays = $res->fetchAll(PDO::FETCH_ASSOC);

?>
	<form id="inscriptionadmin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<div class="">
				<label for="id_Nom">Nom : </label><input name="nom" class="form-control-input" id="id_Nom" placeholder="Nom" required size="20" /><br />
				<label for="id_Prenom">Prénom : </label><input name="prenom" class="form-control-input" id="id_Prenom" placeholder="Prenom" required size="20" /><br />
				<label for="id_mail">Adresse Mail : </label><input type="email" class="form-control-input" name="mail" id="id_mail" placeholder="@mail" required size="20" onchange="validation();" /><br />
				<p id="resultat"></p>
				<label for="id_pass">Mot de passe : </label><input type="password" class="form-control-input" name="pass" required id="id_pass" size="10" /><br />
				<label for="id_pass">Confirmer votre mot de passe : </label><input type="password" class="form-control-input" name="verifpass" required id="id_pass" size="10" /><br />
				<label for="id_status">Status :</label>
				<input type="radio" name="status" value="membre" checked> Membre
				<input type="radio" name="status" value="admin"> Admin<br /><br>
				<label for="id_tel">Téléphone : </label><input type="tel" class="form-control-input" name="tel" id="id_tel" placeholder="n° téléphone" required /><br />
				<label for="id_adresse">Adresse : </label><input name="adresse" class="form-control-input" id="id_adresse" placeholder="N° et rue" required /><br />
				<label for="id_cp">Code Postal : </label><input class="form-control-input" name="cp" id="id_cp" placeholder="Code postal" required /><br />
				<label for="id_ville">Ville : </label><input name="ville" class="form-control-input" id="id_ville" placeholder="Ville" required /><br />
				<label for="id_pays">Pays :</label>
				<select id="id_pays" class="form-control-select" name="pays" size="1">
					<?php // on se sert de value directement pour l'insertion
					foreach ($pays as $nom) {
						echo '<option value="' . $nom["nom_fr"] . '">' . $nom["nom_fr"] . '</option>';
					}
					?>
				</select><br />
				<label for="id_coffre">Code du coffre : </label><input name="coffre" class="form-control-input" id="id_coffre" placeholder="Code du coffre" required /><br />
				<input type="submit" class="form-control-submit-button" id="inscription" value="Insérer" />
			</div>
		</fieldset>
	</form>
<?php
	echo "<br/>";
} // fin afficheFormulaireAjoutClient

//******************************************************************************
function afficheFormulaireChoixClient($choix)
{

	$bdd = new PDO('sqlite:bdd/SecurEsaip.sqlite');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Affiche les erreurs
	//Requête SQL
	$sql = "SELECT mail from CompteClient";
	//Exécute la requête
	$res = $bdd->query($sql);
	$clients = $res->fetchAll(PDO::FETCH_ASSOC);

?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<select id="id_mail" name="mail" class="form-control-select" size="1" >
				<?php // on se sert de value directement 
				foreach ($clients as $client) {
					echo '<option value="' . $client["mail"] . '">' . $client["mail"] . '</option>';
				}
				?>
			</select>

			<?php
			echo "<br><input type='submit' class='form-control-submit-button' name ='choix' value='$choix'/>";
			?>

		</fieldset>
	</form>
<?php
	echo "<br/>";
} // fin afficheFormulaireChoixClient


//*******************************************************************************************
function afficheFormulaireModificationClient($mail)
{

	$bdd = new PDO('sqlite:bdd/SecurEsaip.sqlite');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Affiche les erreurs
	//Requête SQL
	$mail = $bdd->quote($mail);
	$sql = "SELECT * FROM CompteClient where mail =".$mail;
	//Exécute la requête
	$res = $bdd->query($sql);
	$client = $res->fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT DISTINCT nom_fr, nom_en FROM pays ORDER BY nom_fr";
	$res = $bdd->query($sql);
	$pays = $res->fetchAll(PDO::FETCH_ASSOC);
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<label for="id_nom">Nom : </label><input name="nom" class="form-control-input" id="id_nom" placeholder="Nom" required size="20" value="<?php echo $client["Nom"] ?>" /><br />
			<label for="id_prenom">Prénom : </label><input name="prenom" class="form-control-input" id="id_prenom" placeholder="Prenom" required size="20" value="<?php echo $client["Prenom"] ?>" /><br />
			<label for="id_mail">Adresse Mail : </label><input name="mail" class="form-control-input" type="email" id="id_mail" value="<?php echo $mail ?>" readonly size="20" /><br />
			<label for="id_pass">Mot de passe : </label><input name="pass" class="form-control-input" type="password" value="<?php echo $client["mdp"] ?>" required id="id_pass" size="10" /><br />
			<label for="id_status">Status :</label>
			<input type="radio" name="status" value="Client" <?php if ($client["status"] == "Client") echo 'checked' ?>> Client
			<input type="radio" name="status" value="admin" <?php if ($client["status"] == "admin") echo 'checked' ?>> Admin<br /><br>
			<label for="id_tel">Téléphone : </label><input type="tel" class="form-control-input" name="tel" id="id_tel" placeholder="n° téléphone" required value="<?php echo $client["Telephone"] ?>" /><br />
			<label for="id_adresse">Adresse : </label><input name="adresse" class="form-control-input" id="id_adresse" placeholder="N° et rue" required value="<?php echo $client["Adresse"] ?>" /><br />
			<label for="id_cp">Code Postal : </label><input class="form-control-input" name="cp" id="id_cp" placeholder="Code postal" required value="<?php echo $client["CP"] ?>" /><br />
			<label for="id_ville">Ville : </label><input name="ville" class="form-control-input" id="id_ville" placeholder="Ville" required value="<?php echo $client["Ville"] ?>" /><br />
			<label for="id_pays">Pays :</label>
			<select id="id_pays" name="pays" size="1" class="form-control-select">
				<?php // on se sert de value directement pour l'insertion

				foreach ($pays as $nom) {
					if ($client["Pays"] == $nom["nom_fr"]) {
						echo '<option value="' . $nom["nom_fr"] . '" selected>' . $nom["nom_fr"] . '</option>';
					} else echo '<option value="' . $nom["nom_fr"] . '">' . $nom["nom_fr"] . '</option>';
				}
				?>
			</select><br />
			<label for="id_coffre">Code du coffre : </label><input name="coffre" class="form-control-input" id="id_coffre" placeholder="Code du coffre" required value="<?php echo $client["id_coffre"] ?>" /><br />
			<label for="id_verif">Status :</label>
			<input type="radio" name="verif" value="0" <?php if ($client["verifie"] == "0") echo 'checked' ?>> Non verifié
			<input type="radio" name="verif" value="1" <?php if ($client["verifie"] == "1") echo 'checked' ?>> Vérifié</br></br>
			<input type="submit" value="Modifier" class="form-control-submit-button" />
		</fieldset>
	</form>
<?php
	echo "<br/>";
} // fin afficheFormulaireModificationClient

//*******************************************************************************************
function afficheFormulaireModificationProfil($mail)
{

	$bdd = new PDO('sqlite:bdd/SecurEsaip.sqlite');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Affiche les erreurs
	//Requête SQL
	$mail = $bdd->quote($mail);
	$sql = "SELECT * FROM CompteClient where mail = $mail";
	//Exécute la requête
	$res = $bdd->query($sql);
	$client = $res->fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT DISTINCT nom_fr, nom_en FROM pays ORDER BY nom_fr";
	$res = $bdd->query($sql);
	$pays = $res->fetchAll(PDO::FETCH_ASSOC);

	if ($client["verifie"] == 0) {
		echo "<p>Votre profil n'est pas encore vérifié. Pour ce faire, ajoutez une photo</p>";
	} else {
		echo "<p>Votre profil est vérifié.</p>";
	}
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<label for="id_nom">Nom : </label><input name="nom" class="form-control-input" id="id_nom" placeholder="Nom" required size="20" value="<?php echo $client["Nom"] ?>" /><br />
			<label for="id_prenom">Prénom : </label><input name="prenom" class="form-control-input" id="id_prenom" placeholder="Prenom" required size="20" value="<?php echo $client["Prenom"] ?>" /><br />
			<label for="id_mail">Adresse Mail : </label><input name="mail" class="form-control-input" type="email" id="id_mail" value="<?php echo $mail ?>" readonly size="20" /><br />
			<label for="id_tel">Téléphone : </label><input type="tel" class="form-control-input" name="tel" id="id_tel" placeholder="n° téléphone" required value="<?php echo $client["Telephone"] ?>" /><br />
			<label for="id_adresse">Adresse : </label><input name="adresse" class="form-control-input" id="id_adresse" placeholder="N° et rue" required value="<?php echo $client["Adresse"] ?>" /><br />
			<label for="id_cp">Code Postal : </label><input class="form-control-input" name="cp" id="id_cp" placeholder="Code postal" required value="<?php echo $client["CP"] ?>" /><br />
			<label for="id_ville">Ville : </label><input name="ville" class="form-control-input" id="id_ville" placeholder="Ville" required value="<?php echo $client["Ville"] ?>" /><br />
			<label for="id_pays">Pays :</label>
			<select id="id_pays" name="pays" size="1" class="form-control-select">
				<?php // on se sert de value directement pour l'insertion

				foreach ($pays as $nom) {
					if ($client["Pays"] == $nom["nom_fr"]) {
						echo '<option value="' . $nom["nom_fr"] . '" selected>' . $nom["nom_fr"] . '</option>';
					} else echo '<option value="' . $nom["nom_fr"] . '">' . $nom["nom_fr"] . '</option>';
				}
				?>
			</select><br />
			<label for="id_coffre">Code du coffre : </label><input name="coffre" class="form-control-input" id="id_coffre" placeholder="Code du coffre" required value="<?php echo $client["id_coffre"] ?>" /><br />
			<input type="submit" value="Modifier" class="form-control-submit-button" />
		</fieldset>
	</form>
<?php
	echo "<br/>";
} // fin afficheFormulaireModificationProfil

//*******************************************************************************************
function afficheFormulaireModificationPass()
{
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<label for="id_pass">Nouveau mot de passe : </label><input type="password" class="form-control-input" name="nouveaupass" required id="id_pass" size="10" /><br />
			<label for="id_pass">Confirmer votre nouveau mot de passe : </label><input type="password" class="form-control-input" name="nouveauverifpass" required id="id_pass" size="10" /><br />
			<input type="submit" value="Modifier mon mot de passe"  class="form-control-submit-button"/>
		</fieldset>
	</form>
<?php
	echo "<br/>";
} // fin afficheFormulaireModificationPass

//*******************************************************************************************
function afficheFormulaireVerificationPass()
{
?>
	<div class="form-group">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<fieldset>
				<label class="mb-4" for="id_pass">Entrez votre mot de passe : </label><input class="form-control-input" type="password" name="verifpass" required id="id_pass" size="10" /><br />
				<input class="form-control-submit-button" type="submit" value="Envoyer" />
			</fieldset>
		</form>
	</div>
<?php
} // fin afficheFormulaireVerificationPass

//*******************************************************************************************
function afficheFormulairePhoto()
{
?>
	<form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
		<?php
		if(!empty($_FILES['image'])){
		?>
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
		<?php
		}
		?>
      </form>
<?php
	echo "<br/>";
} // fin afficheFormulairePhoto
?>
