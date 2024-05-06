<?php

ini_set('display_errors', 'on');

$idcon = mysqli_connect("localhost", "root", "", "enregistrement");

$toDel = $_POST['toDel'];

$requete = "SELECT * FROM membre WHERE id_membre = $toDel";
$result = mysqli_query($idcon, $requete);

if(mysqli_num_rows($result) > 0){

    while($ligne = mysqli_fetch_array($result)){
        $id = $ligne["id_membre"];
        $nomP = $ligne["nom_parent"];
        $nomE = $ligne["nom_enfant"];
        $telP = $ligne["tel_parent"];
        $telE = $ligne["tel_enfant"];
        $sexeP = $ligne["sexe_parent"];
        $sexeE = $ligne["sexe_enfant"];
        $concour = $ligne["concour"];
        $etablissement = $ligne["etablissement"];
        $classe = $ligne["classe"];
        $sim_parent = $ligne["sim_parent"];
        $sim_enfant  = $ligne["sim_enfant"];
    }
    if($result){
        
            //header("location:../pages/login_form.php");
            echo'
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajouter un Membre</title>
        <link rel="stylesheet" href="add_member.css"/>
        <link rel="stylesheet" href="../fonts/font.css">
        <script type="text/javascript" src="add_member.js"></script>
        <style>
        form p a{
            color: #ec0045;
            text-decoration: none;
            border-bottom: 2px solid #ec0045;
        }
        form p a:hover{
            border-bottom-width: 4px;
        }
        </style>

    </head>
    <body>

        <div id="backToHome">
            <a href="../index1.html">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="30" fill="#ec0045"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                <span>Acceuil</span>
            </a>
        </div>

        <h1>Modifier les infos d\'un membre</h1>


        <form action="update_member.php" method="POST" id="monForm" onsubmit="return verifSubmit()">

        <p style="text-align: center;">
            <label for="id_m">Id du membre : </label>
            <input type="text" name="id_m" id="id_m" value="'.$id.'" readonly style="width: 100px; text-align: center; border: 2px solid #ec0045; border-radius: 10px;"/>
        </p>
            <fieldset>

                <legend>Parents</legend>

                <label for="nomP">Nom Parent</label>

                <input type="text" name="nomP" id="nomP" required value="'.$nomP.'"/><br/><br/>

                <label for="telP">Tel Parent</label>';

                if($sim_parent == "O"){
                    echo '
                <label for="OP">Orange</label><input type="radio" name="simP" id="OP" value="op" required checked/>
                <label for="mtnP">MTN</label><input type="radio" name="simP" id="mtnP" value="mtp" required/>)<br/>';
                }else if($sim_parent == "M"){
                    echo '
                <label for="OP">Orange</label><input type="radio" name="simP" id="OP" value="op" required checked/>
                <label for="mtnP">MTN</label><input type="radio" name="simP" id="mtnP" value="mtp" required checked/>)<br/>';
                }

                echo '
                <input type="text" name="telP" id="telP" required onblur="verifTelP()" id="telP" value="'.$telP.'"/><br/><br/>';

                if($sexeP == "M"){ 
                echo ' 
                <label>Sexe: </label>
                <label for="MP">M</label><input type="radio" name="sexeP" id="MP" value="mp" required checked />
                <label for="FP">F</label><input type="radio" name="sexeP" id="FP" value="fp" required /><br/>
                ';

                }else if($sexeP == "F"){ 
                echo '
                <label>Sexe: </label>
                <label for="MP">M</label><input type="radio" name="sexeP" id="MP" value="mp" required />
                <label for="FP">F</label><input type="radio" name="sexeP" id="FP" value="fp" required checked/><br/>    
                ';            
                } 

    echo '

            </fieldset>

            <fieldset>

                <legend>Enfant</legend>

                <label for="nomE">Nom Enfant</label><br/>
                <input type="text" name="nomE" id="nomE" value="'.$nomE.'"/><br/><br/>

                <label for="telE">Tel Enfant</label>';

                if($sim_enfant == "O"){
                    echo '
                <label for="OE">Orange</label><input type="radio" name="simE" id="OE" value="oe" required checked/>
                <label for="mtnE">MTN</label><input type="radio" name="simE" id="mtnE" value="mte" required/> )<br/>';
                }else if($sim_enfant == "M"){
                    echo ' 
                <label for="OE">Orange</label><input type="radio" name="simE" id="OE" value="oe" required />
                <label for="mtnE">MTN</label><input type="radio" name="simE" id="mtnE" value="mte" required checked/> )<br/>';
                }

                echo '
                <input type="text" name="telE" id="telE" required onblur="verifTelE()" id="telE" value="'.$telE.'"/><br/><br/>';

                if($sexeE == "M"){
                echo'
                <label>Sexe: </label>
                <label for="ME">M</label><input type="radio" name="sexeE" id="ME" value="me" required checked/>
                <label for="FE">F</label><input type="radio" name="sexeE" id="FE" value="fe" required/><br/><br/>
                ';
                }else if($sexeE == "F"){
                echo'
                <label>Sexe: </label>
                <label for="ME">M</label><input type="radio" name="sexeE" id="ME" value="me" required />
                <label for="FE">F</label><input type="radio" name="sexeE" id="FE" value="fe" required checked/><br/><br/>
                ';
                }

    echo'

                <label for="etablissement">Etablissement</label><br/>
                <input type="text" name="etablissement" required id="etablissement" value="'.$etablissement.'"><br/><br/>

                <label for="classe">Classe</label><br/>
                <input type="text" name="classe" id="classe" required value="'.$classe.'"/><br/><br/>

                <label for="concour">Concour</label><br/>
                <input type="text" name="concour" id="concour" required value="'.$concour.'"/><br/><br/>
            
            </fieldset>

            <input type="submit" value="Enregistrer"><br><br> <br>

            <p style="text-align: center;"><a href="view_member.php">Annuler</a></p>
           

        </form>

    </body>
    </html>
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
        <p style="text-align: center;">Retour a l\' <a href="edit_member.html" >Retour</a></p>

    </body>
    </html>
    ';
}

mysqli_close($idcon);
?>