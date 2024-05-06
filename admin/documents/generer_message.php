<?php

ini_set('display_errors', 'on');

session_start();

$idcon = mysqli_connect("localhost", "root", "", "enregistrement");

$requete = "SELECT * FROM membre";
$resultat = $idcon->query($requete);

$messages = array();

$regexNomP = '/\(\-nom\_parent\-\)/';
$regexNomE = '/\(\-nom\_enfant\-\)/';
$regexConcour = '/\(\-concour\-\)/';
$regexMonsieur = '/\(\-monsieur\/madame\-\)/';
$regexFils = '/\(\-fils\/fille\-\)/';
$regexIlElle = '/\(\-il\/elle\-\)/';
$regexEtab = '/\(\-etablissement\-\)/';
$regexClasse = '/\(\-classe\-\)/';


if ($resultat->num_rows > 0) {
    // Initialisation des tableaux pour stocker les données
    $nomsParents = array();
    $nomsEnfants = array();
    $concours = array();
    $sexesParents = array();
    $sexesEnfants = array();
    $etablissement = array();
    $classe = array();
    $numEnfants = array();
    $numParents = array();

    // Parcours des résultats et ajout des données aux tableaux
    while ($ligne = $resultat->fetch_assoc()) {
        $nomsParents[] = $ligne['nom_parent'];
        $nomsEnfants[] = $ligne['nom_enfant'];
        $concours[] = $ligne['concour'];
        $sexesParents[] = $ligne['sexe_parent'];
        $sexesEnfants[] = $ligne['sexe_enfant'];
        $etablissement[] = $ligne['etablissement'];
        $classe[] = $ligne['classe'];
        $numEnfants[] = $ligne['tel_enfant'];
        $numParents[] = $ligne['tel_parent'];
        $simP[] = $ligne['sim_parent'];
        $simE[] = $ligne['sim_enfant'];
    }

} else {
    echo "Aucune donnée trouvée.";
}

$texte = "";
$texte = $_POST['message'];


if($texte == null){

    echo '

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Pas de message a generer</title>
    <link rel="stylesheet" href="../fonts/font.css">
    <style> 
    Body{
        background-image: linear-gradient(45deg, #19001faa, #19001faa), url("../images/fond1.png");
        background-color: #0e0111aa;
        /*background: linear-gradient(90deg, #3f0b1b, #19001f);*/
        background-size: 100vw 100vh;
        color: #fffa;
    }

    a{
        font-family: mp-nova;
        font-size: 1.2em;
        color: #ec0045;
        text-decoration: none;
        border-bottom: 2px solid #ec0045;
        margin: 30px;
    }
    a:hover{
        border-bottom-width: 4px;
    }

    </style>
</head>
<body>

    ';
    echo '<h1 style="text-align: center;">Il n\'y a aucun message a generer</h1>';
    echo '
    <p style="text-align: center;">
    <a href="send_message.php" style="font-size: 1.2em; font-weight: 900;color: #ec0045;">Retour</a>
    </p>
    ';
    echo '</body></html>';
}else{

for ($i = 0; $i < count($nomsParents); $i++) {
    // Replace parent names
    if (preg_match($regexNomP, $texte)) {
        $messages[$i] = preg_replace($regexNomP, $nomsParents[$i], $texte);
    } else {
        $messages[$i] = $texte;
    }

    // Replace child names
    if (preg_match($regexNomE, $messages[$i])) {
        $messages[$i] = preg_replace($regexNomE, $nomsEnfants[$i], $messages[$i]);
    }

    // Replace contest names
    if (preg_match($regexConcour, $messages[$i])) {
        $messages[$i] = preg_replace($regexConcour, $concours[$i], $messages[$i]);
    }

    // Replace with "Monsieur" or "Madame"
    if (preg_match($regexMonsieur, $messages[$i])) {
        if ($sexesParents[$i] == 'M') {
            $messages[$i] = preg_replace($regexMonsieur, 'Monsieur', $messages[$i]);
        } elseif ($sexesParents[$i] == 'F') {
            $messages[$i] = preg_replace($regexMonsieur, 'Madame', $messages[$i]);
        }
    }

    // Replace with "fils" or "fille"
    if (preg_match($regexFils, $messages[$i])) {
        if ($sexesEnfants[$i] == 'M') {
            $messages[$i] = preg_replace($regexFils, 'fils', $messages[$i]);
        } elseif ($sexesEnfants[$i] == 'F') {
            $messages[$i] = preg_replace($regexFils, 'fille', $messages[$i]);
        }
    }

    //Mettre un il ou elle
    if (preg_match($regexIlElle, $messages[$i])){
        if($sexesEnfants[$i] == 'M'){
            $messages[$i] = preg_replace($regexIlElle, 'il', $messages[$i]);
        }elseif ($sexesEnfants[$i] == 'F'){
            $messages[$i] = preg_replace($regexIlElle, 'elle', $messages[$i]);
        }
    }

    //mettre l'etablissement
    if (preg_match($regexEtab, $messages[$i])){
        $messages[$i] = preg_replace($regexEtab, $etablissement[$i], $messages[$i]);
    }

    //Mettre la classe 
    if (preg_match($regexClasse, $messages[$i])){
        $messages[$i] = preg_replace($regexClasse, $classe[$i], $messages[$i]);
    }
}

for($i=0; $i<5; $i++){
    if(array_key_exists($i, $messages)){ 
        echo '<span style="font-style: italic; text-decoration: underline;">Message '.$i.'</span><br>'.$messages[$i].'<br><br>';
    }
}

$_SESSION['text'] = $texte;
$_SESSION['mess'] = $messages;
$_SESSION['numE'] = $numEnfants;
$_SESSION['numP'] = $numParents;
$_SESSION['simE'] = $simE;
$_SESSION['simP'] = $simP;


echo '

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages generees</title>
    <link rel="stylesheet" href="../fonts/font.css">
    <style> 
    Body{
        background-image: linear-gradient(45deg, #19001faa, #19001faa), url("../images/fond1.png");
        background-color: #0e0111aa;
        background-size: 100vw 100vh;
        color: #fffa;
    }
    h1{
        font-family: mp-trebuchet;
        font-size: 2.4em;
        margin-top: 60px;
        font-weight: 400;
    }

    #retour{
        font-family: mp-nova;
        font-size: 1.2em;
        color: #ec0045;
        text-decoration: none;
        border-bottom: 2px solid #ec0045;
    }
    #retour:hover{
        border-bottom-width: 4px;
        transform: translateX(-50vw);
    }

    #center{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #envoyer{
        border: 0px solid blue;
        font-family: mp-nova;
        border: 0px solid blue;
        font-size: 1.3em;
        text-align: left;
        width: auto;
        height: 70px;
        transition: all 1s;
        overflow: hidden;
        position: fixed;
        bottom: 0px;
        background-color: #222a;
        border-radius: 10px;
    }
    #envoyer:hover{
        height: auto;
    }
    #envoyer ul span{
        color: #ec0045;
        border: 2px solid #ec0045;
        background-color: transparent;
        padding: 5px 10px;
        border-radius: 10px;
        text-align: center;
        position: relative;
        margin-left: 33%;
    }
    #envoyer ul li{
        list-style-type: none;
    }
    #envoyer ul li a{
        color: #ec0045;
        background-color: #0e0111;
        border: 2px solid #ec0045;
        border-radius: 10px;
        padding: 5px 10px;
        text-decoration: none;
    }
    #envoyer ul li a:hover{
        border-style: dashed;
        transform: scale(1.1);
    }
    #envoyer ul li a:active{
        transform: scale(1);
    }
    #envoyer ul li .whatsapp span{
        text-align: left;
        margin-left: unset;
    }
    #envoyer ul li .whatsapp{
        border: 1px solid #222;
        padding: 10px;
        text-align: right;
        display: flex;
        justify-content: space-between;
        flex-wrap: nowrap;
        align-items: center;
        width: 400px;
    }


    </style>
</head>
<body>
    <div id="center">
    <div id="envoyer">
        <ul><span>Envoyer</span><br/><br/>
            <li>
                <ul class="whatsapp"><span>⥑Parents ⥤</span>
                    <li><a href="send_parents.php" id="envoyerP">SMS </a></li>
                    <li><a href="send_whatsapp_P.php" id="envoyerWP">Whatsapp </a></li>
                </ul>    
            </li><br/>
            <li>
                <ul class="whatsapp"><span>⥑Enfants ⥤</span>
                    <li><a href="send_enfant.php" id="envoyerE">SMS</a></li>
                    <li><a href="send_whatsapp_E.php" id="envoyerWE">Whatsapp</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </div>
    <div style="margin-top: 50px; border: 0px solid yellow; text-align: center; margin-top: 100px; margin-bottom: 100px"><a href="send_message.php" id="retour">Retour</a></div>
';

echo '</body></html>';

}

?>
