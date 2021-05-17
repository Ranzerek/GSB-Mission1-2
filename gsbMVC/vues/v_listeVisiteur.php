<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>


<?php 




?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <center><h2>Liste des visiteurs</h2></center><br />
        <form id="vueAdmin" action="index.php?uc=gererFrais&action=adminValider&admin=<?php echo $_SESSION['statut']; ?>&login=<?php echo $_SESSION['login']; ?>&mdp=<?php echo $_SESSION['mdp']; ?>" method="POST" style="text-align: center;">
        <select id="idVisiteur" name="idvisiteur">
             <?php
             $lesVisiteur = $pdo->getVisiteur();
             foreach($lesVisiteur as $unVisiteur) { ?> 
            <option value="<?php  echo $unVisiteur['id'] ?>"><?php echo $unVisiteur['nom']; ?>  
             
       
           
            </option>
			<?php } ?>        
             
        </select>
        <br /><br /><br/>
        <select name="moisVisiteur">
               <?php $mois = $pdo->getMois();
               
               foreach($mois as $unMois ) { ?>

                <option value="<?php echo $unMois['mois'] ?>"><?php echo $unMois['mois']?>
                </option>

               <?php } ?>

        </select>

            <br /><br /><br/>
            <input type="submit" value="Voir fiche" />
    
        </form>
      
        
    </body>
</html>