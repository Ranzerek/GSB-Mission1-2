<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idComptable = $_SESSION['idComptable'];
switch($action){
    case 'choisirVisiteur' :{
        $lesVisiteur=$pdo->getLesVisiteur($idComptable);
        $lesCles = array_keys($lesVisiteur);
        $visiteurASelectionner = $lesCles[0];
        include('vues/v_listeVisiteur.php');
        
        break;
    }
    
    case 'selectionnerMois' : {
        $leVisiteur = $_REQUEST['lstVisiteur'];
        $_SESSION['id'] = $leVisiteur;
        $lesMois =$pdo->lesMoisDisponiblesCL($leVisiteur);
        $lesCles = array_keys($lesMois);
        if ($lesCles!=null){
            $moisASelectionner = $lesCles[0];
            include('vues/v_listeMois.php');
        }
        break;
    }
    case 'voirEtatFrais':{
                $leVisiteur = $_SESSION['id'];
		$leMois = $_REQUEST['lstMois']; 
		$lesMois =$pdo->lesMoisDisponiblesCL($leVisiteur);
		$moisASelectionner = $leMois;
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($leVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($leVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($leVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("vues/v_etatFrais.php");
	}
    case 'validerFrais':{
        $idVisiteur =$_SESSION['id'];
        $mois = $_REQUEST['mois'];
        $valider = $pdo->majEtatValFiche($idVisiteur,$mois);
        echo "Fiche passe de CL à VA";
        break;
    }
    
        
        
        
    
    
   
        
        
}

?>
