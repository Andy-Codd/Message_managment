<?php

ini_set('display_errors', 'on');

$idcon = mysqli_connect("localhost", "root", "", "enregistrement");

$requete = "SELECT * FROM `membre` ORDER BY id_membre;";

$result = mysqli_query($idcon, $requete);

//$array mysqli_fetch_array(resource $result [.ini MYSQL_NUM]);

$nbcol = mysqli_num_fields($result);
$nbacc = mysqli_num_rows($result);


echo '

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Membres</title>
    <link rel="stylesheet" href="../fonts/font.css">
    <link rel="stylesheet" href="add_member.css"/>
    <style> 
    body{
      font-family: "Trebuchet MS",mp-trebuchet;
    }
    table{ border-widht: 3px; margin-bottom: 100px;}
    th{
      padding: 10px;
      font-weight: 900;
      color: #ec0045;
      border-widht: 3px;
    }
    td{
      padding: 10px;
    }
    a{
      color: #ec0045;
      text-decoration: none;
      font-size: 1.1em;
      border-bottom: 2px solid #ec0045;
      transition: all .05s;
    }
    a:hover{
      border-bottom-width: 4px;
      font-weight: 900;
    }
    #edit{
      border: 1px solid #222;
      background-color: #0e0111;
      position: fixed;
      bottom: 0px;
      width: 100%;
      transform: translateX(-50%);
      left: 50%;
    }
    </style
</head>
<body>

';
echo '

    <div id="backToHome">
        <a href="../index1.html">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="30" fill="#ec0045"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
            <span>Acceuil</span>
        </a>
    </div>

';
echo '<h1 style="text-align: center; margin-top: 15px;">Liste de tous les membres enregistrés</h1>';
echo '<h3 style="text-align: center;">Il y a <span style="color: #ec0045;">'.$nbacc.'</span> membres qui sont enregistrés';
echo '<table border="3" style="border-collapse: collapse; position: relative; left: 50%; transform: translateX(-50%); top: 20px;">';
echo '<tr><th>id</th><th>Nom Parents</th><th>Tel Parents</th><th>Sexe Parents</th><th>Nom Enfants</th><th>Tel Enfants</th><th>Sexe Enfants</th><th>Concour</th><th>etablissement</th><th>Classe</th></tr>';
while($ligne = mysqli_fetch_array($result)){
  echo '<tr>';
    echo '<td style="padding: 8px; font-size: 1.1em;">'.$ligne["id_membre"].'</td>';
    echo '<td style="padding: 8px; font-size: 1.1em;">'.$ligne["nom_parent"].'</td>';
    echo '<td style="padding: 8px; font-size: 1.1em;">'.$ligne["tel_parent"].'</td>';
    echo '<td style="padding: 8px; font-size: 1.1em;">'.$ligne["sexe_parent"].'</td>';
    echo '<td style="padding: 8px; font-size: 1.1em;">'.$ligne["nom_enfant"].'</td>';
    echo '<td style="padding: 8px; font-size: 1.1em;">'.$ligne["tel_enfant"].'</td>';
    echo '<td style="padding: 8px; font-size: 1.1em;">'.$ligne["sexe_enfant"].'</td>';
    echo '<td style="padding: 8px; font-size: 1.1em;">'.$ligne["concour"].'</td>';
    echo '<td style="padding: 8px; font-size: 1.1em;">'.$ligne["etablissement"].'</td>';
    echo '<td style="padding: 8px; font-size: 1.1em;">'.$ligne["classe"].'</td>';
  echo '</tr>';
}
echo '</table>';

echo '
<br/><br/><br/>
<div id="edit">
<p style="text-align: center;"><a href="edit_member.html">Modifier</a> un membre</a><br/>
<p style="text-align: center;"><a href="del_member.html">Supprimer</a> un membre</a>
</div>

';

echo '</body></html>';

mysqli_free_result($result);

mysqli_close($idcon);

 ?>