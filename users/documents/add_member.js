//Verification du formulaire
var regexTel = /^\d{3}\s?(\d{2}\s?){3}$/;

function verifTelP(){
	var telP = document.getElementById("telP");
	if (regexTel.test(telP.value)){
		telP.style.backgroundColor = "transparent";
		return regexTel.test(telP.value);
	}else {
		telP.style.backgroundColor= "#f002";
		return regexTel.test(telP.value);
	}
}

function verifTelE(){
	var telE = document.getElementById("telE");
	if(regexTel.test(telE.value)){
		telE.style.backgroundColor = "transparent";
		return regexTel.test(telE.value);
	}else{
		telE.style.backgroundColor = "#f002";
		return regexTel.test(telE.value);
	}
}

function verifSubmit(){
	var verif = (verifTelP() && verifTelE());
	if(verif == true)
		return true;
	else{
		alert("Impossible d'enrgistrer, vous devez rectifier les champs marqué au rouge");
		return false;
	}
}

