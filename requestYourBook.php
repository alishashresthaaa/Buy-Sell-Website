<div><?php include_once 'browseHeader.php'; ?></div>

	<div class="container" style="padding-top: 100px;">
		<div class="row justify-content-center form-jar" style="height: 560px;">
			<div class="col-md-8">
				<h3 class="header">Request Books you need Here!</h3>
				<p class="header-info">Request the book you are looking for to other users on website.</p>
				<form method="post" class="form-container"  name="myForm" onsubmit="return errorDisplay()" action="includes/requestYourBook-inc.php" enctype="multipart/form-data">

					<div class="form-group">
						<label for="bookName" class="form-text">Name of Book:</label>
						<input type="text" class="form-control" name="book_name" placeholder="Enter book name" autocomplete="off">
						<span id="bookNameError" class="displayError"></span>
					</div>	

					<div class="form-group">
						<label for="bookAuthor" class="form-text">Name of Book Author:</label>
						<input type="text" class="form-control" name="book_author" placeholder="Enter book author" autocomplete="off">
						<span id="bookAuthorError" class="displayError"></span>
					</div>

					<div class="form-group">
						<label for="bookPublication" class="form-text">Name of Book Publication:</label>
						<input type="text" class="form-control" name="book_publication" placeholder="Enter book publication" autocomplete="off">
						<span id="bookPublicationError" class="displayError"></span>
					</div>


					<button type="submit" class="btn btn-success" name="submit">Request Book</button>
				</form>
			</div>
		</div>
	</div>

<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>

<!-- Javascript -->
<script src="js/requestYourBook.js"></script>