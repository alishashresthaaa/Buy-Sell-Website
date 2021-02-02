
<?php 
	include_once 'includes/dbh-inc.php';

	$sql="SELECT * FROM book ORDER BY bookid DESC";
	$result=mysqli_query($conn, $sql);
	$resultCheck=mysqli_num_rows($result);
?>

<div><?php include_once 'adminHeader.php'; ?></div>
	
	<div class="container-fluid" style="padding: 100px 40px 100px 40px;">
		<div class="table-wrapper">

			<!-- Title of page -->
			<div class="table-title">
				<div class="row">
					<div class="col-md-3">
						<h2 class="header">Book List</h2>
						<p class="header-info">The list of books users have uploaded</p>
					</div>	
				</div>
			</div>


			<!-- Table Header -->
			<table class="table table-light table-hover">
				<thead class="caption thead-dark">
					<tr>
						<th width="14%">UserEmail</th>
						<th width="14%">Name</th>
						<th width="14%">Author</th>
						<th width="14%">Publication</th>
						<th width="5%">Price</th>
						<th width="5%">Status</th>
						<th width="30%">Details</th>
						<th width="10%">Image</th>
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
				<tbody>
					<tr>
						<td><?php print $row['useremail']; ?></td>
						<td><?php print $row['bookname']; ?></td>
						<td><?php print $row['bookauthor']; ?></td>
						<td><?php print $row['bookpub']; ?></td>
						<td><?php print $row['bookprice']; ?></td>
						<td><?php print $row['status']; ?></td>
						<td><?php print $row['bookdetails']; ?></td>
						<td>
				    		<img src= "images/<?php print $row['bookimage']; ?>" class="mr-3 mt-3 rounded-circle" style="width:100px; height: 100px;">
				    	</td>
					</tr>
						<?php 
				}
					}else
					{?>
						 <h3 class="caption">There are no books yet.</h3>
			<?php	}
				 ?><!-- End of loop -->
				</tbody>							
			</table>
		</div>
	</div>
	<!-- End of the table -->


<!-- Include Footer -->
<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>
