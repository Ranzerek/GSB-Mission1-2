<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = md5($_REQUEST['mdp']);
        $statut = $_REQUEST['statut'];
    
                 
                if($statut == "visiteur")
                {
                    $visiteur = $pdo->getInfosVisiteur($login,$mdp);
                    if(!is_array($visiteur)){
                    ajouterErreur("Login ou mot de passe incorrect");
                    include("vues/v_erreurs.php");
                    include("vues/v_connexion.php");
                                      
                    }else{
                        $id = $visiteur['id'];
                        $nom =  $visiteur['nom'];
                        $prenom = $visiteur['prenom'];
                        connecter($id,$nom,$prenom);
                        include("vues/v_sommaire.php");
                        
                        }
                }
                
                
                else
                {
                    if($statut == "comptable")
                   {
                       $comp = $pdo->getInfosComptable($login,$mdp);
                       if(!is_array($comp)){
                    ajouterErreur("Login ou mot de passe incorrect");
                    include("vues/v_erreurs.php");
                    include("vues/v_connexion.php");
                                      
                    }else{
                        $id = $comp['id'];
                        $nom =  $comp['nom'];
                        $prenom = $comp['prenom'];
                        connecter($id,$nom,$prenom);
                        include('vues/v_sommaireComptable.php');
                        include("vues/v_listeVisiteur.php");    
                        
                        }
                   }
                }
               
              
		break;
             }
             
             
        
                
              
	default :{
		include("vues/v_connexion.php");
		break;
	}


}
?>