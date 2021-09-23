<?php
require_once('DAO_Game.php');

class DAO_Game {
    private $bdd;

    public function __construct(){
        try{
            $this->bdd = new PDO('mysql:host=127.0.0.1:8889;dbname=roulette;charset=UTF8', 'p1914655', '460454');
        } catch(Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
    }

    //Fonction permettant d'ajouter une partie dans la table Game, en prenant en paramètre un ID une Mise et un Gain
    public function ajoutPartie($id, $bet, $profit) {
        try{
            $requete = $this->bdd->prepare('INSERT INTO Game (player, bet, profit) VALUES (?, ?, ?);');
            $requete->execute([$id, $bet, $profit]);
        }
        catch (Exception $e) {
            die('Erreur : Impossible de se connecter('.$e->getMessage().')');
        }
    }
}