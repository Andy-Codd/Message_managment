<?php

ini_set('display_errors', 'on');


session_start();

$messages = $_SESSION['mess'];
$numero_parents = $_SESSION['numP'];
$sim_parent = $_SESSION['simP'];


$curl = curl_init();

for($i=0; $i<count($messages); $i++){

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.fonnte.com/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
  'target' => $numero_parents[$i],
  'message' => $messages[$i],
  'delay' => '2', 
  'countryCode' => '237', //optional
  ),
    CURLOPT_HTTPHEADER => array(
      'Authorization: ZvDf81pk1gNMVJqWghtW' //change TOKEN to your actual token
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);

}

echo '

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messages envoyés</title>
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

        <h1 style="text-align: center;">Les messages ont été envoyés</h1>
        <p style="text-align: center;">Retour a l\' <a href="../index1.html" >Accueil</a></p>
 
</body>
</html>        
';

?>