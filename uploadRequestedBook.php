<?php 
	session_start();
	 if (isset($_GET['requestid']))
	  {
	 	include_once 'includes/dbh-inc.php';

	 	$id= $_GET['requestid'];
	}
	$sql="SELECT * FROM request WHERE requestid='$id'";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	


 ?> 
<div><?php include_once 'browseHeader.php'; ?></div>

	<div class="container" style="padding-top: 100px;">
		<div class="row justify-content-center form-jar" style="height: 1000px;">
			<div class="col-md-8">
				<h3 class="header" style="padding-bottom: 30px;">UPload the request here!</h3>
			<form method="post" class="form-container"  name="myForm" onsubmit="return errorDisplay()" action="includes/upload-inc.php" enctype="multipart/form-data">

				<?php if($resultCheck>0){

	while ($row= mysqli_fetch_assoc($result))
				{ 	
					$_SESSION['bookid']=$row['requestid'];


					?>


					<div class="form-group">
						<label for="bookName" class="form-text">Name of Book:</label>
						<input type="text" class="form-control" name="book_name" placeholder="Enter book name" autocomplete="off" value="<?php print $row['bookname'];?>">
						<span id="bookNameError" class="displayError"></span>
					</div>

					<div class="form-group">
						<label for="bookImage" class="form-text">Upload Book Image:</label>
						<input type="file" class="form-control-file border" name="photo" autocomplete="off">
						<span id="bookImageError" class="displayError"></span>
					</div>

				

					<div class="form-group">
						<label for="bookAuthor" class="form-text">Name of Book Author:</label>
						<input type="text" class="form-control" name="book_author" placeholder="Enter book author" autocomplete="off" value="<?php print $row['bookauthor'];?>">
						<span id="bookAuthorError" class="displayError"></span>
					</div>

					<div class="form-group">
						<label for="bookPublication" class="form-text">Name of Book Publication:</label>
						<input type="text" class="form-control" name="book_publication" placeholder="Enter book publication" autocomplete="off" value="<?php print $row['bookpub'];?>">
						<span id="bookPublicationError" class="displayError"></span>
					</div>

					<div class="form-group">
						<label for="bookDetails" class="form-text">Short Details of Book:</label>
						<textarea type="text" rows="3" class="form-control" name="book_details" placeholder="Enter book details" autocomplete="off"></textarea>
						<span id="bookDetailsError" class="displayError"></span>
					</div>

					<div class="form-group">
						<label for="bookPrice" class="form-text">Enter Book Price:</label>
						<input type="text" class="form-control" name="book_price" placeholder="Enter book price" autocomplete="off">
						<span id="bookPriceError" class="displayError"></span>
					</div>


			<?php }}  ?>

				<button type="submit" class="btn btn-success" name="submit">Upload Requested Book</button>
			</form>
		</div>
	</div>
</div>

<?php 
	if (isset($_GET['requestid']))
	  {
	 	include_once 'includes/dbh-inc.php';

	 	$id= $_GET['requestid'];
	}
	$sql="UPDATE request SET requestStatus='requestAccept' WHERE requestid='$id'";
	mysqli_query($conn,$sql);
	
 ?>
	
<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>

<!-- Javascript -->
<script src="js/upload.js"></script>