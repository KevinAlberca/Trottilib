<div class="col-xs-10 col-sm-offset-1 col-sm-10">
	<h2 class="title">Tous les abonnements <br /> <small>4 offres disponibles</small></h2>

        <?php

$a = $abo->showAllSubscription();
for($i=0;$i<count($a);$i++){

    if($a[$i][3] == 360){
        $a[$i][3] = str_replace(360, ' par an', $a[$i][3]);
    } else if ($a[$i][3] == 1){
        $a[$i][3] = str_replace(1, ' par jour', $a[$i][3]);
    }?>
    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-3 abonnements">
        <form method="POST">
            <h1><?php echo $a[$i][1]; ?></h1>
            <span class="prix"><?php echo $a[$i][2]; ?> €</span>
            <span class="duree"><?php echo $a[$i][3]; ?></span><br />
            <span class="content"><?php echo $a[$i][4]; ?></span>
            <input type="hidden" name="abonnement" value="<?php echo $a[$i][1]; ?>'" />
            <input type="hidden" name="duree" value="<?php echo $a[$i][2]; ?>'" />
            <input type="hidden" name="prix" value="<?php echo $a[$i][3]; ?>'" />
            <input type="submit" value="Commandez maintenant" class="btn btn-block btn-commande" />
        </form>
    </div>
<?php
}
/*
        if(isset($_POST) && !empty($_POST)){
            echo "on va ajouter cette offre  : \"".$_POST['abonnement']. "\" a notre panier";
            $panier->addToBasket($_POST['abonnement']);

            $_SESSION['panier'] = array_push($_SESSION['panier'], [
                'abonnement' => $_POST['abonnement'],
                'duree' => $_POST['duree'],
                'prix' => $_POST['prix'],
            ]);
        }
*/
?>
</div>
<div class="clearfix"></div>
