<?php 
	session_start();
	include_once 'includes/dbh-inc.php';
	$buyer=$_SESSION['u_email'];  //When you are the purchasing a book you act as a buyer. bboks you purchased from browse list appear here
	

?>

<!-- INclude header -->
<div><?php include_once 'browseHeader.php'; ?></div>
	
	<!-- Starting of table of my sales -->
	<div class="container-fluid" style="padding: 100px 40px 100px 40px;">
		<div class="table-wrapper">

			<!-- Title of page -->
			<div class="table-title">
				<div class="row">
					<div class="col-md-6">
						<h2 class="header">My Purchases</h2>   <!-- This is the list of books you have actually purchased from seller -->
						<p class="header-info">The list of books you have purchased already. </p>
					</div>	
				</div>
			</div>

			<!-- Creating a button which when clicked shows the sales -->
			<div style="padding-bottom: 20px;">
				<button class="button title" type="button" data-toggle="collapse" data-target="#myPurchase" style="background-color:#57a0d3;">CLICK HERE TO SEE YOUR PURCHASE</button>
			</div> 

			<!-- Creating a modal with a click of modal -->
			<div id="myPurchase" class="collapse">
				<!-- Table Header -->
				<table class="table table-light table-hover">
					<thead class="caption thead-dark">
						<tr>
							<th width="30%">Book Name</th>
							<th width="25%">Book Author</th>
							<th width="15%">Book Price</th>
							<th width="30%">Seller</th>						
						</tr>
					</thead>


					<!-- Create  a loop of book-list from database where status=sold-->
					<?php 
					$sql1="SELECT * FROM book WHERE buyer='$buyer' AND status='sold'";
					$result1=mysqli_query($conn, $sql1);
					$resultCheck1=mysqli_num_rows($result1);
					if($resultCheck1 >0)
					{
						while ($row1= mysqli_fetch_assoc($result1))
						{ 	
					?>	

					<tbody>
						<tr class="table-data">
							<td><?php print $row1['bookname']; ?></td>
							<td><?php print $row1['bookauthor']; ?></td>
							<td><?php print $row1['bookprice']; ?></td>
							<td><?php print $row1['useremail']; ?></td>						
						</tr>
							<?php 	
						}
					}
					else{ ?>
							<h3 class="caption">You have not purchased any books yet. </h3>
		        <?php   }	?>
					</tbody>
				</table>
			</div> <!-- End of id=myPurchase collapsable modal -->	
		</div> <!-- End of table-wrapper -->
	</div> <!-- End of container-fluid -->


<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


	<div class="container-fluid" style="padding: 100px 40px 100px 40px;">
		<div class="table-wrapper">

			<!-- Title of page -->
			<div class="table-title">
				<div class="row">
					<div class="col-md-6">
						<h2 class="header">Books that i have requested to buy</h2> <!-- When your purchase request hasn not been accpeted by the seller yet -->
						<p class="header-info">The list of books you have requested to buy</p>
					</div>	
				</div>
			</div>

			<!-- Table Header -->
			<table class="table table-light table-hover">
				<thead class="caption thead-dark">
					<tr>
						<th width="30%">Seller</th>
						<th width="30%">Book Name</th>
						<th width="20%">View Details</th>
						<!-- <th width="10%">Send Email</th> -->
						<th width="20%">Delete Request</th>
					</tr>
				</thead>

				<!-- Create  a loop of book-list from database where status=pending-->
				<?php 
				$sql="SELECT * FROM book WHERE buyer='$buyer' AND status='pending'";
				$result=mysqli_query($conn, $sql);
				$resultCheck=mysqli_num_rows($result);
				if($resultCheck >0)
				{
					while ($row= mysqli_fetch_assoc($result))
					{ 	
						
				?>	

				<tbody>
					<tr class="table-data">
						<td><?php print $row['useremail']; ?></td>
						<td><?php print $row['bookname']; ?></td>
						<td>	
							<form method="get" action="book-details.php?bookid=<?php print $row['bookid']; ?>">
								<input type="hidden" name="bookid" value="<?php print $row['bookid']; ?>"/>
								<button class="btn btn-info" type="submit" name="submit" value="View Details" style="margin-top: 5px;">VIEW DETAILS</button>		 	
							</form>
						</td>
						<!-- <td>
							<a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php print $row['useremail'] ?>&su=Inquiry About Purchase" ><button class="btn btn-success btn-md" style="background-color: green;">Send email</button></a>
						</td> -->
						<td> 
							<form  method="get"  action="includes/actionOnPurchase-inc.php" >	
								<input type="hidden"  name="bookid" value="<?php print $row['bookid']; ?>">
								<button type="submit" class="btn btn-danger" name="delete" onclick="return deleteAlert()"> <!-- If you want to delete your request on purchase to seller -->
									<i class="fas fa-times"></i> DELETE
								</button>
							</form>
						</td>		
					</tr>
				<?php 	
					}
				} 
				else{?>
					<h3 class="caption">You have not requested for any purchase yet. </h3>
			  <?php }	?>
				</tbody>		
			</table>
		</div>
	</div>
	<!-- End of the table of my purchase request-->


	<!-- Include Footer -->
<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>


<!-- Javascript to create an alert -->
<script type="text/javascript">
	function deleteAlert()
	{
		var retVal = confirm("Are you sure you want to delete this request of purchase?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
		
	}
</script>