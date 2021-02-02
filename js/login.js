// Getting all the text input objects
var email= document.forms["myForm"]["email"];
var pass= document.forms["myForm"]["pass"];

// Getting id for display error message
var emailError=document.getElementById("emailError");
var passError=document.getElementById("passError");

//Setting event Listener to the input text
email.addEventListener("blur", emailVerify, true);
pass.addEventListener("blur", passVerify, true);

function errorDisplay()
{
	//Email Check
	//if email is empty
	if(email.value=== "")
	{
		email.style.border="1px solid red";
		emailError.textContent="! Please enter your email";
		email.focus();
		return false;
	}

	//Password Check
	//if pass is empty
	if(pass.value=== "")
	{
		pass.style.border="1px solid red";
		passError.textContent="! Please enter your password";
		pass.focus();
		return false;
	}
}


//For email
function emailVerify()
{
	if(email.value !="") 
	{
		email.style.border="1px solid #5e6e66";
		emailError.innerHTML="";
		return true;
	}
}

//For password
function passVerify()
{
	if(pass.value !="") 
	{
		pass.style.border="1px solid #5e6e66";
		passError.innerHTML="";
		return true;
	}
}



