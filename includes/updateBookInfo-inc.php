 <?php

 session_start();
  if (isset($_POST['updatebook'])) {

    print $_FILES['photo']['name'];

    $target= "../images/".basename($_FILES['photo']['name']);

      include_once 'dbh-inc.php';

      $id=$_SESSION['bookid'];
      $book_name=$_POST['book_name'];
      $image=$_FILES['photo']['name'];
      $book_author=$_POST['book_author'];
      $book_publication=$_POST['book_publication'];
      $book_details=$_POST['book_details'];
      $book_price=$_POST['book_price'];

       
       print "$image";
     $sql="UPDATE book SET bookname='$book_name', bookimage='$image' ,bookauthor='$book_author', bookpub='$book_publication', bookdetails='$book_details', bookprice='$book_price' WHERE bookid='$id'";
       mysqli_query($conn, $sql);

       if(move_uploaded_file($_FILES['photo']['tmp_name'], 
                            $target))
                          {
                            header("Location: ../list.php?upload=success");
                          exit();
                      
                          }else{
             header("Location: ../list.php?upload=error");
             exit();
       }            
  }
  else
  {
    header("Location: ../list.php");
    exit();
  }

