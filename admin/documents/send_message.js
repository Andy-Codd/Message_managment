//Tableau qui va contenir les noms
// var nomsParents = new Array();
// var concours = new Array();
// var sexesParents = new Array();
// var nomsEnfants = new Array();
// var sexesEnfants = new Array();


var messages = new Array();

var regexNomP = /\(\-nom\_parent\-\)/g;
var regexNomE = /\(\-nom\_enfant\-\)/g;
var regexConcour = /\(\-concour\-\)/g;
var regexMonsieur = /\(\-monsieur\/madame\-\)/g;
var regexFils = /\(\-fils\/fille\-\)/g;
var regexIlElle = /\(\-il\/elle\-\)/g;

//Onclick pour placer une variable
function putVariable(value){
    document.getElementById("textarea1").value += "(-"+value+"-) ";
    document.getElementById("textarea1").focus();
}

// //Fonction pour generer les messages
// function finalMessage(){
    
//     var texte = document.getElementById("textarea1").value;

//     for(var i=0; i<nomsParents.length; i++){

//         //Mettre les noms de parents
//         if(regexNomP.test(texte)){
//             messages[i] = texte.replace(regexNomP, nomsParents[i]);
//         }else{
//             messages[i] = texte;
//         }

//         //Mettre les noms des enfants
//         if(regexNomE.test(messages[i])){
//             messages[i] = messages[i].replace(regexNomE, nomsEnfants[i]);
//         }

//         //Mettre les noms de concours
//         if(regexConcour.test(messages[i])){
//             messages[i] = messages[i].replace(regexConcour, concours[i]);
//         }

//         //Mettre un Monsieur ou un Madame
//         if(regexMonsieur.test(messages[i])){
//             if(sexesParents[i] == "M"){
//                 messages[i] = messages[i].replace(regexMonsieur, "Monsieur");
//             }else if(sexesParents[i] == "F"){
//                 messages[i] = messages[i].replace(regexMonsieur, "Madame");
//             }
//         }

//         //Mettre un fils ou fille
//         if(regexFils.test(messages[i])){
//             if(sexesEnfants[i] == "M"){
//                 messages[i] = messages[i].replace(regexFils, "fils");
//             }else if(sexesEnfants[i] == "F"){
//                 messages[i] = messages[i].replace(regexFils, "fille");
//             }
//         }

//         //Mettre un il ou elle
//         if (sexesEnfants[i] == "M") {
//             messages[i] = messages[i].replace(regexIlElle, "il");
//         }else if(sexesEnfants[i] == "F"){
//             messages[i] = messages[i].replace(regexIlElle, "elle");
//         }
//     }

// }

// function afficherMessage(){
//     if(messages[0] == undefined){
//         alert("Le message est vide pour l'instant")
//     }else{
//         for(var i in messages){
//             alert(messages[i]);
//         }
//     }
// }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


