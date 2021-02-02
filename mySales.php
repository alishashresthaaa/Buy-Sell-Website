<?php 
	session_start();
	include_once 'includes/dbh-inc.php';
	$email=$_SESSION['u_email'];  //you act as a seller in this. so the books you have sold or the request to purchase your books appears here
?>


<div><?php include_once 'browseHeader.php'; ?></div>


		<!-- Creating a modal for the sales -->		
		<div class="container-fluid" style="padding: 100px 40px 0px 40px;">
			
				<div class="table-wrapper">
					<!-- Starting of table of my sales -->
					<!-- Title of page -->
					<div class="table-title">
						<div class="row">
							<div class="col-md-3">
								<h2 class="header">My Sales</h2>  <!-- When you have acutally sold some books -->
								<p class="header-info">List of books you have sold.</p>
							</div>	
						</div>
					</div>

					<!-- Creating a button which when clicked shows the sales -->
					<div style="padding-bottom: 20px;">
						<button class="button title" type="button" data-toggle="collapse" data-target="#mySales" style="background-color:#57a0d3;">CLICK HERE TO SEE YOUR SALES</button>
					</div> 

					<!-- Creating a modal with a click of modal -->
					<div id="mySales" class="collapse">
						<!-- Table Header -->
						<table class="table table-light table-hover">
							<thead class="caption thead-dark">
								<tr>
									<th width="30%">Book Name</th>
									<th width="25%">Book Author</th>
									<th width="15%">Book Price</th>
									<th width="30%">Buyer</th>						
								</tr>
							</thead>


							<!-- Create  a loop of book-list from database where status=sold-->
							<?php 
							$sql1="SELECT * FROM book WHERE useremail='$email' AND status='sold'";
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
									<td><?php print $row1['buyer']; ?></td>						
								</tr>
									<?php 	
								}
							}
							else{  ?>
								<h3 class="caption col-md-9">You have not sold any books yet.</h3>
							<?php } ?>
							</tbody>
						</table>
					</div> <!-- End of id=mySales collapsable modal --> 
			</div> <!-- End of table wrapper -->
		</div> <!-- End of container-fluid -->




<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


	
	<div class="container-fluid" style="padding: 100px 40px 100px 40px;">
		<div class="table-wrapper">

			<!-- Title of page -->
			<div class="table-title">
				<div class="row">
					<div class="col-md-8">
						<h2 class="header"> Request for My Books</h2>
						<p class="header-info">See the users who have requested to purchase your books.</p>
					</div>	
				</div>
			</div>

			<!-- Table Header -->
			<table class="table table-light table-hover">
				<thead class="caption thead-dark">
						<tr>
							<th width="30%">Buyer</th>
							<th width="30%">Book Name</th>
							<th width="20%">Date Requested</th>
							<th width="10%">View Details</th>
							<!-- <th width="10%">Send Email</th> -->
							<th width="10%">Action</th>
							
						</tr>
					</thead>

				<!-- Create  a loop of book-list from database where status=pending. It is the list of request of buyer to purchase your books-->
				<?php 
				$sql="SELECT * FROM book WHERE useremail='$email' AND status='pending'";  //When somone request your book its status beacomes pending and your email act as the filter
				$result=mysqli_query($conn, $sql);
				$resultCheck=mysqli_num_rows($result);
				if($resultCheck >0)
				{
					while ($row= mysqli_fetch_assoc($result))
					{ 	
						$_SESSION['bookid']=$row['bookid'];
				?>	

				<tbody>
					<tr class="table-data">
						<td><?php print $row['buyer']; ?></td>
						<td><?php print $row['bookname']; ?></td>
						<td><?php print $row['ondate']; ?></td>
						<td>	
							<form method="get" action="book-details.php?bookid=<?php print $row['bookid']; ?>">
								<input type="hidden" name="bookid" value="<?php print $row['bookid']; ?>"/>
								<button class="btn btn-info" type="submit" name="submit" value="View Details" style="margin-top: 5px;">VIEW DETAILS</button>		 	
							</form>
						</td>
						<!-- <td>
							<a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php print $row['buyer'] ?>&su=Inquiry About Sales" ><button class="btn btn-success btn-md" style="background-color: green;">Send email</button></a>
						</td> -->
						<td id="status"  class="caption" > 
							<form  method="get"  action="includes/actionOnRequest-inc.php" >	
								 <input type="hidden"  name="bookid" value="<?php print $row['bookid']; ?>">
								 <input type="hidden"  name="useremail" value="<?php print $row['useremail']; ?>">
								  <input type="hidden"  name="buyer" value="<?php print $row['buyer']; ?>">
								  <input type="hidden"  name="bookname" value="<?php print $row['bookname']; ?>">

								<button type="submit" class="btn btn-success" name="accept" onclick="return acceptAlert()">  <!-- If you want to accept the request of purchase -->
									<i class="fas fa-check"></i>
								</button>
								<button type="submit" class="btn btn-danger" name="reject" onclick="return rejectAlert()"> <!-- If you want to reject the request of purchase -->
									<i class="fas fa-times"></i>
								</button>
							</form>
						</td>		
					</tr>
				<?php 	
					}
				}
				else
				{ ?>
					<h3 class="caption">There are no request of purchase.</h3>
		  <?php }  ?>
				
				</tbody>		
			</table>
		</div>
	</div>
	<!-- End of the table of my request-->











<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>


<!-- Javascript to create an alert -->
<script type="text/javascript">
	function acceptAlert()
	{
		var retVal = confirm("are you aure you want to accept this?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
	}

	function rejectAlert()
	{
		var retVal = confirm("are you aure you want to reject this?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
	}
</script>






