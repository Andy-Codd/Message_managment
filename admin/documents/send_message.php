<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un Message</title>
    <link rel="stylesheet" href="send_message.css"/>
    <link rel="stylesheet" href="../fonts/font.css">
</head>
<body>


    <?php


        $idcon = mysqli_connect("localhost", "root", "", "enregistrement");

        $requete = "SELECT * FROM membre";
        $resultat = $idcon->query($requete);

        // Vérification du résultat de la requête
        if ($resultat->num_rows > 0) {
            // Initialisation des tableaux pour stocker les données
            $nomParents = array();
            $nomEnfants = array();
            $concours = array();
            $sexeParents = array();
            $sexeEnfants = array();
            $etablissement = array();
            $classe = array();

            // Parcours des résultats et ajout des données aux tableaux
            while ($ligne = $resultat->fetch_assoc()) {
                $nomParents[] = $ligne['nom_parent'];
                $nomEnfants[] = $ligne['nom_enfant'];
                $concours[] = $ligne['concour'];
                $sexeParents[] = $ligne['sexe_parent'];
                $sexeEnfants[] = $ligne['sexe_enfant'];
                $etablissement[] = $ligne['etablissement'];
                $classe[] = $ligne['classe'];
            }

            //Tranferer les Tableaux php dans des tableaux JS
            echo '<script type="text/javascript">';
            echo 'var nomsParents = ' . json_encode($nomParents) . ';';
            echo 'var nomsEnfants = ' . json_encode($nomEnfants) . ';';
            echo 'var concours = ' . json_encode($concours) . ';';
            echo 'var sexesParents = ' . json_encode($sexeParents) . ';';
            echo 'var sexesEnfants = ' . json_encode($sexeEnfants) . ';';
            echo '</script>';


        }

    ?>

    <script type="text/javascript" src="send_message.js"></script>


    <div id="backToHome">
        <a href="../index1.html">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="30" fill="#ec0045"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
            <span>Acceuil</span>
        </a>
    </div>

    <div id="main">

        <div id="bouttons">
            <button title="Inscrire le nom du parent" onclick="putVariable('nom_parent')">noms Parents</button>
            <button title="Inscrire le nom de l'enfant" onclick="putVariable('nom_enfant')">noms enfant</button>
            <button title="Inscrire le concour pour chacunes des personnes concernées" onclick="putVariable('concour')">concours</button>
            <button title="Inscrire un Monsieur ou un Madame" onclick="putVariable('monsieur/madame')">M./Mde</button>
            <button title="Inscrire un fils ou fille" onclick="putVariable('fils/fille')" style="letter-spacing: -3px;">fils|fille</button>
            <button title="Inscrire un pronom personnel il ou elle" onclick="putVariable('il/elle')">il|elle</button>
            <button title="Inscrire l'etablissement de l'enfant" onclick="putVariable('etablissement')">etablissement</button>
            <button title="Inscrire la classe de l'enfant" onclick="putVariable('classe')">classe</button>
        </div>

    <form action="generer_message.php" method="POST">

        <textarea name="message" id="textarea1" placeholder="Saisisez votre message ici..."></textarea>
        <br/><br/>

        <input type="submit" value="Ξ Generer Ξ" id="envoyer"/>


    </form>
        

    </div>


</body>
</html>