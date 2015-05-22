<?php

class User extends Connexion {

    private $_conn;

    public function __construct() {
        $this->_conn = self::$db;
    }

    public function connect($email,$pass) {
        $request = $this->_conn->prepare('SELECT * FROM users WHERE email = :email');
        $request->execute ([
            'email' => $email,
        ]);
        $result = $request->fetch();

        if (!empty($result['salt'])) {

            $resultHash = $this->hashPassword($pass,$result['salt']);
            $pass = $resultHash['pass'];

            $request = $this->_conn->prepare('SELECT * FROM users WHERE nom = :name AND password = :password');
            $request->execute ([
                'name' => $result['nom'],
                'password' => $pass
            ]);
            $result = $request->fetch();
            if (!empty($result['id'])) {
                return $result;

            }
        }

        return false;
    }


    public function addUser($nom, $prenom, $email, $date_naissance, $pass, $adresse, $code_postal, $ville) {
        $nbUser = $this->countUserByPseudo($email);

        if (!$nbUser) {

            $resultHash = $this->hashPassword($pass,false);
            $pass = $resultHash['pass'];
            $salt = $resultHash['salt'];

            $request = $this->_conn->prepare('INSERT INTO users(nom, prenom, email, date_naissance, password, adresse, code_postal, ville, date_inscription, salt)
                                            VALUES (:nom, :prenom, :email, :date_naissance, :password, :adresse, :code_postal, :ville, NOW(), :salt)');
            $response = $request->execute ([
                'nom' => $nom,
                'prenom' => ucwords($prenom),
                'email' => $email,
                'date_naissance' => $date_naissance,
                'password' => $pass,
                'adresse' => $adresse,
                'code_postal' => $code_postal,
                'ville' => ucwords($ville),
                'salt' => $salt
            ]);

            return $response;
        } else {
            $response = false;
            return $response;
        }
    }

    public function getAdresseAndCodePostalById($id){
        $req = $this->_conn->prepare('SELECT adresse, code_postal, ville FROM users WHERE id = :id');
        $req->execute([
            'id' => $id,
        ]);

        return $req->fetch();
    }

    public function changeAdresse($id, $adresse, $code_postal, $ville){
        $req = $this->_conn->prepare('UPDATE users SET adresse = :adresse, code_postal = :code_postal, ville = :ville WHERE id = :id');
        $req->execute([
            'id' => $id,
            'adresse' => $adresse,
            'code_postal' => $code_postal,
            'ville' => $ville,
        ]);

        return $req->execute();
    }


    private function countUserByPseudo($email) {
        $request = $this->_conn->prepare('SELECT COUNT(*) as nbuser FROM users WHERE email = :email');
        $request->execute ([
            'email' => $email
        ]);
        $result = $request->fetch();

        return $result['nbuser'];
    }

    public function getIdUser($email) {
        $request = $this->_conn->prepare('SELECT id FROM users WHERE email = :email');
        $request->execute ([
            'email' => $email
        ]);
        $result = $request->fetch();

        return $result['id'];
    }

    private function hashPassword($password,$privateSalt) {
        $config = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/../app/config/config.yml'));

        if ($privateSalt == false) {
            $length = strlen($config['security']['secret']);
            $privateSalt = '';
            $count = 0; $max = 24;
            for (;;) {
                if ($count == $max)
                    break;
                $rand = mt_rand(0,$length -1);
                $privateSalt = $privateSalt . $config['security']['secret'][$rand];
                $count++;
            }
        }


        $password = hash('sha512', $password.$config['security']['secret'].$privateSalt);
        return [
            'pass' => $password,
            'salt' => $privateSalt
        ];
    }
}