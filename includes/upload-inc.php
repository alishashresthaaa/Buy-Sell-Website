<?php

session_start();

if (isset($_POST['submit'])) {

  $target= "../images/".basename($_FILES['photo']['name']);

  include 'dbh-inc.php';

      $id=$_SESSION['u_email'];
      $book_name= mysqli_real_escape_string($conn,$_POST['book_name']);
      $image=$_FILES['photo']['name'];
      $book_author= mysqli_real_escape_string($conn,$_POST['book_author']);
      $book_publication= mysqli_real_escape_string($conn,$_POST['book_publication']);
      $book_details= mysqli_real_escape_string($conn,$_POST['book_details']);
      $book_price= mysqli_real_escape_string($conn,$_POST['book_price']);

      $sql = "INSERT INTO book(useremail, bookname, bookimage, bookauthor, bookpub, bookdetails, bookprice) 
      VALUES ('$id', ' $book_name', '$image' ,  '$book_author','$book_publication','$book_details','$book_price')";
      mysqli_query($conn, $sql);
      if(move_uploaded_file($_FILES['photo']['tmp_name'], 
      $target))
    {
      header("Location: ../list.php?upload=success");
    exit();

    }else{
header("Location: ../upload.php?upload=error");
exit();
}            


}
else{
  header("Location: ../upload.php?upload=error");
  exit();
}


?>