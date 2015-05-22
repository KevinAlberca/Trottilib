<?php

class Basket extends Connexion {

    public function __construct(){

    }

    public function addToBasket($article){
        $_SESSION['panier'] = array_merge($_SESSION['panier'], $article);

        return $_SESSION['panier'];
    }

    public function showMyBasket(){
        return $_SESSION['panier'];
    }

    public function cleanMyBasket(){

    }

    public function purchaseMyBasket($totalPrice){
        $this->cURL($totalPrice);
    }

    private function cURL($totalPrice){
        $ch = curl_init($this->getAPIUrl($totalPrice));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $resultat_paypal = curl_exec($ch);

// S'il y a une erreur, on affiche "Erreur", suivi du détail de l'erreur.
        if (!$resultat_paypal) {
            echo "<p>Erreur</p><p>".curl_error($ch)."</p>";
        }

        else { // S'il s'est exécuté correctement, on effectue les traitements...
            // On récupère la liste de paramètres, séparés par un 'et' commercial (&)
            $liste_parametres = explode("&",$resultat_paypal);
            // Pour chacun de ces paramètres, on exécute le bloc suivant, en intégrant le paramètre dans la variable $param_paypal
            foreach($liste_parametres as $param_paypal)
            {
                // On récupère le nom du paramètre et sa valeur dans 2 variables différentes. Elles sont séparées par le signe égal (=)
                list($nom, $valeur) = explode("=", $param_paypal);
                // On crée un tableau contenant le nom du paramètre comme identifiant et la valeur comme valeur.
                $liste_param_paypal[$nom]=urldecode($valeur); // Décode toutes les séquences %##  et les remplace par leur valeur.
            }
            // On affiche le tout pour voir que tout est OK.
            echo "<pre>";
            print_r($liste_param_paypal);
            echo "</pre>";
        }

// On ferme notre session cURL.
        curl_close($ch);
    }


    private function getAPIUrl($totalPrice){
        $req = $this->getPaypalAPI();

        $req = $req."&METHOD=SetExpressCheckout".
            "&CANCELURL=".urlencode("./?page=MonEspace").
            "&RETURNURL=".urlencode("./?page=abonnement").
            "&AMT=".$totalPrice.
            "&CURRENCYCODE=EUR".
            "&DESC=".urlencode("Abonnements Trottilib'").
            "&LOCALECODE=FR";

        return $req;
    }

    private function getPaypalAPI(){
# Thanks to http://openclassrooms.com/courses/paiement-en-ligne-par-paypal-1/integration-dans-php

        $api_paypal = 'https://api-3t.sandbox.paypal.com/nvp?';
        $version = 122.0;

        $user = 'paypal_api1.trottilib.fr';
        $pass = 'E3UD2E28D9B6YFDN';
        $signature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31Acxh08MjqO0tDDxaPQj4feGkvCB9';

        $api_paypal = $api_paypal.'VERSION='.$version.'&USER='.$user.'&PWD='.$pass.'&SIGNATURE='.$signature; // Ajoute tous les paramètres

        return 	$api_paypal; // Renvoie la chaîne contenant tous nos paramètres.
    }



}