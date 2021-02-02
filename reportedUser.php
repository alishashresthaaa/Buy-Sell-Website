<div><?php include_once 'adminHeader.php'; ?></div>



<?php 
		session_start();
		// $culprit=$_SESSION['culprit'];
		include_once 'includes/dbh-inc.php';

		if(isset($_GET['useremail']))
		{
			$culprit=$_GET['useremail'];
			$sql="SELECT * FROM reportuser WHERE culprit='$culprit'";
			$result=mysqli_query($conn, $sql);
			$resultCheck=mysqli_num_rows($result);
				
		?>

		<!-- Include header -->

	
	<div class="container-fluid" style="padding: 100px 40px 100px 40px;">
		<div class="table-wrapper">

			<!-- Title of page -->
			<div class="table-title">
				<div class="row">
					<div class="col-md-6">
						<h2 class="header">Reports</h2>
						<p class="header-info">The list of reports for this user</p>
					</div>	
					<div class="col-md-5">
						<form method="get" action="includes/deleteUser-inc.php?culprit=<?php print "$culprit"; ?>" onsubmit="return deleteUser()">
				         	<input type="hidden" name="culprit" value="<?php print "$culprit"; ?>">
				         	<button class="btn btn-danger btn-lg" name="delete" value="delete"><i class="fas fa-trash-alt">DELETE THIS USER?</i></button>
				         </form>	
					</div>	
				</div>
			</div>

			<!-- Table Header -->
			<table class="table table-light table-hover">
				<thead class="caption thead-dark">
					<tr>
						<th width="50%">Reported By:</th>
						<th width="50%">Reason:</th>
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
					<tr class="table-data">
						<td><?php print $row['reporter']; ?></td>
						<td><?php print $row['reportreason']; ?></td>
					</tr>
						<?php 
				}
					}else
					{?>
						 <h3 class="caption col-md-9">There are no reports yet..</h3>
			<?php	}
		}
				 ?><!-- End of loop -->
				</tbody>							
			</table>
		</div>
	</div>
</div>
	<!-- End of the table -->


<!-- Include Footer -->
<div class="sticky-bottom"><?php include_once 'footer.php'; ?></div>



<!-- Javascript -->
<script type="text/javascript">
	function deleteUser()
	{
		var retVal = confirm("Are you sure you want to delete this user?");
        if( retVal == true ) {
            return true;
         } else {                
            return false;
         }
	}
</script>



