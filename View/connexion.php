<?php
if(isset($_SESSION['user'])){
    header('Location: ./?page=accueil');
}

if(isset($_POST) && !empty($_POST)){

@$email = $_POST['adresse_email'];
@$pass = $_POST['pwd'];

    if(!empty($email) && !empty($pass)) {

        $user->connect($email, $pass);

        if ($user->connect($email, $pass)) {
            $_SESSION['user'] = [
                'id' => $user->connect($email, $pass)['id'],
                'nom' => $user->connect($email, $pass)['nom'],
                'prenom' => $user->connect($email, $pass)['prenom'],
                'email' => $user->connect($email, $pass)['email'],
                'adresse' => $user->connect($email, $pass)['adresse'],
                'code_postal' => $user->connect($email, $pass)['code_postal'],
                'ville' => $user->connect($email, $pass)['ville'],
                'date_inscription' => $user->connect($email, $pass)['date_inscription'],
            ];
            addMessageFlash('success', "Bonjour ".$_SESSION['user']['nom']. " ".$_SESSION['user']['prenom'].' !');
            echo '<p class="successBlock">'. end($_SESSION['flashBag']['success']) . '</p>';
        } else {
            echo 'Aucun utilisateur n\'a été trouvé avec les informations données';
        }

    }
}else { ?>

    <div class="row">
        <div class="col-xs-12 col-sm-offset-3 col-sm-6 text-center">
            <form class="form-horizontal" method="POST">
                <div class="form-group col-xs-12">
                    <label for="adresse_email" class="col-sm-2 control-label">Adresse e-mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="adresse_email" name="adresse_email" placeholder="example@website.org" required />
                    </div>
                </div>
                <div class="form-group col-xs-12 ">
                    <label for="pwd" class="col-sm-2 control-label">Mot de Passe</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="*********" required />
                    </div>
                </div>
                <div class="form-group col-xs-12 ">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Connexion</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
    echo '<a href="./?page=inscription">Pas de compte ? Inscrivez-vous</a>';
}

