<?php 
	session_start();
	$requestedBy=$_SESSION['u_email'];
	include_once 'includes/dbh-inc.php';
 ?>

<div><?php include_once 'browseHeader.php'; ?></div>
	
		<div class="container-fluid" style="padding: 100px 40px 100px 40px;">
			<div class="table-wrapper">

				<!-- Title of page -->
				<div class="table-title">
					<div class="row">
						<div class="col-md-8">
							<h2 class="header">See Those Request</h2>
							<p class="header-info">See the users request who wants books you  might have stacked up in home.</p>
						</div>	
						<div class="col-md-3">
							<a href="requestYourBook.php"><h2 class="caption"><i class="fas fa-plus"></i>Request Book You Need</h2></a>
						</div>	
					</div>
				</div>



				<!-- Table Header -->
				<table class="table table-light table-hover" style="padding-bottom: 150px;">
					<thead class="caption thead-dark">
						<tr>
							<th width="25%">Requested By</th>
							<th width="20%">Name</th>
							<th width="20%">Author</th>
							<th width="25%">Publication</th>
							<th width="10%">Add Book</th>
						</tr>
					</thead>



				<!-- Create  a loop of book-list from database -->
				<?php 
				$sql="SELECT * FROM request WHERE requestStatus='onRequest' AND useremail <> '$requestedBy'";
				$result=mysqli_query($conn, $sql);
				$resultCheck=mysqli_num_rows($result);
				if($resultCheck >0)
				{
					while ($row= mysqli_fetch_assoc($result))
					{ 
				?>			


					<!-- Tabele Body where the book list is printed-->
					<tbody>
						<tr class="table-data">
							<td><?php print $row['useremail']; ?></td>
							<td><?php print $row['bookname']; ?></td>
							<td><?php print $row['bookauthor']; ?></td>
							<td><?php print $row['bookpub']; ?></td>
				    		<td>
				    			<form method="get" action="uploadRequestedBook.php">
				    				<input type="hidden" name="requestid" value="<?php print $row['requestid']; ?>">
				         		<button class="btn btn-success" name="edit" value="edit" ><i class="fas fa-plus"></i>  ADD BOOK</button>
				         		</form>
				        	 </td>
						</tr>
				<?php 
				}
					}
					else
					{
				 ?>
				 			<h3 class="caption">There are no request.</h3>
				<?php } ?>
					</tbody>
					<!-- End of loop -->			
				</table>
			</div> <!-- End of table wrapper -->


			<!-- Button for collapsable request area -->
			<div style="padding:100px 0px 20px 0px;">
				<button type="button" data-toggle="collapse" data-target="#myRequest" class="button title" style="background-color:#57a0d3;" >My Request</button>
			</div> 

			<!-- Collapsable area -->
			<div id="myRequest" class="collapse">
				<h3 class="header">My Request for books</h3>
				<p class="header-info">See the books you have requested to be uploaded.</p>
					<table class="table table-light table-hover">
						<thead class="caption thead-dark">
							<tr>
								<th width=30%>Name</th>
								<th width=30%>Author</th>
								<th width=30%>Publication</th>
								<th width=10%>Delete</th>
							</tr>
						</thead>

				<?php 
					$sql="SELECT * FROM request WHERE requestStatus='onRequest' AND useremail ='$requestedBy'";
					$result=mysqli_query($conn, $sql);
					$resultCheck=mysqli_num_rows($result);
					if($resultCheck >0)
					{
						while ($row= mysqli_fetch_assoc($result))
							{
				?>	

						<tbody class="table-data">
							<tr>
								<td><?php print $row['bookname']; ?></td>
								<td><?php print $row['bookauthor']; ?></td>
								<td><?php print $row['bookpub']; ?></td>
				    			<td>
				    				<form method="get" action="includes/deleteRequestedBook-inc.php" onsubmit="return deleteRequest()">
				    					<input type="hidden" name="requestid" value="<?php print $row['requestid']; ?>">
				         				<button class="btn btn-danger" name="delete" value="delete"><b>DELETE</b></button>
				         			</form>
				        	 	</td>
							</tr>
				<?php 
							}
					}
					else
					{
				 ?><!-- End of loop -->
				 				<h3 class="caption">You have no request.</h3>	
				 <?php } ?>
						</tbody>						
					</table>
			</div> <!-- End of div #myRequest -->
		</div> <!-- End of div container -->

	
	<!-- Include Footer -->
	<div class="sticky-bottom" style="padding-top: 100px;"><?php include_once 'footer.php'; ?></div>



	<!-- Javascript -->
	<script type="text/javascript">
		function deleteRequest()
		{
			var retVal = confirm("Are you sure you want to delete this request?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
		}
	</script>