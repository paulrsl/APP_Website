function PasswordSize(){
	const password = document.getElementById("password");
	const password1 = document.getElementById("firstPassword");
	const password2 = document.getElementById("secondPassword");

	var expressionReguliere = /\w{8,15}/;
	if (expressionReguliere.test(password1.value))
	{
		if (password1.value === password2.value){
			password.textContent = "Same password";
			password.style.color="#7CFC00";
			document.getElementById("submit").disabled= false;

		}else{
			password.textContent = "Different password";
			password.style.color="orange";
			document.getElementById("submit").disabled = true;
		}
	}
	else
	{
		password.textContent = "The password require 8 characters and 1 number";
		password.style.color="#FF0000";
		document.getElementById("submit").disabled = true;
	}
}