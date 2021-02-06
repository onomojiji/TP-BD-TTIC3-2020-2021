<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" 
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <title>Inscris</title>

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

                $nom = $_POST['nom'];
                $datenaissance = $_POST['datenaissance'];
                $lieudenaissance = $_POST['lieudenaissance'];
                $sexe = $_POST['sexe'];
                $nationalite = $_POST['nationalite'];
                $classe = $_POST['classe'];
                $nompere = $_POST['nompere'];
                $telephonepere = $_POST['telephonepere'];
                $nommere = $_POST['nommere'];
                $telephonemere = $_POST['telephonemere'];
                $adresseparents = $_POST['adresseparents'];
                $tuteur = $_POST['tuteur'];
                $numerourgence = $_POST['numerourgence'];
                $soumis = $_POST['soumis'];

                $matricule = $connexion2->query("SELECT COUNT(id) FROM gles_personnes");
                    
                $Add_personne = $connexion2->query(
                    "INSERT INTO gles_personnes (gles8personnes.nom, datenaissance, lieudenaissance, sexe, nationalite, matricule)
                    VALUES ($nom,$datenaissance,$lieudenaissance,$sexe,$nationalite, '18G00';)"); 
        

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

        <?php if(isset($soumis)):?>
            <div class="container alert alert-success my-3" role="alert">
                Inscription effectuée avec Success
            </div>
        <?php endif?>
        
        <div class="row">
            <a class="col-8 mx-auto btn btn-lg btn-secondary" href="index.php" role="button">Retour à l'Accueil</a>
        </div>
       
        

        <footer>
            <div class="text-primary text-center">
                <hr>
                Jiji &copy; 2018 - 2021
            </div>
        </footer>
  
    </body>
</html>