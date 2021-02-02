
// Getting all input text objects
var fname= document.forms["myForm"]["fname"];
var lname= document.forms["myForm"]["lname"];
var email= document.forms["myForm"]["email"];
var pass= document.forms["myForm"]["pass"];
var rpass= document.forms["myForm"]["rpass"];



// Getting id for display error message
var fnameError=document.getElementById("fnameError");
var lnameError=document.getElementById("lnameError");
var emailError=document.getElementById("emailError");
var passError=document.getElementById("passError");
var rpassError=document.getElementById("rpassError");



//Setting event Listener to the input text
fname.addEventListener("blur", fnameVerify, true);
lname.addEventListener("blur", lnameVerify, true);
email.addEventListener("blur", emailVerify, true);
pass.addEventListener("blur", passVerify, true);
rpass.addEventListener("blur", rpassVerify, true);



//Validation function to the text inputs
function errorDisplay(){
	

	// Fname Check
	//if fname is empty
	if(fname.value=== "")
	{
		fname.style.border="1px solid red";
		fnameError.textContent="! Please enter your first name";
		fname.focus();
		return false;
	}

	//check if fname is character
	var letters = /^[A-Za-z]+$/;
	if(!fname.value.match(letters))
	{
		fname.style.border="1px solid red";
		fnameError.textContent="! Please enter letters only";
		fname.focus();
		return false;
	}


	//Lname Check
	//if lname is empty
	if(lname.value=== "")
	{
		lname.style.border="1px solid red";
		lnameError.textContent="! Please enter your last name";
		lname.focus();
		return false;
	}

	//check if lname is character
	var letters = /^[A-Za-z]+$/;
	if(!lname.value.match(letters))
	{
		lname.style.border="1px solid red";
		lnameError.textContent="! Please enter letters only";
		lname.focus();
		return false;
	}


	//Email Check
	//if email is empty
	if(email.value=== "")
	{
		email.style.border="1px solid red";
		emailError.textContent="! Please enter your email";
		email.focus();
		return false;
	}

	//if email is valid
	var mailFormat= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(!email.value.match(mailFormat))
	{
		email.style.border="1px solid red";
		emailError.textContent="! Invalid email format";
		email.focus();
		return false;
	}

	//check if email already exists
	

	//Password Check
	//if pass is empty
	if(pass.value=== "")
	{
		pass.style.border="1px solid red";
		passError.textContent="! Please enter your password";
		pass.focus();
		return false;
	}

	//check if pass is character and number
	var passMatch = /^[0-9a-zA-z]+$/;
	if(!pass.value.match(passMatch))
	{
		pass.style.border="1px solid red";
		passError.textContent="! Please enter letters and numbers only";
		pass.focus();
		return false;
	}

	//if password is 6 characters long
	if(pass.value.length<6)
	{
		pass.style.border="1px solid red";
		passError.textContent="! Password should be 6 characters long";
		pass.focus();
		return false;
	}


	// Re-passwod Check
	//if rpass is empty
	if(rpass.value=== "")
	{
		rpass.style.border="1px solid red";
		rpassError.textContent="! Please re-enter your password";
		rpass.focus();
		return false;
	}

	//check if password and repassword match
	if(pass.value != rpass.value)
	{
		rpass.style.border="1px solid red";
		rpassError.textContent="! The two password doesnot match";
		rpass.focus();
		return false;
	}

}



	//IF THE INPUT AREA IS VALID

	//For fname
	function fnameVerify()
	{
		var letters = /^[A-Za-z]+$/;
		if((fname.value !="") && (fname.value.match(letters)))
		{
			fname.style.border="1px solid #5e6e66";
			fnameError.innerHTML="";
			return true;
		}
	}

	//For lname
	function lnameVerify()
	{
		var letters = /^[A-Za-z]+$/;
		if((lname.value !="") && (lname.value.match(letters)))
		{
			lname.style.border="1px solid #5e6e66";
			lnameError.innerHTML="";
			return true;
		}
	}
	
	//For email
	function emailVerify()
	{
		var mailFormat= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if((email.value !="") && (email.value.match(mailFormat)))
		{
			email.style.border="1px solid #5e6e66";
			emailError.innerHTML="";
			return true;
		}
	}

	//For password
	function passVerify()
	{
		var passMatch = /^[0-9a-zA-z]+$/;
		if((pass.value !="") && (pass.value.match(passMatch)) && (!pass.value.length<6))
		{
			pass.style.border="1px solid #5e6e66";
			passError.innerHTML="";
			return true;
		}
	}

	//For re-password
	function rpassVerify()
	{
		if((rpass.value !="") && (pass.value === rpass.value))
		{
			rpass.style.border="1px solid #5e6e66";
			rpassError.innerHTML="";
			return true;
		}
	}
	

