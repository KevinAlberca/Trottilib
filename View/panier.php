<?php if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])){

    $panier = $_SESSION['panier'];
?>

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
    for($i=0;$i<count($panier);$i++){
        echo '<tr>
            <td>'.$panier[$i]['abonnement'].'</td>
            <td>'.count($panier[$i]['abonnement']).'</td>
            <td>'.$panier[$i]['duree']. ' jours</td>
            <td>'.$panier[$i]['prix'].' € (euros)</td>
            <td><a href="?page=panier&del='.$i.'">Supprimer</a></td>
        </tr>';
    }
?>
        <tr>
            <td colspan="5" class="text-center">
                <form action="" method="POST">
                    <button type="submit" class="btn btn-primary">Payer</button>
                    <input type="hidden" name="paiement" value="paypal"/>
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
    }


} else {
    header('Location: ./?page=abonnement');
    exit;
}