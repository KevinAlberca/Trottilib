
<form method="POST">
    <label for="adresse_email">Adresse email</label><input type="email" name="adresse_email" id="adresse_email" required />
    <label for="pwd">Mot de passe</label><input type="password" name="pwd" id="pwd" required /><br />
    <input type="submit" value="Connexion" />
</form>
<a href="./?page=inscription">Pas de compte ? Inscrivez-vous</a>
<?php

	@$email = $_POST['adresse_email'];
	@$pass = $_POST['pwd'];

	if(!empty($email) && !empty($pass)){

        $user->connect($email,$pass);

        if($user->connect($email,$pass)) {
            $_SESSION['user'] = [
                'id' => $user->connect($email,$pass)['id'],
                'nom' => $user->connect($email,$pass)['nom'],
                'prenom' => $user->connect($email,$pass)['prenom'],
                'email' => $user->connect($email,$pass)['email'],
                'adresse' => $user->connect($email,$pass)['adresse'],
                'code_postal' => $user->connect($email,$pass)['code_postal'],
                'ville' => $user->connect($email,$pass)['ville'],
                'date_inscription' => $user->connect($email,$pass)['date_inscription'],
            ];
            echo "Connexion réussie";
        } else {
            echo 'Aucun utilisateur n\'a été trouvé avec les informations données';
        }

	}
