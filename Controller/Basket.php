<?php

class Basket extends Connexion {

    public function __construct(){

    }

    public function addToBasket($article){
        array_push($_SESSION['panier'], $article);

        return $_SESSION['panier'];
    }

    public function showMyBasket(){
        return $_SESSION['panier'];
    }

    public function cleanMyBasket(){
        unset($_SESSION['panier']);
        return $_SESSION['panier'];
    }

}