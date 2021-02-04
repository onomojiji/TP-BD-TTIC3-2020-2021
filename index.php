
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

        <title>Accueil</title>

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

            /* $resultat = mysqli_query($connexion,$req); */

            $req_classes = "SELECT gles_classes.id, gles_classes.nomclasse 
            FROM gles_classes ORDER BY gles_classes.niveau, gles_classes.id";

            $liste_classes = $connexion2->query($req_classes) ;

        ?>
        
        <!-- Menu ou navbar -->
        <header style="margin-top: 1%;">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-light fw-bold shadow-lg">
                    <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarTogglerDemo02" 
                    aria-controls="navbarTogglerDemo02" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                      <a class="navbar-brand" href="index.php">OZAKE</a>
                     
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                            <a class="nav-link active fond-menu" aria-current="page" href="#">Accueil</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Mes Banques
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <li><a class="dropdown-item" href="#">U.B.A (Cameroun)</a></li>
                              <li><a class="dropdown-item" href="#">BISEC (Cameroun)</a></li>
                              <li><a class="dropdown-item" href="#">Afriland First Bank</a></li>
                            </ul>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Transactions
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <li><a class="dropdown-item" href="#">Envoi</a></li>
                              <li><a class="dropdown-item" href="#">Reception</a></li>
                              <li><a class="dropdown-item" href="#">Historique</a></li>
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="False">Aide</a>
                          </li>
                        </ul>
                        <ul class="d-flex navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="#">Se connecter</a></li>
                        </ul>
                      </div>
                      <ul class="d-flex navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#">S'inscrire</a></li>
                      </ul>
                    </div>
                </nav>
            </div>
            <hr>
        </header>

        <div class="container-fluid">

            <!-- Photos defilantes  -->

            <div id="img-defil" class="row">
                <div class="col-sm-1"></div>
                <div id="carouselCaption" class="col-sm-10 carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselCaption" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselCaption" data-slide-to="1" ></li>
                        <li data-target="#carouselCaption" data-slide-to="2"></li>
                        <li data-target="#carouselCaption" data-slide-to="3"></li>
                        <li data-target="#carouselCaption" data-slide-to="4"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item  active">
                            <a href=""><img src="images/1.jpg" class="d-block w-100" alt="image1"></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Titre de la formation 1</h5>
                                <p>Details de la formation 1</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href=""><img src="images/2.png" class="d-block w-100" alt="image2"></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Titre de la formation 2</h5>
                                <p>Details de la formation 2</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <a href=""><img src="images/3.png" class="d-block w-100" alt="image3"></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Titre de la formation 3</h5>
                                <p>Details de la formation 3</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/4.png" class="d-block w-100" alt="image4">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Titre de la formation 4</h5>
                                <p>Details de la formation 4</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/5.png" class="d-block w-100" alt="image5">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Titre de la formation 5</h5>
                                <p>Details de la formation 5</p>
                            </div>
                        </div>
                        
                    </div>

                    <a class="carousel-control-prev" href="#carouselCaption" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselCaption" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>

                </div>
                <div class="col-sm-1"></div>
            </div>

            <div style="margin-top: 10%;">
            
                <h1>Nos Classes</h1>
                <hr>
                <div class="row justify-content-center text-center">

                    <?php 
                        while ($classe_unique = $liste_classes-> fetch(PDO::FETCH_ASSOC)):
                        ?>

                    <div class="col-sm-2 card bg-secondary" style="margin: 0.5%;">
                    <a href="classe.php?id=<?php echo htmlspecialchars($classe_unique['id']);?>"
                                 class="card-link text-light" style="text-decoration:none">
                        <div class="card-body">
                            <h5 class="card-title">
                                
                                <?php echo htmlspecialchars($classe_unique['nomclasse']);?>
                                
                            </h5>
                        </div>
                    </a>  
                    </div>

                    <?php 
                        endwhile;
                        $liste_classes->closeCursor();
                    ?>
                    
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




