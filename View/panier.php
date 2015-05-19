<?php if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])){?>

<table border style="text-align:center;">
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
        <tr>
            <td><?php echo $_SESSION['panier']['abonnement']; ?></td>
            <td><?php echo count($_SESSION['panier']['abonnement']); ?></td>
            <td><?php echo $_SESSION['panier']['duree']; ?></td>
            <td><?php echo $_SESSION['panier']['prix']; ?></td>
            <td><a href="?page=<?php echo $_GET['page']; ?>&del=<?php echo $_SESSION['panier']['abonnement']; ?>">Suppression</a></td>
        </tr>
    </tbody>
    </table>

<?php

    var_dump($_GET);

    if (isset($_GET['del']) == $_SESSION['panier']['abonnement']) {
        echo 'on supprime';
        unset($_SESSION['panier']);
    }
}