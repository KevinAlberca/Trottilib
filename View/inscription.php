<?php 
if (isset($_SESSION['user'])) {
    header('Location: ?page=accueil');
    exit;
} else {
?>

<div class="row">
    <div class="col-xs-12 col-sm-offset-3 col-sm-6 text-center">
        <form class="form-horizontal" method="POST">
            <div class="form-group col-xs-12">
                <label for="nom" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required />
                </div>
            </div>
            <div class="form-group col-xs-12">
                <label for="prenom" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required />
                </div>
            </div>
            <div class="form-group col-xs-12">
                <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="ex : 2 rue des tulipes" required />
                </div>
            </div>
            <div class="form-group col-xs-12">
                <label for="code_postal" class="col-sm-2 control-label">Code Postal</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="code_postal" name="code_postal" placeholder="94240" required />
                </div>
            </div>
            <div class="form-group col-xs-12">
                <label for="ville" class="col-sm-2 control-label">Ville</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ville" name="ville" placeholder="L'Haÿe-les-Roses" required />
                </div>
            </div>
            <div class="form-group col-xs-12">
                <label for="date_naissance" class="col-sm-2 control-label">Date de Naissance</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" placeholder="JJ/MM/AAAA" required />
                </div>
            </div>
            <div class="form-group col-xs-12">
                <label for="adresse_email" class="col-sm-2 control-label">Adresse e-mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="adresse_email" name="adresse_email" placeholder="example@website.org" required />
                </div>
            </div>
            <div class="form-group col-xs-12 ">
                <label for="pwd" class="col-sm-2 control-label">Mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="*********" required />
                </div>
            </div>
            <div class="form-group col-xs-12">
                <label for="pwdCheck" class="col-sm-2 control-label">Mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwdCheck" name="pwdCheck" placeholder="*********" required />
                </div>
            </div>
            <div class="form-group col-xs-12">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Inscription</button>
                </div>
            </div>
        </form>
        <a href="./?page=connexion">Vous avez déjà un compte ? Connectez-vous</a><br/>
<?php
    $new = explode('/',$_POST['date_naissance']);
    $date_naissance = $new[2].'-'.$new[1].'-'.$new[0];

var_dump($date_naissance);
    $nom = strtoupper($_POST['nom']);
    $prenom = ucwords($_POST['prenom']);
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = ucwords($_POST['ville']);
    $email = $_POST['adresse_email'];
    $pwd = $_POST['pwd'];
    $pwdCheck = $_POST['pwdCheck'];


    if(isset($_POST) && !empty($_POST)){
        if($pwd === $pwdCheck){
            if($user->addUser($nom, $prenom, $email, $date_naissance, $pwd, $adresse, $code_postal, $ville)){
                $user->setDataSearch($nom, $prenom, $email, $ville);
                echo "Le compte a été créé<script>setTimeout(function(){document.location.href='./?page=connexion';}, 2500);</script>";
            } else {
                echo "Une erreur est survenue lors de l'inscription";
            }
            var_dump($user->addUser($nom, $prenom, $email, $date_naissance, $pwd, $adresse, $code_postal, $ville));
        } else {
            echo 'Le mot de passe et sa vérification doivent être identiques';
        }
    }
}
?>
    </div>
    </div>