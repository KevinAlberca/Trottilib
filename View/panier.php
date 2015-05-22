<?php if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])){?>

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
    for($i=0;$i<count($_SESSION['panier'])/3;$i++){
        echo '<tr>
            <td>'. $_SESSION['panier']['abonnement'].'</td>
            <td>'.count($_SESSION['panier']['abonnement']).'</td>
            <td>'. $_SESSION['panier']['duree']. ' jours</td>
            <td>'.$_SESSION['panier']['prix'].' € (euros)</td>
        </tr>';
    }
?>
        <tr>
            <td colspan="5" class="text-center"><button class="btn btn-primary">Payer</button></td>
        </tr>
    </tbody>
    </table>
</div>

<?php

    var_dump($_SESSION);

} else {
    header('Location: ./?page=abonnement');
    exit;
}