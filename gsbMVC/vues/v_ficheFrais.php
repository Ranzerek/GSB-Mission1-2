
<form action="index.php?uc=paiement&action=V" method="post">
    <div class="encadre">
        <center>
            <table class="table">
                <thead>
                    <tr>
                       
                        <th scope="col">Mois</th>
                        <th scope="col">nombre de justificatifs</th>
                        <th scope="col">Montant validé</th>
                        <th scope="col">Remboursement</th>
                        <th scope="col">PDF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($lesFiches as $key => $uneFiche){
                        $mois = $uneFiche['mois'];
                        $nbJustificatifs = $uneFiche['nbJustificatifs'];
                        $montantValide = $uneFiche['montantValide'];
                        ?>
                        <tr>
                            <td><?php echo $mois ?></td>
                            <td><?php echo $nbJustificatifs ?></td>
                            <td><?php echo $montantValide ?></td>
                            <td> <input type="checkbox"></td>
                            <td><a href="index.php?uc=paiement&action=pdf&mois=<?php echo $mois ?>"><img src="images/adobe_pdf_document_14979.png" /></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </center>
    </div>
</form>
