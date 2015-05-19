<?php 
if (isset($_SESSION['user'])) {
	header('Location: ?page=accueil');
	exit;
} else {
?>
<form method="POST">
    <label for="nom">Nom</label><input type="text" name="nom" id="nom" required />
    <label for="prenom">Prenom</label><input type="text" name="prenom" id="prenom" required /><br />
    <label for="adresse">Adresse</label><input type="text" name="adresse" id="adresse" required />
    <label for="code_postal">Code Postal</label><input type="number" name="code_postal" id="code_postal" required /><br />
    <label for="ville">Ville</label><input type="text" name="ville" id="ville" required />
    <label for="age">Age</label><input type="number" name="age" id="age" required />
    <label for="adresse_email">Adresse email</label><input type="email" name="adresse_email" id="adresse_email" required /><br />
    <label for="pwd">Mot de passe</label><input type="password" name="pwd" id="pwd" required />
    <label for="pwdCheck">Mot de passe (vérification)</label><input type="password" name="pwdCheck" id="pwdCheck" required /><br />
    <input type="submit" value="Inscription" />
</form>
    <a href="./?page=connexion">Vous avez déjà un compte ? Connectez-vous</a>
<?php

	@$nom = $_POST['nom'];
	@$prenom = ucwords($_POST['prenom']);
	@$adresse = $_POST['adresse'];
	@$code_postal = $_POST['code_postal'];
    @$ville = $_POST['ville'];
	@$age = $_POST['age'];
	@$email = $_POST['adresse_email'];
	@$pwd = $_POST['pwd'];
	@$pwdCheck = $_POST['pwdCheck'];


    if(isset($_POST) && !empty($_POST)){
        if($pwd === $pwdCheck){
            if($user->addUser($nom, $prenom, $email, $pwd, $adresse, $code_postal, $ville)){
                echo "Le compte a été créé";
            } else {
                echo "Les identifiants sont déjà utilisés pour un compte";
            }
        } else {
            echo 'Le mot de passe et sa vérification doivent être identiques';
        }
    }
}