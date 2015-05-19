<h1>Mon Espace</h1>
<div id="myOwnTab">
    <div class="tab-menu">
        <span class="tab-link tab-link-left tab-link-active link-left">Mes Informations</span>
        <span class="tab-link tab-link-middle link-middle">Changement de Mot de Passe</span>
        <span class="tab-link tab-link-right link-right">Changement d'Adresse</span>
        <div class="clear"></div>
    </div>
    <div class="tab-content">
        <div class="tab-wrap">
            <div class="tab" id="tab-left">
                <!-- Contenu -->
                <h2>Mes Informations</h2>
                <table>
                    <tr>
                        <td>Nom :</td>
                        <td><?php echo $_SESSION['user']['nom']; ?></td>
                    </tr>
                    <tr>
                        <td>prenom :</td>
                        <td><?php echo $_SESSION['user']['prenom']; ?></td>
                    </tr>
                    <tr>
                        <td>Adresse :</td>
                        <td><?php echo $_SESSION['user']['adresse']; ?></td>
                    </tr>
                    <tr>
                        <td>Code postal :</td>
                        <td><?php echo $_SESSION['user']['code_postal']; ?></td>
                    </tr>
                    <tr>
                        <td>Adresse e-mail :</td>
                        <td><?php echo $_SESSION['user']['email']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="tab" id="tab-middle">
                <!-- Contenu -->
                <h2>Changement de Mot de Passe</h2>

                <form method="POST">
                    <label for="old_password">Ancien mot de passe :</label><input type="password" name="old_password" id="old_password" required/>
                    <hr/>
                    <label for="new_pwd">Nouveau mot de passe </label><input type="password" name="new_pwd" id="new_pwd"/><br />
                    <label for="new_pwdCheck">Nouveau mot de passe (vérif) </label><input type="password" name="new_pwdCheck" id="new_pwdCheck"/><br />
                    <input type="submit"/>
                </form>
                <?php
                

                ?>
            </div>
            <div class="tab" id="tab-right">
                <!-- Contenu -->
                <h2>Changement d'adresse</h2>

                <form method="POST">
                    <?php echo $_SESSION['user']['adresse'].' '.$_SESSION['user']['code_postal'].' '.$_SESSION['user']['ville']; ?><hr/>
                    <label for="new_adresse">Nouvelle adresse </label><input type="text" name="new_adresse" id="new_adresse"/><br />
                    <label for="new_codePostal">Code Postal</label><input type="number" name="new_codePostal" id="new_codePostal"/><br />
                    <label for="new_Ville">Ville</label><input type="text" name="new_Ville" id="new_Ville"/><br />
                    <input type="submit"/>
                </form>
<?php

if(isset($_POST['new_adresse'], $_POST['new_codePostal'], $_POST['new_Ville'])) {

    $user->changeAdresse($_SESSION['user']['id'], $_POST['new_adresse'], $_POST['new_codePostal'], $_POST['new_Ville']);
#   Changement d'adresse fait -> On la change en session.
    $user->getAdresseAndCodePostalById($_SESSION['user']['id']);

    unset($_SESSION['user']['adresse'], $_SESSION['user']['code_postal'], $_SESSION['user']['ville']);

    $u = [
        'adresse' => $user->getAdresseAndCodePostalById($_SESSION['user']['id'])['adresse'],
        'code_postal' =>$user->getAdresseAndCodePostalById($_SESSION['user']['id'])['code_postal'],
        'ville' =>$user->getAdresseAndCodePostalById($_SESSION['user']['id'])['ville'],
    ];


    $_SESSION['user'] = array_merge($_SESSION['user'], $u);

}
?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>