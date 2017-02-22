<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1 style="color:red;text-align: center"> Bienvenu sur notre site </h1>
        <?php
        /*
         * seconnecter à la base de données en rammenant le fichier connectes.php
         */
        include("connectes.php");
        $date = new DateTime();
        /*
         * récuperer l'adresse ip du serveur
         */
        $ip = $_SERVER['REMOTE_ADDR'];
        /*
         *  récuperer le timesTamps
         */
        $timestamp = $date->getTimestamp();
        /*
         *  selectionner les ip de ma table visites
         */
        $select = $connect->query("SELECT ip from visites  where ip='$ip'");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $resultat = $select->fetch();
        $nb_row = $select->rowCount();
        /*
         *  vérifier si l'adresse ip existe déja
         */
        if ($nb_row == 1) {
            /*
             *   mettre à jour le timestamps si l'ip existe
             */
            $update = $connect->exec("UPDATE visites SET timestamp ='$timestamp' WHERE ip ='$ip'");
        } else {
            /*
             * inserer une nouvelle entrée si  l'ip n'existe pas
             */
            $insert = $connect->exec("INSERT INTO visites(ip,timestamp)VALUES('$ip','$timestamp')");
        }
        ?>
        <h3 style="color:blue;text-align: center"> votre adress ip est " <?php echo $ip ?> " et vous venez de se connectez en temps de " <?php echo $timestamp ?> "</h3>
        <?php
        /*
         * récuperer l'heure en timestamp
         */
        $timestamp = $date->getTimestamp();
        /*
         * soustraire 5 min du temps actuel
         */
        $CinqMunitesAvnt = $timestamp - (5 * 60 * 1000);

        /*
         * suppression de tous les visiteurs de plus de 5 min
         */
        $supprimer = $connect->exec("DELETE FROM  visites  WHERE timestamp <'$CinqMunitesAvnt'");

        /**
         *  compter les  ip des visiteurs restants 
         */
        $select = $connect->query("SELECT COUNT(ip) AS ipRestant from visites");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $resultat = $select->fetch();
        $nbre_visiteurs = $resultat->ipRestant;
        $nombreV = "le nombre de visiteurs actuellement connectés est '.$nbre_visiteurs.'";
        /*
         *  enregistrement dans un fichier
         */
        $monFichier = fopen("save.txt", "r+");
        fputs($monFichier, $nombreV);
        fclose($monFichier);
        ?>
        <h4 style="color:blue;text-align: center">le nombre de visiteurs actuellement connectés est <?php echo $nbre_visiteurs ?> </h4>
    </body>
</html>
