<?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "gles2_db";

            /* $connexion = mysqli_connect($servername,$username,$password,$database); */

            $connexion = "mysql:host=$servername;dbname=$database";

            $connexion2 = new PDO($connexion, $username, $password) ;

            $req = "select * from gles_personnes";

            $resultat = $connexion2->query($req) ;

            /* $resultat = mysqli_query($connexion,$req); */

        ?>

        <!-- <select name="eleve" id="">
            <?php
                /* while ($donnee = $resultat-> fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=".htmlspecialchars($donnee['id']).">".htmlspecialchars($donnee["nom"])."</option>";
                } */
            ?>

        </select> -->

        <hr>

        <div class="row container-fluid" style="margin-top: 1%">

            <table class="table table-striped table-hover table-bordered shadow-lg p-3 md-5 bg-aqua rounded overflow-auto">
                <thead class="table-info">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Date de Naissance</th>
                    <th scope="col">Lieu de Naissance</th>
                    <th scope="col">e-mail</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Matricule</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($donnee = $resultat-> fetch(PDO::FETCH_ASSOC)) : ?>
                    
                    <tr>
                        <th scope='row'><?php echo htmlspecialchars($donnee['id']);?> </th>
                        <td><?php echo htmlspecialchars($donnee['nom']);?></td>
                        <td><?php echo htmlspecialchars($donnee['prenom']);?></td>
                        <td><?php echo htmlspecialchars($donnee['datenaissance']);?></td>
                        <td><?php echo htmlspecialchars($donnee['lieudenaissance']);?></td>
                        <td><?php echo htmlspecialchars($donnee['email']);?></td>
                        <td><?php echo htmlspecialchars($donnee['telephone']);?></td>
                        <td><?php echo htmlspecialchars($donnee['sexe']);?></td>
                        <td><?php echo htmlspecialchars($donnee['adresse']);?></td>
                        <td><?php echo htmlspecialchars($donnee['matricule']);?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>



        SELECT gles_personnes.nom, gles_classes.nomclasse, gles_anneesacademiques.anneeacademic, gles_notes.note, gles_notes.evaluation, gles_sequences.sequencefr, gles_matieres.nommatiere
FROM gles_personnes, gles_classes, gles_etudiants, gles_inscris, gles_anneesacademiques, gles_notes, gles_sequences, gles_matieres
WHERE 
	gles_personnes.id = gles_etudiants.id_personne
    AND gles_etudiants.id = gles_inscris.id_etudiant
    AND gles_classes.id = gles_inscris.id_classe
    AND gles_inscris.id = gles_notes.id_inscris
    AND gles_matieres.id = gles_notes.id_matiere
    AND gles_notes.id_sequence = gles_sequences.id
    AND gles_personnes.id = 67


    SELECT gles_personnes.nom, gles_personnes.datenaissance, gles_personnes.lieudenaissance, gles_personnes.sexe, gles_personnes.nationalite, gles_classes.nomclasse, gles_personnes.matricule, gles_etudiants.pere, gles_etudiants.telephonepere, gles_etudiants.mere, gles_etudiants.telephonemere, gles_etudiants.adresseparents, gles_etudiants.tuteur, gles_etudiants.numerourgence
FROM gles_personnes, gles_classes, gles_etudiants, gles_inscris
WHERE gles_personnes.id = gles_etudiants.id_personne
	AND gles_etudiants.id = gles_inscris.id_etudiant
    AND gles_classes.id = gles_inscris.id_classe
    AND gles_personnes.id = 90


