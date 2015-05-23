<?php 

if(isset($_POST['paiement']) && !empty($_POST['paiement'])){
        for($i = 0; $i<count($_SESSION['panier']); $i++){
            @$prix = $prix + $_SESSION['panier'][$i]['prix'];
        }
        echo $prix;
        $_SESSION['paypal'] = [
            'prix' => $prix,
        ];

        require 'View/paypal/traitement.php';

}

if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])){?>
<div class="table-responsive">
<table class="table table-bordered table-stripped">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Quantité</th>
        <th>Durée</th>
        <th>Prix</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
<?php
    foreach($_SESSION['panier'] as $article){
        $del = mt_rand(1, 1000);
        echo '<tr>
            <td>'.$article['abonnement'].'</td>
            <td>'.count($article['abonnement']).'</td>
            <td>'.$article['duree']. ' jours</td>
            <td>'.$article['prix'].' € (euros)</td>
            <td><a href="?page=panier&del='.$del.'">Supprimer</a></td>
        </tr>';
    }

?>
        <tr>
            <td colspan="5" class="text-center">
                <form action="" method="POST">
                    <button type="submit" class="btn btn-primary">Payer</button>
                    <input type="hidden" name="paiement" value="paypal"/>
                </form>
            </td>
        </tr>
    </tbody>
    </table>
</div>
<?php
    if(isset($_GET['del']) && !empty($_GET['del'])){
        if(count($_SESSION['panier']) == 1){
            unset($_SESSION['panier']);
        }
        unset($_SESSION['panier'][$_GET['del']]['abonnement'], $_SESSION['panier'][$_GET['del']]['duree'], $_SESSION['panier'][$_GET['del']]['prix'], $_SESSION['panier'][$_GET['del']]);
    }

    if(isset($_POST['paiement']) && !empty($_POST['paiement'])){
        for($i = 0; $i<count($_SESSION['panier']); $i++){
            @$prix = $prix + $_SESSION['panier'][$i]['prix'];
        }
        echo $prix;
        $_SESSION['paypal'] = [
            'prix' => $prix,
        ];
    }


} //else {
  //  header('Location: ./?page=abonnement');
   // exit;
//}