<?php

class Subscription extends Connexion{

    public function __construct(){

    }

    public function subscribe($id, $abonnement, $duree){
        $req = self::$db->prepare('INSERT INTO abonnement_par_user(id_user, id_abonnement, date_debut, date_fin) VALUES (:id_user, :id_abonnement, NOW(), :date_fin)');
        $req->execute([
            'id_user' => $id,
            'id_abonnement' => $abonnement,
            'date_fin' => 'NOW()'.$duree,
        ]);

        return $req->fetch();
    }
	
	public function showAllSubscription(){
        $req = self::$db->prepare('SELECT * FROM abonnement');
        $req->execute();


        return $req->fetchAll();
	}

    public function showMySubscription($id){
        $req = self::$db->prepare('SELECT * FROM abonnement WHERE user_id = :id');
        $req->execute([
            'id' => $id,
        ]);

        return $req->fetch();
    }
}