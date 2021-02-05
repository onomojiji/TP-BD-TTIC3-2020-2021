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

        <title>Informations sur l'élève</title>

    </head>

    <body>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "gles3_db";

            $connexion = "mysql:host=$servername;dbname=$database";

            $connexion2 = new PDO($connexion, $username, $password) ;

            $id_eleve = $_GET['id'];

            $moy = "SELECT gles_personnes.nom, AVG(gles_notes.note) as moy
            FROM gles_personnes, gles_etudiants, gles_inscris, gles_notes
            WHERE gles_personnes.id = gles_etudiants.id_personne
            AND gles_etudiants.id = gles_inscris.id_etudiant
            AND gles_inscris.id = gles_notes.id_inscris
            AND gles_inscris.id = $id_eleve";

            $moyennes = $connexion2->query($moy);

            $notes = "SELECT DISTINCT gles_notes.note, gles_notes.evaluation, gles_sequences.sequencefr, gles_matieres.nommatiere
            FROM gles_personnes, gles_classes, gles_etudiants, gles_inscris, gles_anneesacademiques, gles_notes, gles_sequences, gles_matieres
            WHERE 
                gles_personnes.id = gles_etudiants.id_personne
                AND gles_etudiants.id = gles_inscris.id_etudiant
                AND gles_classes.id = gles_inscris.id_classe
                AND gles_inscris.id = gles_notes.id_inscris
                AND gles_matieres.id = gles_notes.id_matiere
                AND gles_notes.id_sequence = gles_sequences.id
                AND gles_personnes.id = $id_eleve";

            $infos = "SELECT gles_personnes.nom, gles_personnes.datenaissance, gles_personnes.lieudenaissance, 
            gles_personnes.sexe, gles_personnes.nationalite, gles_classes.nomclasse, gles_personnes.matricule, 
            gles_etudiants.pere, gles_etudiants.telephonepere, gles_etudiants.mere, gles_etudiants.telephonemere, 
            gles_etudiants.adresseparents, gles_etudiants.tuteur, gles_etudiants.numerourgence
            FROM gles_personnes, gles_classes, gles_etudiants, gles_inscris
            WHERE gles_personnes.id = gles_etudiants.id_personne
                AND gles_etudiants.id = gles_inscris.id_etudiant
                AND gles_classes.id = gles_inscris.id_classe
                AND gles_personnes.id = $id_eleve";

            $info_eleve = $connexion2->query($infos);

            $liste_notes = $connexion2->query($notes);

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

        <div class="container" style="margin-top: 3%;">
        
            <div class="row text-center">
                <h1>Année Scolaire : <strong>2020/2021</strong></h1>
            </div>
            <hr>
            <div class="row text-center">
                <h2>Informations Générales</h2>
            </div>
            
            <table class="table table-light">
                <tbody>

                <?php while ($info = $info_eleve-> fetch(PDO::FETCH_ASSOC)) :?>

                    <tr>
                        <td>Nom et prénom </td>
                        <td><strong><?php echo htmlspecialchars($info['nom']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Date de Naissance </td>
                        <td><strong><?php echo htmlspecialchars($info['datenaissance']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Lieu de Naissance </td>
                        <td><strong><?php echo htmlspecialchars($info['lieudenaissance']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Sexe </td>
                        <td><strong><?php echo htmlspecialchars($info['sexe']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Nationalité </td>
                        <td><strong><?php echo htmlspecialchars($info['nationalite']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Classe </td>
                        <td><strong><?php echo htmlspecialchars($info['nomclasse']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Matricule </td>
                        <td><strong><?php echo htmlspecialchars($info['matricule']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Nom du père </td>
                        <td><strong><?php echo htmlspecialchars($info['pere']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Telephone père </td>
                        <td><strong><?php echo htmlspecialchars($info['telephonepere']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Nom de la mère </td>
                        <td><strong><?php echo htmlspecialchars($info['mere']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Telephone mère </td>
                        <td><strong><?php echo htmlspecialchars($info['telephonemere']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Adresses parents </td>
                        <td><strong><?php echo htmlspecialchars($info['adresseparents']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Tuteur </td>
                        <td><strong><?php echo htmlspecialchars($info['tuteur']);?></strong></td>
                    </tr>
                    <tr>
                        <td>Numéro d'urgence </td>
                        <td><strong><?php echo htmlspecialchars($info['numerourgence']);?></strong></td>
                    </tr>
                    <?php endwhile; $info_eleve->closeCursor();?>
                </tbody>
            </table>

            <hr>
            <div class="row text-center">
                <h2>Notes de l'élève</h2>
            </div>

            <table class="table table-striped table-hover table-bordered shadow-lg p-3 mb-5 bg-white rounded bg-aqua rounded">
                <thead class="table-info">
                    <tr>
                    <th scope="col">Matière</th>
                    <th scope="col">Note / 20</th>
                    <th scope="col">Sequence</th>
                    <th scope="col">Evaluation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($note = $liste_notes-> fetch(PDO::FETCH_ASSOC)) :?>
                        
                        <tr>
                            <th scope='row'><?php echo htmlspecialchars($note['nommatiere']);?></th>
                            <td><?php echo htmlspecialchars($note['note']);?></td>
                            <td><?php echo htmlspecialchars($note['sequencefr']);?></td>
                            <td><?php echo htmlspecialchars($note['evaluation']);?></td>
                        </tr>
                        <?php endwhile; $liste_notes->closeCursor();?>
                </tbody>
            </table>

            <hr>
            <div class="row text-center">
                <h2>Moyenne de l'élève</h2>
                <p class="fw-bold">
                    <?php while ($moyenne = $moyennes -> fetch(PDO::FETCH_ASSOC)):?>
                    Moyenne = <?php echo htmlspecialchars($moyenne['moy']);?>
                    <?php endwhile; $moyennes->closeCursor();?>
                </p>
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




