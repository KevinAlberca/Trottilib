<?php
include("paypal/fonction_api.php"); // On importe la page créée précédemment
$requete = construit_url_paypal(); // Construit les options de base

$requete = $requete."&METHOD=DoExpressCheckoutPayment".
    "&TOKEN=".htmlentities($_GET['token'], ENT_QUOTES). // Ajoute le jeton qui nous a été renvoyé
    "&AMT=".$_SESSION['paypal']['prix'].
    "&CURRENCYCODE=EUR".
    "&PayerID=".htmlentities($_GET['PayerID'], ENT_QUOTES). // Ajoute l'identifiant du paiement qui nous a également été renvoyé
    "&PAYMENTACTION=sale";

$ch = curl_init($requete);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$resultat_paypal = curl_exec($ch);

if (!$resultat_paypal){  // S'il y a une erreur, on affiche "Erreur", suivi du détail de l'erreur.
    echo "<p>Erreur</p><p>".curl_error($ch)."</p>";
} else {
    $liste_param_paypal = recup_param_paypal($resultat_paypal); // Lance notre fonction qui dispatche le résultat obtenu en un array

    // Si la requête a été traitée avec succès
    if ($liste_param_paypal['ACK'] == 'Success') {
        echo "<h1 class='title'>Le paiement a été effectué</h1>
<p class='text-center'>Vous pouvez désormais vous rendre dans <a href='./?page=MonEspace'>votre espace</a> pour consultez votre abonnement.</p><script>setTimeout(function(){document.location.href='./?page=accueil';}, 2500);</script>";
        foreach($_SESSION['panier'] as $article) {
            $abo->subscribe($_SESSION['user']['id'], $article['id_abonnement'], $article['duree']);
        }
    } else { // En cas d'échec, affiche la première erreur trouvée.
        echo "<p>Erreur de communication avec le serveur PayPal.<br />".$liste_param_paypal['L_SHORTMESSAGE0']."<br />".$liste_param_paypal['L_LONGMESSAGE0']."</p>";
    }
}
// On ferme notre session cURL.
curl_close($ch);
?>