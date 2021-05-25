<?php

include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idComptable = $_SESSION['idComptable'];
switch($action){
    case "choisirVisiteur":

        $lesVisiteur=$pdo->getLesVisiteur($idComptable);
        $lesCles = array_keys($lesVisiteur);
        $visiteurASelectionner = $lesCles[0];
        include("vues/v_listeVisiteurPaiement.php");
    break;
    case "affichageFiches":
        $leVisiteur = $_REQUEST['lstVisiteur'];
        $_SESSION['id'] = $leVisiteur;
        $lesFiches = $pdo->getLesFichesFrais($leVisiteur);
        include("vues/v_ficheFrais.php");
        //var_dump($lesFiches);
    break;

    case 'pdf' :
        $idVisiteur = $_SESSION['id'];
        $comptable = $_SESSION['nom']." ".$_SESSION['prenom'];
        $visiteur = $pdo-> getInfosVisiteur($idComptable);
        $leMois= $_GET['mois'];
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $numAnnee = substr($leMois,0,4);
        $numMois = substr($leMois,4,2);
        $libEtat = $lesInfosFicheFrais['idEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = $lesInfosFicheFrais['dateModif'];
        include('vues/v_pdf.php');
        creerPdf($lesFraisForfait,$lesFraisHorsForfait,$numAnnee,$numMois,$libEtat,$montantValide,$nbJustificatifs,$comptable,$visiteur);
        break;


    }
    
        

