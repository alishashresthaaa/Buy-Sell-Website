// function to create alert
 // Request book to the seller
 function requestBook()
 {
 	var retVal = confirm("Do you want to make request ?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
 }

 // Submit the feedback to the seller
  function submitFeedback()
 {
 	var retVal = confirm("Are you sure to submit the feedback?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
 }


// Report the seller to the admin
  function reportSeller()
 {
 	var retVal = confirm("Are you sure to report the seller?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
 }