
<?php
	 session_start(); 
	include_once 'includes/dbh-inc.php';
	$email=$_SESSION['u_email'];

	$sql="SELECT * FROM book WHERE useremail='$email' ORDER BY bookid DESC"; //Select the list of book from database where useremail is equal to logged in email
	$result=mysqli_query($conn, $sql);
	$resultCheck=mysqli_num_rows($result);
?>
	

<!-- Include header -->
<div><?php include_once 'browseHeader.php'; ?></div>
	
	<div class="container-fluid" style="padding: 100px 40px 100px 40px;">
		<div class="table-wrapper">

			<!-- Title of page -->
			<div class="table-title">
				<div class="row">
					<div class="col-md-9">
						<h2 class="header">My List</h2>
						<p class="header-info">The list of books you have uploaded</p>
					</div>	
					<div class="col-md-3">
						<a href="upload.php"><h2 class="caption"><i class="fas fa-plus"></i>Add New Book</h2></a>
					</div>	
				</div>
			</div>

			<!-- Table Header -->
			<table class="table table-light table-hover">
				<thead class="caption thead-dark">
					<tr>
						<th width="20%">Name</th>
						<th width="20%">Author</th>
						<th width="20%">Publication</th>
						<th width="10%">Price</th>
						<th width="10%">Status</th>
						<th width="10%">Image</th>
						<th width="5%"><i class="fas fa-pen"></i></th>
						<th width="5%"><i class="fas fa-trash-alt"></i></th>
					</tr>
				</thead>

				<!-- Create  a loop of book-list from database -->
				<?php 
				if($resultCheck >0)
				{
					while ($row= mysqli_fetch_assoc($result))
					{ 	
				?>			

				<!-- Tabele Body where the book list is printed-->
				<tbody class="table-data">
					<tr>
						<td><?php print $row['bookname']; ?></td>
						<td><?php print $row['bookauthor']; ?></td>
						<td><?php print $row['bookpub']; ?></td>
						<td><?php print $row['bookprice']; ?></td>
						<td><?php print $row['status']; ?></td>
						<td>
				    		<img src= "images/<?php print $row['bookimage']; ?>" class="mr-3 img-thumbnail" style="width:80px; height: 80px;">
				    	</td>
				    	<td>
				    		<form method="get" action="updateBook.php">
				         		<input type="hidden" name="bookid" value="<?php print $row['bookid']; ?>">
				         	<button class="btn btn-default" name="edit" value="edit"><i class="fas fa-pen"></i></button>
				         	</form>
				         </td>
				         <td> 
				         	<form method="get" action="includes/deleteBook-inc.php?bookid=<?php print $row['bookid']; ?>" onsubmit="return deleteBook()">
				         		<input type="hidden" name="bookid" value="<?php print $row['bookid']; ?>">
				         	<button class="btn btn-default" name="delete" value="delete"><i class="fas fa-trash-alt"></i></button>
				         </form>		         
				         </td>
					</tr>
						<?php 
				}
					}else
					{?>
						 <h3 class="caption">You have not uploaded any books yet.</h3>
			<?php	}
				 ?><!-- End of loop -->
				</tbody>							
			</table>
		</div>
	</div>
	<!-- End of the table -->


<!-- Include Footer -->
<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>



<!-- Javascript -->
<script type="text/javascript">
	function deleteBook()
	{
		var retVal = confirm("Are you sure you want to delete this book?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
	}
</script>



