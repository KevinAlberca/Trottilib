<?php

    session_start();
    require_once('autoload.php');
    require_once('vendor/autoload.php');

    $routing = [
        'accueil' => [
            'controller' => 'accueil',
            'secure' => false,
        ],

        'abonnement' => [
            'controller' => 'abonnement',
            'secure' => false,
        ],

        'comment-ca-marche' => [
            'controller' => 'comment-ca-marche',
            'secure' => false,
        ],

        'plan' => [
            'controller' => 'plan',
            'secure' => false,
        ],

        'inscription' => [
            'controller' => 'inscription',
            'secure' => false,
        ],

        'connexion' => [
            'controller' => 'connexion',
            'secure' => false,
        ],

        'MonEspace' => [
            'controller' => 'MonEspace',
            'secure' => true,
        ],

        'panier' => [
            'controller' => 'panier',
            'secure' => true,
        ],

        'logout' => [
            'controller' => 'logout',
            'secure' => true,
        ],

        'paiement' => [
            'controller' => 'paypal/traitement',
            'secure' => true,
        ],

        'api' => [
            'controller' => 'paypal/fonction_api',
            'secure' => true,
        ],

        'return' => [
            'controller' => 'return',
            'secure' => true,
        ],

        'cancel' => [
            'controller' => 'cancel',
            'secure' => true,
        ],

        '404' => [
            'controller' => '404',
            'secure' => false,
        ],

    ];


function addMessageFlash($type, $message)
{
    // autorise que 4 types de messages flash
    $types = ['success','error','alert','info'];
    if (!in_array($type, $types)) {
        return false;
    }
    // on vérifie que le type existe
    if (!isset($_SESSION['flashBag'][$type])) {
        //si non on le créé avec un Array vide
        $_SESSION['flashBag'][$type] = [];
    }
    // on ajoute le message
    $_SESSION['flashBag'][$type][] = $message;
}


if(isset($_GET['page'])){
    $page = $_GET['page'];
    if(!isset($routing[$page])){
        $page = '404';
    }
} else {
    $page = 'accueil';
}

if ($routing[$page]['secure'] === true && !isset($_SESSION['user'])) {
    header("Location: ?page=connexion");
    exit;
}

$user = new User(Connexion::getPDO());
$abo = new Subscription(Connexion::getPDO());
$panier = new Basket(Connexion::getPDO());


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title><?php echo ucwords($page); ?> | Trottilib</title>
    <meta name="author" content="AwH" />
    <meta name="keywords" content="Mot, clefs" />
    <meta name="description" content="description de la page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./static/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="./static/css/fonts.css" />
    <link rel="stylesheet" href="./static/css/header.public.css" />
    <link rel="stylesheet" href="./static/css/style.public.css" />
    <link rel="stylesheet" href="./static/css/footer.public.css" />
    <link rel="stylesheet" href="./static/css/tab.main.css" />
    <script src="./static/js/jquery-2.1.3.min.js"></script>

</head>
<body>
<?php
    if($page != 'accueil'){
        require_once 'static/items/header.php';
    }

    require_once('View/'.$page.'.php');

    require_once 'static/items/footer.php';


?>



<script src="./static/js/bootstrap.min.js"></script>
<script src="./static/js/tab.js"></script>
<script src="./static/js/script.js"></script>
<script>
    $(function() {
        $('#myOwnTab').tabJs();
    });
</script>

</body>
</html>