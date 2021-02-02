 <?php

 session_start();
  if (isset($_POST['submit'])) {

      include_once 'dbh-inc.php';

      $id=$_SESSION['u_email'];
      $book_name=$_POST['book_name'];
      $book_author=$_POST['book_author'];
      $book_publication=$_POST['book_publication'];

     $sql = "INSERT INTO request (useremail, bookname, bookauthor, bookpub)  VALUES ('$id', ' $book_name', '$book_author','$book_publication')";
      mysqli_query($conn, $sql);
      header("Location: ../seeThoseRequest.php?request=success");
     exit();
  }
  else
  {
    header("Location: ../seeThoseRequest.php");
    exit();
  }

