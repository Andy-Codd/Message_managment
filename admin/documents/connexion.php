<?php

ini_set('display_errors', 'on');

$idcon = mysqli_connect("localhost", "root", "", "enregistrement");

$password_no_hash = $_POST['mypass'];


// $password = password_hash($password_no_hash, PASSWORD_DEFAULT);

// $requete = "INSERT INTO `admin`(`password`) VALUES ('$password')";
// $result = mysqli_query($idcon, $requete);

$requete="SELECT `password` FROM `admin`";
$result=mysqli_query($idcon, $requete);

$verif2 = false;

while($ligne=mysqli_fetch_array($result)){
    foreach ($ligne as $value) {
        if(password_verify($password_no_hash, $value)) $verif2=true;
 	}
}

if($verif2){
    header("location:../index1.html");
}else{
	echo '
	<div style="text-align: center">
	<h1> Mot de Passe Incorrecte</h1>
	<a href="../index.html" style="font-size: 1.2em; font-weight: 900;color: #ec0045;">Reessayer</a>
	</div>	
	';
}


?>