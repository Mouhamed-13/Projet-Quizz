function Submit() {
	var pickedOne = false;
	var inputs = document.getElementsByClassName('text');
		for(var i = 0, l = inputs.length; i < l; ++i) {
			if(inputs[i].value) {
				pickedOne = true;
				break;
			}
		}
	if(!pickedOne ) {
		alert('Remplissez tous les champs !');
	}
	else{
		alert('Donnees envoyees');
	}
	return pickedOne; 
}