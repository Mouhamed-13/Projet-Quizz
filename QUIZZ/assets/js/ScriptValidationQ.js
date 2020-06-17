function Submit1() {
	var pickedOne = false;
	var inputs = document.getElementsByClassName('text');
	var login=document.getElementById("input1q");
	var pwd=document.getElementById("input2q");
	var choix=document.getElementById('type');
			for(var i = 0, l = inputs.length; i < l; ++i) {
			if(inputs[i].value) {
				pickedOne = true;
				break;
			}
		}
	if(!pickedOne ) {
		if (!login.value){
		alert('Saisie la question !');
		}
		if (!pwd.value){
			alert('Saisie le score de la question !');
			}
			if (!choix.value){
				alert('Fait un choix des reponses !');
				}
	}
	else{
		alert('Enregistrement effectué !');
	}
	return pickedOne; 
}
      