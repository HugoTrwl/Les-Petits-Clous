     <div class="card" style="width: 25rem;margin: 0 auto; width: 400px;">
 
  <img src="<?= $listTutoFetched['lienRessource'] ?>" class="card-img-top" width="200" height="200">
  <div class="card-body">
    <h5 class="card-title" style="text-decoration: underline;"><?= $listTutoFetched['nomTuto'] ?></h5>
    <h6 class="card-title badge badge-success"><?= $listTutoFetched['niveau']?></h6>
    <br><b>Outils :</b>


   <!-- <img src="<?= $listTutoFetched['docPatron'] ?>" width="200" height="200">  --><!-- 
    <img src="<?= $listTutoFetched['lienRessource'] ?>" width="200" height="200"> -->
    <?php

    /*** Affichage des outils  ***/
    // permet de récupérer idOutil1, idOutil2 et idOutil3 de la table listoutil
    $listIdTool = $BDD -> query('SELECT * FROM listoutil WHERE idListOutil=' . $listTutoFetched['idListOutil']);

    // while : parcourir les résultats de la query de la variable $listIdTool
    while($listIdToolFetched = $listIdTool -> fetch()) {
        // permet de récupérer nomOutil de la table outillage
        $listTool = $BDD -> query('SELECT * FROM outillage WHERE idOutil IN (' . $listIdToolFetched['idOutil1'] . ', ' .
                                                                                $listIdToolFetched['idOutil2'] . ', ' .
                                                                                $listIdToolFetched['idOutil3'] . ')');

        // while : parcourir les résultats de la query de la variable $listTool -> affichage du nom des outils de chaque tuto
        while($listToolFetched = $listTool -> fetch()) {
             ?>  <font><?= $listToolFetched['nomOutil']?>,</font> <?php ' ';
        }
      ?><br><br><b>Matériaux : </b><?php
    }

    /*** Affichage des matériaux  ***/
    // permet de récupérer idMateriaux1, idMateriaux2 et idMateriaux3 de la table listmateriaux
    $listIdMaterial = $BDD -> query('SELECT * FROM listmateriaux WHERE idListMateriaux=' . $listTutoFetched['idListMateriaux']);

    // while : parcourir les résultats de la query de la variable $listIdMaterial
    while($listIdMaterialFetched = $listIdMaterial -> fetch()) {
        // permet de récupérer nomMateriaux de la table materiaux
        $listMaterial = $BDD -> query('SELECT * FROM materiaux WHERE idMateriaux IN (' . $listIdMaterialFetched['idMateriaux1'] . ', ' .
                                                                                        $listIdMaterialFetched['idMateriaux2'] . ', ' .
                                                                                        $listIdMaterialFetched['idMateriaux3'] . ')');

        // while : parcourir les résultats de la query de la variable $listMaterial -> affichage du nom des matériaux de chaque tuto
        while($listMaterialFetched = $listMaterial -> fetch()) {
            ?><font><?= $listMaterialFetched['nomMateriaux']?>,</font> <?php ' ';
        }

    }

    /*** Affichage des compétences  ***/
    // permet de récupérer idCompetence1, idCompetence2 et idCompetence3 de la table listcompetence
    $listIdCompetence = $BDD -> query('SELECT * FROM listcompetence WHERE idListCompetence=' . $listTutoFetched['idListCompetence']);

    // while : parcourir les résultats de la query de la variable $listIdCompetence
    while($listIdCompetenceFetched = $listIdCompetence -> fetch()) {
        // permet de récupérer nomCompetence de la table listcompetence
        $listCompetence = $BDD -> query('SELECT * FROM competence WHERE idCompetence IN (' . $listIdCompetenceFetched['idCompetence1'] . ', ' .
                                                                                        $listIdCompetenceFetched['idCompetence2'] . ', ' .
                                                                                        $listIdCompetenceFetched['idCompetence3'] . ')');
        // echo '/ liste compétences : ';

        // // while : parcourir les résultats de la query de la variable $listCompetence -> affichage du nom des compétences de chaque tuto
        // while($listCompetenceFetched = $listCompetence -> fetch()) {
        //     echo $listCompetenceFetched['nomCompetence'] . ' ';
        // }
    }
?>  
 
<br><br>
    <b class="card-title"><?= $listTutoFetched['temps'] ?> heure(s)</b>

   
  </div>
</div>
<br>


   