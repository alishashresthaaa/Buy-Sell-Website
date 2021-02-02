// Getting all input text objects
var pass= document.forms["myForm"]["pass"];
var newPwd= document.forms["myForm"]["newPwd"];
var rPwd= document.forms["myForm"]["rePwd"];

// Getting id for display error message
var passError=document.getElementById("passError");
var npassError=document.getElementById("npassError");
var rpassError=document.getElementById("rpassError");

//Setting event Listener to the input text
pass.addEventListener("blur", passVerify, true);
newPwd.addEventListener("blur", npassVerify, true);
rPwd.addEventListener("blur", rpassVerify, true);



//Validation function to the text inputs
function errorDisplay(){
	
	//Password Check
	//if pass is empty
	if(pass.value=== "")
	{
		pass.style.border="1px solid red";
		passError.textContent="!Please enter your password";
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


	//New Password Check
	//if pass is empty
	if(newPwd.value=== "")
	{
		newPwd.style.border="1px solid red";
		npassError.textContent="! Please enter your password";
		newPwd.focus();
		return false;
	}

	//check if pass is character and number
	var passMatch = /^[0-9a-zA-z]+$/;
	if(!newPwd.value.match(passMatch))
	{
		newPwd.style.border="1px solid red";
		npassError.textContent="! Please enter letters and numbers only";
		newPwd.focus();
		return false;
	}

	//if password is 6 characters long
	if(newPwd.value.length<6)
	{
		newPwd.style.border="1px solid red";
		npassError.textContent="! Password should be 6 characters long";
		newPwd.focus();
		return false;
	}

	if(pass.value === newPwd.value)
	{
		rPwd.style.border="1px solid red";
		rpassError.textContent="! New and Old Password are same";
		rPwd.focus();
		return false;
	}


	//Re enter new password
	//if rePwd is empty
	if(rPwd.value=== "")
	{
		rPwd.style.border="1px solid red";
		rpassError.textContent="! Please re-enter your password";
		rPwd.focus();
		return false;
	}

	//check if password and repassword match
	if(newPwd.value != rPwd.value)
	{
		rPwd.style.border="1px solid red";
		rpassError.textContent="! The two password doesnot match";
		rPwd.focus();
		return false;
	}
}



	//IF THE INPUT AREA IS VALID
	//For password
	function passVerify()
	{
		var passMatch = /^[0-9a-zA-z]+$/;
		if((pass.value !="") && (pass.value.match(passMatch)))
		{
			pass.style.border="1px solid #5e6e66";
			passError.innerHTML="";
			return true;
		}
	}

	//For new password
	function npassVerify()
	{
		var passMatch = /^[0-9a-zA-z]+$/;
		if((newPwd.value !="") && (newPwd.value.match(passMatch)) && (!newPwd.value.length<6)&&(pass.value != newPwd.value))
		{
			newPwd.style.border="1px solid #5e6e66";
			npassError.innerHTML="";
			return true;
		}
	}

	//For re-password
	function rpassVerify()
	{
		if((rPwd.value !="") && (newPwd.value === rPwd.value))
		{
			rPwd.style.border="1px solid #5e6e66";
			rpassError.innerHTML="";
			return true;
		}
	}
	