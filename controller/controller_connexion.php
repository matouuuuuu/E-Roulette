<?php

//Inclu le fichier ou se trouve toute les fonctions pour agir sur la table Player de la BD
require_once('../model/DAO_Player.php');

//Création d'un Objet DAO_Player
$dao = new DAO_Player();

//Lancement de la session
session_start();

/*
Permet de vérifier les informations saisis par l'utilisateur après un appui sur le bouton Connexion, si les informations saisis sont correctes
alors création d'un objet Player qui sera stocker dans la session et qui contiendra l'ensemble des attributs de l'objet, et qui envoie l'utilisateur
vers la page roulette
*/
if (isset($_POST['btnconnexion'])) {
    $message = '';
    $username = $_POST['username'];
    $password = $_POST['userpassword'];
    if (isset($_POST['username']) && $username != '' && isset($_POST['userpassword']) && $password != '') {
        if ($dao->verifUtilisateur($username, $password) == true) {
            if($dao->verifPassword($username,$password) == true){
            $_SESSION['user']=$dao->getUser($username);
            header('Location: ../controller/controller_roulette.php');
            } else {
                $message = "Mot de passe incorrect.";
            }
        } else {
            $message = "Nom d'utilisateur inconnu.";
        }
    } else {
        $message = 'Un champ est mal remplie!';
    }
}

//Destruction de la session si l'utilisateur se déconnecte de la roulette
if (isset($_GET['deco'])) {
    session_destroy();
}

//Sécurisation de la page, pour ne pas pouvoir accèder au jeu sans se connecter
if (isset($_GET['con'])) {
    $message = "Bien essayer, mais vous devez d'abord vous connecter.";
}

//Titre de la page
$title = "Connexion";

//Inclusion de toutes le vues HTML
include('../vue/start.php');
include('../vue/connexion.php');
include('../vue/end.php');

