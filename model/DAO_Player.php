<?php
require_once('DTO_Player.php');

class DAO_Player
{
    private $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=roulette;charset=UTF8', 'p1914655', '460454');
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    
    //Fonction permettant d'insèrer un joueur dans la table Player, avec en paramètre un Nom et un Mot de passe
    public function ajoutPlayer($name, $password)
    {
        try {
            $sql = 'INSERT INTO Player (name, password) VALUES (?, ?);';
            $requete = $this->bdd->prepare($sql);
            $requete->execute([$name, $password]);
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }

    //Fonction permettant de mettre à jour le montant du joueur, avec son Id
    public function updateMoney($money, $id)
    {
        try {
            $query = $this->bdd->prepare('UPDATE Player SET money = :montant WHERE id = :player');
            $query->execute(['montant' => $money, 'player' => $id]);
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }

    //Fonction permettant de récupérer l'argent du joueur avec son Id
    public function recupMoney($id)
    {
        try {
            $query = $this->bdd->prepare('SELECT money FROM Player WHERE id = :player');
            $query->execute(['player' => $id]);
            $result = $query->fetch();
            $money = $result['money'];
            return $money;
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }

    //Fonction permettant de récupérer l'Id du joueur avec son Id
    public function recupId($name)
    {
        try {
            $query = $this->bdd->prepare('SELECT id FROM Player WHERE name = :username');
            $query->execute(['username' => $name]);
            $result = $query->fetch();
            $id = $result['id'];
            return $id;
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }

    //Fonction permettant de vérifier si un joueur utilise déja ce nom d'utilisateur
    public function verifUtilisateur($name, $password)
    {
        try {
            $query = $this->bdd->prepare('SELECT name FROM Player WHERE name = :username');
            $query->execute(['username' => $name]);
            $data = $query->fetch();
            if (!$data) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }
    
    //Fonction permettant de vérifier si le mot de passe et le nom son correcte
    public function verifPassword($name, $password)
    {
        try {
            $requete = $this->bdd->prepare('SELECT name, password FROM Player WHERE name = :username AND password = :pass');
            $requete->execute(['username' => $name, 'pass' => $password]);
            $data = $requete->fetch();
            if (!$data) {
                return false;
            } else {
                return true;
            }
            
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }

    //Créer un objet Player contenant toute les informations du joueur
    public function getUser($name){
        try {
            $query = $this->bdd->prepare('SELECT * FROM Player WHERE name = :username');
            $query->execute(['username' => $name]);
            $result = $query->fetch();
            $user = new Player($result['id'],$result['name'],$result['password'], $result['money']);
            return $user;
        } catch (Exception $e) {
            die('Erreur : Impossible de se connecter(' . $e->getMessage() . ')');
        }
    }
}
    
