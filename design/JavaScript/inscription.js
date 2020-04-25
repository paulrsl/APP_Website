function PasswordSize(){
	const password = document.getElementById("password");
	const password1 = document.getElementById("firstPassword");
	const password2 = document.getElementById("secondPassword");
	if(password1.value.length >= 5){
		if (password1.value === password2.value){
			password.textContent = "Same password";
			password.style.color = "rgb(0,220,0)";
			document.getElementById("submit").disabled= false;

		}else{
			password.textContent = "Different password";
			password.style.color = "rgb(255,0,0)";
			document.getElementById("submit").disabled = true;
		}
	}else {
		password.textContent = "The password requires 5 characters";
		password.style.color = "rgb(0,0,0)";
		document.getElementById("submit").disabled = true;
	}
}

