	function checkPass() {
		var password = document.getElementById('pwd');
		var confirm  = document.getElementById('pwd1');
		var message = document.getElementById('confirm-message2');
		var good_color = "green";
		var bad_color  = "red";
		if(password.value == confirm.value){
			confirm.style.backgroundColor = good_color;
        	message.style.color           = good_color;
	    	message.innerHTML             = "OK!";
		}
		else {
        	confirm.style.backgroundColor = bad_color;
        	message.style.color           = bad_color;
        	message.innerHTML             = "Erreur!";
	    }
	}  
