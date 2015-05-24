<?php
include("fonction_api.php");
$requete = construit_url_paypal();
$requete = $requete."&METHOD=SetExpressCheckout".
    "&CANCELURL=".urlencode("http://127.0.0.1/Trotti/?page=abandon").
    "&RETURNURL=".urlencode("http://127.0.0.1/Trotti/?page=succes").
    "&AMT=10.0".
    "&CURRENCYCODE=EUR".
    "&DESC=".urlencode("Abonnement Trottilib', la trottinette en libre service sur Paris").
    "&LOCALECODE=FR".
    "&HDRIMG=".urlencode("http://awh.fr/PT/static/img/Logo.png");

$ch = curl_init($requete);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$resultat_paypal = curl_exec($ch);

if (!$resultat_paypal) {
    echo "<p>Erreur</p><p>".curl_error($ch)."</p>";
} else {
    $liste_param_paypal = recup_param_paypal($resultat_paypal); // Lance notre fonction qui dispatche le résultat obtenu en un array

    // Si la requête a été traitée avec succès
    if ($liste_param_paypal['ACK'] == 'Success') {
        // Redirige le visiteur sur le site de PayPal
        header("Location: https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=".$liste_param_paypal['TOKEN']);
        exit();
    }
    else { // En cas d'échec, affiche la première erreur trouvée.
        echo "<p>Erreur de communication avec le serveur PayPal.<br />".$liste_param_paypal['L_SHORTMESSAGE0']."<br />".$liste_param_paypal['L_LONGMESSAGE0']."</p>";
    }
}
curl_close($ch);