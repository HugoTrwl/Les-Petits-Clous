<?php
$BDD = new PDO('mysql:host=localhost; dbname=les-petits-clous;', 'root');
$listTuto = $BDD -> query('SELECT * FROM tuto');

$search = '';

if(isset($_GET['s']) AND !empty($_GET['s'])) {
    $search = htmlspecialchars($_GET['s']);
    $listTuto = $BDD -> query('SELECT * FROM tuto WHERE nomTuto LIKE "%'.$search.'%"');
}

$searchLevel = '';
if(isset($_GET['levelSelection'])) {
    $searchLevel = htmlspecialchars($_GET['levelSelection']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher un tutoriel</title>
</head>
<body>
    <!-- START : Formulaire / Barre de recherche -->

    <form method="get">
        <input type="search" name="s" placeholder="Rechercher un tuto" autocomplete="off" required>

        <label for="level">Niveau</label>
        <select name="levelSelection" id="level">
            <option value="facile">Facile</option>
            <option value="normal">Normal</option>
            <option value="difficile">Difficile</option>
        </select>

        <fieldset>
            <legend>Veuillez sélectionner les outils à votre disposition :</legend>
            <div>
                <input type="checkbox" id="hammer" name="tool" value="Marteau">
                <label for="hammer">Marteau</label>
            </div>
            <div>
                <input type="checkbox" id="screwdriver" name="tool" value="Tournevis">
                <label for="screwdriver">Tournevis</label>
            </div>
            <div>
                <input type="checkbox" id="pliers" name="tool" value="Pince">
                <label for="pliers">Pince</label>
            </div>
        </fieldset>

        <fieldset>
            <legend>Veuillez sélectionner les matériaux à votre disposition :</legend>
            <div>
                <input type="checkbox" id="wood" name="materials" value="wood">
                <label for="wood">Bois</label>
            </div>
            <div>
                <input type="checkbox" id="metal" name="materials" value="metal">
                <label for="metal">Metal</label>
            </div>
        </fieldset>

        <input type="submit" name="send">
    </form>

    <form action="/les_petits_clous/" method="post">
        <input type="submit" name="reset" value="Réinitialiser">
    </form>

    <!-- END : Formulaire / Barre de recherche -->

    <!-- START : Liste résultats -->

    <section class="show_tuto">
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
                            <p>Un tutoriel a été trouvé mais le niveau ne correspond pas</p>
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
                <p>Aucun tutoriel ne correspond à votre recherche</p>
                <?php
            }

        ?>
    </section>

    <!-- END : Liste résultats -->

</body>
</html>