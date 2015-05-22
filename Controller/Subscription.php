<?php

class Subscription extends Connexion{

    public function __construct(){

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