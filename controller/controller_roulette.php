<?php

//Inclu les fichiers ou se trouvent toutes les fonctions pour agir sur la table Player et Game de la BD
require_once("../model/DAO_Game.php");
require_once("../model/DAO_Player.php");

//Lancement de la session
session_start();

//Création d'un objet DA0_Player et DAO_Game
$daoPlayer = new DAO_Player();
$daoGame = new DAO_Game();


//Permet de sécuriser la page pour empêcher d'accéder à la page roulette sans s'être connecté, en vérifiant si une session à été crée
if (isset($_SESSION['user'])) {

    //Met l'objet stocké dans $_SESSION['user'] dans la variable $user
    $user = $_SESSION['user'];

    //Récupère le montant de l'utilisateur dans Player
    $user->money = $daoPlayer->recupMoney($user->id);

    //Vérifie si l'utilisateur possède bien de l'argent pour pouvoir jouer
    if ($user->money == 0) {

        $info = "Vous n'avez plus d'argent sur votre compte veuillez créditer votre compte.";

    } else {

        if (isset($_POST['btnjouer'])) {
            $gain = 0;
            $user->money = $daoPlayer->recupMoney($user->id);
            $nombreal = rand(1, 36);

            if (isset($_POST['mise']) && $_POST['mise'] != 0) {

                if ($_POST['mise'] > $user->money || $_POST['mise'] < 0) {

                    $info = 'Vous ne disposez pas de cette argent.';
                    $nombreal = null;
                } else {

                    if (isset($_POST['chx_nombre']) && $_POST['chx_nombre'] != '') {
                        if ($_POST['chx_nombre'] >= 1 && $_POST['chx_nombre'] <= 36) {

                            $user->money = $user->money - $_POST['mise'];
                            $daoPlayer->updateMoney($user->money,$user->id);

                            if ($nombreal == $_POST['chx_nombre']) {
                                $gain = $_POST['mise'] * 35;
                                $mes = "Bravo, vous avez gagné " . $gain . "€";
                                $user->money = $user->money + $gain;
                                $daoPlayer->updateMoney($user->money, $user->id);
                                $daoGame->ajoutPartie($user->id, $_POST['mise'], $gain);
                            } else {
                                $mes = 'Dommage, vous avez perdu!';
                                $daoGame->ajoutPartie($user->id, $_POST['mise'], $gain);
                            }
                        } else {
                            $info = 'Veuillez rentrer un nombre entre 1 et 36.';
                            $nombreal = null;
                        }
                    } else {
                        if (isset($_POST['parite'])) {
                            $user->money = $user->money - $_POST['mise'];
                            $daoPlayer->updateMoney($user->money, $user->id);

                            if ($_POST['parite'] == 'paire' && $nombreal % 2 == 0) {
                                $gain = $_POST['mise'] * 2;
                                $mes = "Bravo, vous avez gagné " . $gain . "€";
                                $user->money = $user->money + $gain;
                                $daoPlayer->updateMoney($user->money, $user->id);
                                $daoGame->ajoutPartie($user->id, $_POST['mise'], $gain);
                            } elseif ($_POST['parite'] == 'impaire' && $nombreal % 2 == 1) {
                                $gain = $_POST['mise'] * 2;
                                $mes = "Bravo, vous avez gagné " . $gain . "€";
                                $user->money = $user->money + $gain;
                                $daoPlayer->updateMoney($user->money, $user->id);
                                $daoGame->ajoutPartie($user->id, $_POST['mise'], $gain);
                            } else {
                                $mes = 'Dommage, vous avez perdu!';
                                $daoGame->ajoutPartie($user->id, $_POST['mise'], $gain);
                            }
                        } else {
                            $info = 'Veuillez choisir un type de mise.';
                            $nombreal = null;
                        }
                    }
                }
            } else {
                $info = 'Erreur dans la saisi de votre mise.';
                $nombreal = null;
            }
        }
    }
    
    //Titre de la page
    $title = 'Roulette';

    //Inclu toutes les vues de la page roulette
    include('../vue/start.php');
    include('../vue/roulette.php');
    include('../vue/end.php');

} else {
    header('Location: ../controller/controller_connexion.php?con');
}


