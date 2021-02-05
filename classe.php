
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" 
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <title>Liste d'élèves</title>

    </head>

    <body>

        <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "gles3_db";

            /* $connexion = mysqli_connect($servername,$username,$password,$database); */

            $connexion = "mysql:host=$servername;dbname=$database";

            $connexion2 = new PDO($connexion, $username, $password) ;

            $req = "select * from gles_personnes";

            $resultat = $connexion2->query($req) ;

            $id_classe = $_GET['id'];

            /* $resultat = mysqli_query($connexion,$req); */

            $req_eleves = "SELECT gles_personnes.nom, gles_personnes.datenaissance, gles_personnes.lieudenaissance,
              gles_personnes.sexe, gles_personnes.matricule, gles_personnes.id
              FROM gles_personnes, gles_etudiants, gles_inscris, gles_classes 
              WHERE gles_personnes.id = gles_etudiants.id_personne 
                AND gles_etudiants.id = gles_inscris.id_etudiant 
                AND gles_classes.id = gles_inscris.id_classe 
                AND gles_classes.id = $id_classe 
              GROUP BY gles_personnes.nom";

            $req_classe = "SELECT gles_classes.nomclasse FROM gles_classes WHERE gles_classes.id = $id_classe";

            $classe = $connexion2->query($req_classe);

            $liste_eleves = $connexion2->query($req_eleves) ;

        ?>
        
        <!-- Menu ou navbar -->
        <header style="margin-top: 1%;">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-light fw-bold shadow-lg">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="index.php">GleSchool</a>
                      <ul class="d-flex navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="inscription.php">S'inscrire</a></li>
                      </ul>
                    </div>
                  </nav>
            </div>
        </header>

        <!-- Partie inférieure -->

        <div class="row container-fluid justify-content-center" style="margin-top: 5%">

            <h1>Liste des élèves de : 
            <?php while ($clsse = $classe-> fetch(PDO::FETCH_ASSOC)) {
               echo htmlspecialchars($clsse['nomclasse']);
            }?></h1>
            <hr>

            <table class="table table-striped table-hover table-bordered shadow-lg p-3 mb-5 bg-white rounded bg-aqua rounded">
                <thead class="table-info">
                    <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nom(s) et Prenom(s)</th>
                    <th scope="col">Sexe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; while ($eleve_unique = $liste_eleves-> fetch(PDO::FETCH_ASSOC)) : $i+=1 ?>
                      
                    <tr>
                        <th scope='row'><?php echo $i;?></th>
                        <td><a href="eleve.php?id=<?php echo htmlspecialchars($eleve_unique['id']);?>"
                             style="text-decoration: none;">
                              <?php echo htmlspecialchars($eleve_unique['nom']);?></a></td>
                        <td><?php echo htmlspecialchars($eleve_unique['sexe']);?></td>
                    </tr>
                    <?php endwhile; 
                    $liste_eleves->closeCursor();?>
                </tbody>
            </table>
        </div>

        <footer>
          <hr>
          <p class="text-primary float-end">Jiji &copy; 2018 - 2021</p>
        </footer>

    </body>

</html>