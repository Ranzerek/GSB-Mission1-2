
    <form action="index.php?uc=validerFrais&action=" method="post">
        <h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
    <div class="encadre">
    <p>
        Etat : <?php ?><?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>
              
                     
    </p>
    <center>
    <div>
        <div>
  	<table class="listeLegere">
  	   <caption>Eléments forfaitisés </caption>
        <tr>
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) 
		 {
			$libelle = $unFraisForfait['libelle'];
		?>	
			<th> <?php echo $libelle?></th>
                        
		 <?php
        }
		?>
        
        </tr
        <center>
        <tr>
        <?php
        
          foreach (  $lesFraisForfait as $unFraisForfait  ) 
		  {
				$quantite = $unFraisForfait['quantite'];
		?>
                <td><?php echo $quantite?></td>
               
                
		 <?php
          }
           
		?>
              <td> <a class=btn btn-primary href="index.php?uc=gererFrais&action=saisirFrais">Actualiser</a></td>
                
        </tr> 
        </table>
        </div>
        
    </div>
    
        
  	<table class="listeLegere">
  	   <caption>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -
       </caption>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>                
             </tr>
        <?php      
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
		  {
			$date = $unFraisHorsForfait['date'];
			$libelle = $unFraisHorsForfait['libelle'];
			$montant = $unFraisHorsForfait['montant'];
                        $idFrais = $unFraisHorsForfait['id'];
                  
                    
                  ?>
             <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                
                
                <td> <a class=btn btn-primary href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php $idFraiS?>">Supprimer</a></td>
                <?php } ?> 
             </tr>
             <td> <a class=btn btn-primary href="index.php?uc=validerFrais&action=validerFrais">Valider</a></td>
             
             

    </table>
    </center>
        </div>
</form>
 
