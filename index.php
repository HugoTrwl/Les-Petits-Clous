<?php
$BDD = new PDO('mysql:host=localhost; dbname=les_petits_clous;', 'root');
$listTuto = $BDD -> query('SELECT * FROM tuto');

$search = '';

$materiaux = $BDD -> query('SELECT * FROM materiaux');

$outillage = $BDD -> query('SELECT * FROM outillage');

$listMateriaux = $BDD -> query('SELECT nomMateriaux, idListMateriaux FROM materiaux, listmateriaux WHERE idMateriaux = idMateriaux1 OR idMateriaux = idMateriaux2 OR  idMateriaux = idMateriaux3');



 

$countlistMaterial = $BDD -> query('SELECT COUNT(*) FROM listmateriaux');
$donnees = $countlistMaterial->fetch();
$countlistMaterial->closeCursor();


 $countlistOutil = $BDD -> query('SELECT COUNT(*) FROM listoutil');
$donneesOutil = $countlistOutil->fetch();
$countlistOutil->closeCursor();
 



                      

if(isset($_GET['keywords']) AND !empty($_GET['s'])) {
    $search = htmlspecialchars($_GET['s']);
    $listTuto = $BDD -> query('SELECT * FROM tuto WHERE nomTuto LIKE "%'.$search.'%"');
}

$searchLevel = '';
if(isset($_GET['levelSelection'])) {
    $searchLevel = htmlspecialchars($_GET['levelSelection']);
}

$searchListMateriaux = '';
if(isset($_GET['materiaux'])) {
    $searchListMateriaux = htmlspecialchars($_GET['materiaux']);
}

$searchListOutils = '';
if(isset($_GET['outils'])) {
    $searchListOutils = htmlspecialchars($_GET['outils']);
}

if(isset($_GET['outilsMat']) AND !empty($_GET['outils']) AND !empty($_GET['materiaux'])){
  $listTutoOutilsMat = $BDD -> query('SELECT * FROM tuto WHERE idListOutil = '.$searchListOutils.' AND idListMateriaux = '. $searchListMateriaux);
}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
    <title>Rechercher un tutoriel</title>
</head>
<body>
  <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark" style="background-color: blueviolet;">
        <img src="images/les_ptits_clous.png" style="height: 50px;width: auto;">
           <a class="navbar-brand" href="#">Les P'tits Clous</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect waves-light" href="#">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
             <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="login.html" style="color: white">
              <i class=""></i> Connexion</a>
          </li>
        </ul>

      </div>
    </nav>
    <!--/.Navbar -->

        
    
    <!-- START : Formulaire / Barre de recherche -->

    <form class="form-inline" style="text-align: center;" method="get">

        <div class="card text-center col-md-12">
  <div class="card-header">
    <h3 style="text-align: center;"> Bienvenue sur le moteur de recherche by Les P'tits Clous !</h3>
  </div>
  <div class="card-body">
           <input class="form-control mr-sm-2" type="search" name="s" placeholder="Rechercher un tuto" autocomplete="off">     <label for="level">Niveau</label>
                    <select name="levelSelection" id="level">
                        <option value="Facile">Facile</option>
                        <option value="Normal">Normal</option>
                        <option value="Difficile">Difficile</option>
                    </select>
  </div>
</div>  



<div class="row col-md-12">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
           <div>
            <legend>Veuillez sélectionner les outils à votre disposition</legend>
           <!--  <select multiple="multiple" id="outils" class="form-control" >
                    <?php while ($row = $outillage ->fetch()):?>
                      <option value="<?php echo $row[0];?>"><?php echo $row[1]; ?></option>
                    <?php endwhile ?>
                  </select> -->
             <select id="outils" name="outils" class="form-control">

                  <?php
                   $iterationo = 0;
                    for ($i=0; $i < $donneesOutil[0] ; $i++) {
                        
                        $iterationo ++;
                        $listIdDeroulOutil = $BDD -> query('SELECT * FROM listoutil WHERE idListOutil=' . $iterationo);
                        while($listIdDeroulOutilFetched = $listIdDeroulOutil -> fetch()) {
                                // permet de récupérer nomMateriaux de la table materiaux
                       $listDeroulOutil = $BDD -> query('SELECT * FROM outillage WHERE idOutil IN (' . $listIdDeroulOutilFetched['idOutil1'] . ', ' .
                                                                                                                $listIdDeroulOutilFetched['idOutil2'] . ', ' .
                                                                                                              $listIdDeroulOutilFetched['idOutil3'] . ')');
                                         
        }
                                            ?> 
                 <option value="<?php echo $iterationo;?>"><?php while($listDeroulOutilFetched = $listDeroulOutil -> fetch()): echo $listDeroulOutilFetched['nomOutil'];?>,<?php endwhile ?></option>       
                  <?php } ?> 
                
                </select>
            </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
           <legend>Veuillez sélectionner les matériaux à votre disposition</legend>
            <div>
          <!--   <select id="materiaux" class="form-control">
                    <?php while ($row = $materiaux ->fetch()):?>
                      <option value="<?php echo $row[0];?>"><?php echo $row[1]; ?></option>
                    <?php endwhile ?>
                  </select> -->
                      <select id="materiaux" name="materiaux" class="form-control">

                  <?php
                   $iteration = 0;
                    for ($i=0; $i < $donnees[0] ; $i++) {
                        
                        $iteration ++;
                        $listIdDeroulMat = $BDD -> query('SELECT * FROM listmateriaux WHERE idListMateriaux=' . $iteration);
                        while($listIdDeroulMaterialFetched = $listIdDeroulMat -> fetch()) {
                                // permet de récupérer nomMateriaux de la table materiaux
                       $listDeroulMaterial = $BDD -> query('SELECT * FROM materiaux WHERE idMateriaux IN (' . $listIdDeroulMaterialFetched['idMateriaux1'] . ', ' .
                                                                                                                $listIdDeroulMaterialFetched['idMateriaux2'] . ', ' .
                                                                                                              $listIdDeroulMaterialFetched['idMateriaux3'] . ')');
                                         
        }
                                            ?> 
                 <option value="<?php echo $iteration;?>"><?php while($listDeroulMaterialFetched = $listDeroulMaterial -> fetch()): echo $listDeroulMaterialFetched['nomMateriaux'];?>,<?php endwhile ?></option>       
                  <?php } ?> 
                
                </select>
            </div>
      </div>
    </div>
  </div>
</div>


        <div style="margin: 0 auto; width: 200px; padding: 10px;">
            <button type="submit" class="btn btn-outline-success" name="keywords">Recherche par mot clés</button>
        </div>
        <div style="margin: 0 auto; width: 200px; padding: 10px;">
            <button type="submit" class="btn btn-outline-success" name="outilsMat">Recherche par outils et matériaux</button>
        </div>
    </form>


    <form action="/les_petits_clous/" method="post" style="text-align:center;">
        <input type="submit" name="reset" value="Réinitialiser">
    </form>
    <br>

    <!-- END : Formulaire / Barre de recherche -->

    <!-- START : Liste résultats -->

    <section class="show_tuto" style="text-align:center;">
        <?php
            // if : vérification que la recherche donne au moins un résultat
            if($listTuto -> rowCount() > 0) {
                // while : parcourir les résultats de la query de la variable $listTuto
                while($listTutoFetched = $listTuto -> fetch()) {
                    // if : vérification qu'un niveau a été sélectionné
                    if(isset($_GET['levelSelection'])) {
                        // if : vérification que le niveau indiqué correspond à celui dans la BDD
                        if($searchLevel == $listTutoFetched['niveau']) {
                            ?>
                            <p>
                                <?php require('showResult.php') ?>
                            </p>
                            <?php
                        } else {
                            ?>
                            <h5>Un tutoriel a été trouvé mais le niveau ne correspond pas...</h5>
                            <?php
                        }
                    // else : affichage par défaut de la page ou quand on clique sur Réinitialiser
                    } else {
                        ?>
                        <p>
                            <?php require('showResult.php') ?>
                        </p>
                        <?php
                    }
                }
            } else {
                ?>
                <h3>Aucun tutoriel ne correspond à votre recherche</h3>
                <p>Vous n'arrivez pas à trouver de tutoriels ? Accèdez à Google avec le moteur de recherche by Les P'tits Clous !</p>
                <script async src="https://cse.google.com/cse.js?cx=60e83855cfc5e4371"></script>
                <div style="margin: 0 auto; width: 1000px;">
                 <div class="gcse-search"></div>
                </div>
               
                <?php
            }

        ?>

         <?php

         if(isset($_GET['outilsMat'])){


            // if : vérification que la recherche donne au moins un résultat
            if($listTutoOutilsMat -> rowCount() > 0) {
                // while : parcourir les résultats de la query de la variable $listTuto
                while($listTutoOutilsMatFetched = $listTutoOutilsMat -> fetch()) {
                    // if : vérification qu'un niveau a été sélectionné
                    if(isset($_GET['levelSelection'])) {
                        // if : vérification que le niveau indiqué correspond à celui dans la BDD
                        if($searchLevel == $listTutoFetched['niveau']) {
                            ?>
                            <p>
                                <?php require('showResult.php') ?>
                            </p>
                            <?php
                        } else {
                            ?>
                           
                            <?php
                        }
                    // else : affichage par défaut de la page ou quand on clique sur Réinitialiser
                    } else {
                        ?>
                        <p>
                            <?php require('showResult.php') ?>
                        </p>
                        <?php
                    }
                }
            } else {
                ?>
                <h3>Aucun tutoriel ne correspond à votre recherche</h3>
                <p>Vous n'arrivez pas à trouver de tutoriels ? Accèdez à Google avec le moteur de recherche by Les P'tits Clous !</p>
                <script async src="https://cse.google.com/cse.js?cx=60e83855cfc5e4371"></script>
                <div style="margin: 0 auto; width: 1000px;">
                 <div class="gcse-search"></div>
                </div>
               
                <?php
            } }

        ?>
    </section>

    <!-- END : Liste résultats -->

</body>
</html>