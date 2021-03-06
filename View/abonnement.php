<div class="row">
    <div class="container-fluid">
        <h2 class="title">Tous les abonnements <br /> <small>4 offres disponibles</small></h2>

        <?php

        $a = $abo->showAllSubscription();


        for($i=0;$i<count($a);$i++){

            if($a[$i]['duree'] == 360){
                $a[$i]['duree'] = str_replace(360, ' par an', $a[$i]['duree']);
            } else if ($a[$i]['duree'] == 90){
                $a[$i]['duree'] = str_replace(90, ' pour 3 mois', $a[$i]['duree']);
            }
            else if ($a[$i]['duree'] == 30){
                $a[$i]['duree'] = str_replace(30, ' pour 1 mois', $a[$i]['duree']);
            }
            else if ($a[$i]['duree'] == 1){
                $a[$i]['duree'] = str_replace(1, ' par jour', $a[$i]['duree']);
            }?>
            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-3 abonnements">
                <form method="POST">
                    <h1><?php echo $a[$i]['nom']; ?></h1>
                    <span class="prix"><?php echo $a[$i]['prix']; ?> €</span>
                    <span class="duree"><?php echo $a[$i]['duree']; ?></span><br />
                    <p class="content"><?php echo $a[$i]['contenu']; ?></p>
                    <input type="hidden" name="id_abonnement" value="<?php echo $a[$i][0]; ?>" />
                    <input type="hidden" name="abonnement" value="<?php echo $a[$i][1]; ?>" />
                    <input type="hidden" name="duree" value="<?php echo $a[$i][2]; ?>" />
                    <input type="hidden" name="prix" value="<?php echo $a[$i][3]; ?>" />
                    <input type="submit" value="Ajouter au panier" class="btn btn-block btn-commande" />
                </form>
            </div>
        <?php
        }

        if(isset($_POST) && !empty($_POST)){
            addMessageFlash('success', 'L\'offre  : " '.$_POST['abonnement']. ' " a été ajoutée à votre panier');

            if(!isset($_SESSION['panier'])){
                $_SESSION['panier'] = [];
            }

            $panier->addToBasket($_POST);

            echo '<p class="successBlock">'. end($_SESSION['flashBag']['success']) . '</p>';

        } elseif(isset($_POST) && !empty($_POST) && empty($_SESSION)){
            header('Location : ./?page=connexion');
        }

        ?>
</div>