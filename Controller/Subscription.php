<?php

class Subscription extends Connexion{

    public function __construct(){

    }

    public function subscribe($id, $abonnement, $duree){
        $req = self::$db->prepare('INSERT INTO abonnement_par_user(id_user, id_abonnement, date_debut, date_fin) VALUES (:id_user, :id_abonnement, NOW(), current_date + INTERVAL :duree DAY)');
        $req->execute([
            'id_user' => $id,
            'id_abonnement' => $abonnement,
            'duree' => $duree,
        ]);

        return $req->fetch();
    }
	
	public function showAllSubscription(){
        $req = self::$db->prepare('SELECT * FROM abonnement');
        $req->execute();


        return $req->fetchAll();
	}

    public function showMySubscription($id){
        $req = self::$db->prepare('SELECT a.nom, DATE_FORMAT(app.date_debut, "%d %M %Y") as date_debut, app.date_fin FROM abonnement_par_user app INNER JOIN abonnement a ON a.id = app.id_abonnement WHERE id_user = :id');
        $req->execute([
            'id' => $id,
        ]);

        return $req->fetchAll();
    }
}