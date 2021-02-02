
//Getting all input text objects
var bookName=document.forms["myForm"]["book_name"];
var bookAuthor=document.forms["myForm"]["book_author"];
var bookPublication=document.forms["myForm"]["book_publication"];

//Get id to display error message
var bookNameError=document.getElementById("bookNameError");
var bookAuthorError=document.getElementById("bookAuthorError");
var bookPublicationError=document.getElementById("bookPublicationError");


//Setting event listener to input text
bookName.addEventListener("blur", bookNameVerify, true);
bookAuthor.addEventListener("blur", bookAuthorVerify, true);
bookPublication.addEventListener("blur", bookPublicationVerify, true);



function errorDisplay()
{
	//Check for errors

	//For Book Name
	//if book name is empty
	if(bookName.value==="")
	{
		bookName.style.border="1px solid red";
		bookNameError.textContent="! Please enter book name";
		bookName.focus();
		return false;
	}

	//if book name is character
	var letters = /^[A-Za-z ]+$/;
	if(!bookName.value.match(letters))
	{
		bookName.style.border="1px solid red";
		bookNameError.textContent="! Please enter letters only";
		bookName.focus();
		return false;
	}


	//For Book Author
	//if book author is empty
	if(bookAuthor.value==="")
	{
		bookAuthor.style.border="1px solid red";
		bookAuthorError.textContent="! Please enter book author";
		bookAuthor.focus();
		return false;
	}

	//if book Author is character
	var letters = /^[A-Za-z ]+$/;
	if(!bookAuthor.value.match(letters))
	{
		bookAuthor.style.border="1px solid red";
		bookAuthorError.textContent="! Please enter letters only";
		bookAuthor.focus();
		return false;
	}


	//For Book Publication
	//if book publication is empty
	if(bookPublication.value==="")
	{
		bookPublication.style.border="1px solid red";
		bookPublicationError.textContent="! Please enter book publication";
		bookPublication.focus();
		return false;
	}

	//if book Publication is character
	var letters = /^[A-Za-z ]+$/;
	if(!bookPublication.value.match(letters))
	{
		bookPublication.style.border="1px solid red";
		bookPublicationError.textContent="! Please enter letters only";
		bookPublication.focus();
		return false;
	}

}

//if the input area is valid

//for book name
function bookNameVerify()
{
	var letters = /^[A-Za-z ]+$/;
	if((bookName.value !="") && (bookName.value.match(letters)))
	{
		bookName.style.border="1px solid #5e6e66";
		bookNameError.innerHTML="";
		return true;
	}
}


//for book Author
function bookAuthorVerify()
{
	var letters = /^[A-Za-z ]+$/;
	if((bookAuthor.value !="") && (bookAuthor.value.match(letters)))
	{
		bookAuthor.style.border="1px solid #5e6e66";
		bookAuthorError.innerHTML="";
		return true;
	}
}

//for book Publication
function bookPublicationVerify()
{
	var letters = /^[A-Za-z ]+$/;
	if((bookPublication.value !="") && (bookPublication.value.match(letters)))
	{
		bookPublication.style.border="1px solid #5e6e66";
		bookPublicationError.innerHTML="";
		return true;
	}
}

