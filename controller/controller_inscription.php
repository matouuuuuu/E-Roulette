<?php

//Inclu le fichier ou se trouve toute les fonctions pour agir sur la table Player de la BD
require_once('../model/DAO_Player.php');

//Création d'un Objet DAO_Player
$dao = new DAO_Player();

//Lancement de la session
session_start();


/*
Permet de verifier les informations saisies par l'utilisateur, et de verifier que le nom d'utilisateur n'est pas encore utiliser
alors insérer un nouveau joueur dans la table roulette, et création d'un objet joueur qui sera stocker dans la session, et qui
envoie l'utilisateur vers la page roulette 
*/
if (isset($_POST['btnconnexion'])) {
    $message = null;
    if (isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['userpassword']) && $_POST['userpassword'] != '') {
        $name = $_POST['username'];
        $password = $_POST['userpassword'];
        if($dao->verifUtilisateur($name,$password) == false){
            $dao->ajoutPlayer($name, $password);
            $_SESSION['user'] = $dao->getUser($name);
            header('Location: ../controller/controller_roulette.php');
        } else {
            $message = "Vous ne pouvez pas utiliser ce nom d'utilisateur car il est déja prit.";
        }    
    } else {
        $message = "Un champ est mal rempli.";
    }
}

//Titre de la page
$title = 'Inscription';

//Inclu toutes les vues HTML de la page Inscription
include('../vue/start.php');
include('../vue/inscription.php');
include('../vue/end.php');