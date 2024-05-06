<?php

ini_set('display_errors', 'on');

$idcon = mysqli_connect("localhost", "root", "", "enregistrement");

$toDel = $_POST['toDel'];

$req_verif = "SELECT * FROM `membre` WHERE id_membre = $toDel;";
$result_verif = mysqli_query($idcon, $req_verif);



if(mysqli_num_rows($result_verif)){

    $requete = "DELETE FROM `membre` WHERE id_membre = $toDel;";
    $result = mysqli_query($idcon, $requete);

    if($result){

    echo '

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Suppression de Membre</title>
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

        echo'
    <h1 style="text-align: center">Membre supprimé avec success</h1>
    <br/><br/>
    <p style="text-align: center;">
        Retour a la page d\' <a href="../index1.html">Acceuil</a>
    </p>
    <p style="text-align: center;">
        Retour a la page de <a href="del_member.html"> Suppression</a>
    </p>
        ';

    echo '</body></html>';

    }else{
        echo'
        il est impossible d\'executer la requete, peut etre parceque le membre n\'existe plus dans la base...;<br/>
        Verifiez bien;
        ';
    }
}else{
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

        <h1 style="text-align: center;">Cette personne n\'existe pas dans la Base de Donnée</h1>
        <p style="text-align: center;">Retour a la page de <a href="del_member.html" >Suppression</a></p>

    </body>
    </html>
    ';
}

mysqli_close($idcon);

?>