<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" 
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <title>Inscription</title>

    </head>

    <body>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "gles3_db";

            $connexion = "mysql:host=$servername;dbname=$database";

            $connexion2 = new PDO($connexion, $username, $password) ;

            $req_classes = "SELECT gles_classes.id, gles_classes.nomclasse 
            FROM gles_classes ORDER BY gles_classes.niveau, gles_classes.id";

            $liste_classes = $connexion2->query($req_classes);


        ?>
        
        <!-- Menu ou navbar -->
        <header style="margin-top: 1%;">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-light fw-bold shadow-lg sticky-top ">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="index.php">GleSchool</a>
                    </div>
                  </nav>
            </div>
        </header>
        
        


        <div class="container" style="margin-top: 5%;">
        
            <div class="row text-center">
                <h1>Inscription</h1>
            </div>

            <div class="row my-3">
            
                <div class="col-md-8 mx-auto shadow-lg py-3">
                    <form action="inscris.php" method="post" class="form-group mx-auto">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="nom" name="nom">
                            <label for="nom">Nom(s) et Prenom(s)</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="date" class="form-control" id="datenaissance" name="datenaissance">
                            <label for="datenaissance">Date de naissance</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="lieudenaissance" name="lieudenaissance">
                            <label for="lieudenaissance">Lieu de Naissance</label>
                        </div>
                        <select class="form-select form-select-lg mb-1" aria-label="Default select example" name="sexe">
                            <option selected>Sexe</option>
                            <option value="F">F</option>
                            <option value="M">M</option>
                        </select>
                        <select class="form-select form-select-lg mb-1" aria-label="Default select example" name="nationalite">
                            <option selected>Nationalité</option>
                            <option value="Camerounaise">Camerounaise</option>
                            <option value="Etrangère">Etrangère</option>
                        </select>
                        <select class="form-select form-select-lg mb-1" aria-label="Default select example" name="classe">
                            <option selected>Classe</option>
                            <?php while ($classe_unique = $liste_classes-> fetch(PDO::FETCH_ASSOC)):?>
                            <option value="<?php echo htmlspecialchars($classe_unique['id']);?>">
                                <?php echo htmlspecialchars($classe_unique['nomclasse']);?>
                            </option>
                            <?php endwhile;$liste_classes->closeCursor();?>
                        </select>
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="matricule" name="matricule">
                            <label for="matricule">Matricule</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="nompere" name="nompere">
                            <label for="nompere">Nom du père</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="number" class="form-control" id="telephonepere" name="telephonepere">
                            <label for="telephonepere">Telephone du père</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="nommere" name="nommere">
                            <label for="nommere">Nom de la mère</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="number" class="form-control" id="telephonemere" name="telephonemere">
                            <label for="telephonemere">Telephone de la mère</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="adresseparents" name="adresseparents">
                            <label for="adresseparents">Adresse Parents</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="tuteur" name="tuteur">
                            <label for="tuteur">Nom du tuteur</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="numerourgence" name="numerourgence">
                            <label for="numerourgence">Numéro d'urgence</label>
                        </div>
                        <div class="row justufy-content-center">
                            <button type="submit" name="soumis" class="btn btn-primary btn-lg col-11 mx-auto">
                                S'inscrire
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>


        <footer>
            <div class="text-primary text-center">
                <hr>
                Jiji &copy; 2018 - 2021
            </div>
        </footer>

    </body>

</html>




