//Getting all input text objects
var bookName=document.forms["myForm"]["book_name"];
var bookImage=document.forms["myForm"]["photo"];
var bookAuthor=document.forms["myForm"]["book_author"];
var bookPublication=document.forms["myForm"]["book_publication"];
var bookDetails=document.forms["myForm"]["book_details"];
var bookPrice=document.forms["myForm"]["book_price"];


//Get id to display error message
var bookNameError=document.getElementById("bookNameError");
var bookImageError=document.getElementById("bookImageError");
var bookAuthorError=document.getElementById("bookAuthorError");
var bookPublicationError=document.getElementById("bookPublicationError");
var bookDetailsError=document.getElementById("bookDetailsError");
var bookPriceError=document.getElementById("bookPriceError");


//Setting event listener to input text
bookName.addEventListener("blur", bookNameVerify, true);
bookImage.addEventListener("blur", bookImageVerify, true);
bookAuthor.addEventListener("blur", bookAuthorVerify, true);
bookPublication.addEventListener("blur", bookPublicationVerify, true);
bookDetails.addEventListener("blur", bookDetailsVerify, true);
bookPrice.addEventListener("blur", bookPriceVerify, true);



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


	//For Book Image
	//if book image is not selected
	if(bookImage.value==="")
	{
		bookImage.style.border="1px solid red";
		bookImageError.textContent="! Please select image";
		bookImage.focus();
		return false;
	}

	//Book image extension
	var bookImage1=bookImage.value;
	var fileExt=bookImage1.substr(bookImage1.lastIndexOf('.')+1).toLowerCase();
    var allowed= ['jpg' ,'jpeg' ];
   	if(bookImage1.length>0)  
	 {
	   	if(allowed.indexOf(fileExt) === -1)
	     {
	     	bookImage.style.border="1px solid red";
			bookImageError.textContent="! Please select .jpg or .jpeg";
			bookImage.focus();
			return false;
	     }
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


	//For Book Details
	//if book details is empty
	if(bookDetails.value==="")
	{
		bookDetails.style.border="1px solid red";
		bookDetailsError.textContent="! Please enter book details";
		bookDetails.focus();
		return false;
	}
	
	if(bookDetails.value.length<20)
	{
		bookDetails.style.border="1px solid red";
		bookDetailsError.textContent="! Please enter more details";
		bookDetails.focus();
		return false;
	}


	//For Book Price
	//if book price is empty
	if(bookPrice.value==="")
	{
		bookPrice.style.border="1px solid red";
		bookPriceError.textContent="! Please enter book price";
		bookPrice.focus();
		return false;
	}

	//if book price is number
	var num= /^[0-9]+$/;
	if(!bookPrice.value.match(num))
	{
		bookPrice.style.border="1px solid red";
		bookPriceError.textContent="! Please enter numbers";
		bookPrice.focus();
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

//for book Image
function bookImageVerify()
{
	var bookImage1=bookImage.value;
	var fileExt=bookImage1.substr(bookImage1.lastIndexOf('.')+1).toLowerCase();
    var allowed= ['jpg' ,'jpeg' ];
   	if((bookImage.value!="") && (bookImage1.length<=0)) 
	 {
	   	bookImage.style.border="1px solid #5e6e66";
		bookImageError.innerHTML="";
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

//for book Details
function bookDetailsVerify()
{
	if((bookDetails.value !="") && (!bookDetails.value.length<20))
	{
		bookDetails.style.border="1px solid #5e6e66";
		bookDetailsError.innerHTML="";
		return true;
	}
}


//for book price
function bookPriceVerify()
{
	var num= /^[0-9]+$/;
	if((bookPrice.value !="") && (bookPrice.value<3000) && (bookPrice.value.match(num)))
	{
		bookPrice.style.border="1px solid #5e6e66";
		bookPriceError.innerHTML="";
		return true;
	}
}