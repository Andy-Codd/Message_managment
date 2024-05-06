<?php

ini_set('display_errors', 'on');

$idcon = mysqli_connect("localhost", "root", "", "enregistrement");

$id = $_POST['id_m'];
$nomP = $_POST['nomP'];
$nomE = $_POST['nomE'];
$telP = $_POST['telP'];
$telE = $_POST['telE']; 
$sexeP = $_POST['sexeP'];
$sexeE = $_POST['sexeE'];
$concour = $_POST['concour'];
$etablissement = $_POST['etablissement'];
$classe = $_POST['classe'];

if($sexeE == 'me') $sexeE = 'M';
else if($sexeE == 'fe') $sexeE = "F";

if($sexeP == 'mp') $sexeP = "M";
else if($sexeP == 'fp') $sexeP = "F";

$requete = "UPDATE `membre` SET `nom_parent`='$nomP',`nom_enfant`='$nomE',`tel_parent`='$telP',`tel_enfant`='$telE',`concour`='$concour',`sexe_parent`='$sexeP',`sexe_enfant`='$sexeE', `etablissement`='$etablissement',`classe`='$classe' WHERE id_membre = $id";

$result = mysqli_query($idcon, $requete);

echo '

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Membre</title>
    <link rel="stylesheet" href="../fonts/font.css">
    <style> 
    Body{
        background-image: linear-gradient(45deg, #19001faa, #19001faa), url("../images/fond1.png");
        background-color: #0e0111aa;
        /*background: linear-gradient(90deg, #3f0b1b, #19001f);*/
        background-size: 100vw 100vh;
        color: #fffa;
    }
    h1{
        font-family: mp-trebuchet;
        font-size: 2.4em;
        margin-top: 60px;
        font-weight: 400;
    }
    p{
        font-family: mp-trebuchet;
        font-size: 1.1em;
    }
    a{
        font-family: mp-nova;
        font-size: 1.2em;
        color: #ec0045;
        text-decoration: none;
        border-bottom: 2px solid #ec0045;
    }
    a:hover{
        border-bottom-width: 4px;
    }
    </style>
</head>
<body>

';

if($result){
    echo '
        <h1 style="text-align: center;">Informations de membre Modifiè avec success</h1>
        <p style="text-align: center;">Retour a l\' <a href="view_member.php" >Retour</a></p>
        ';
}else{
    echo "Un probleme est survenu lors de la modification";
}

echo '</body></html>';

mysqli_close($idcon);

?>