<!-- HEAD AREA -->
<?php 
	include("others/functions.php"); 
	include("others/head.php");
?>

<body>
	<div class="container">
		<!-- HEADER AREA -->
		<?php include("others/header.php"); ?>
		
		<!-- BANNER AREA -->
		<div class="banner">

			<!-- SIDEBAR AREA -->
			<?php 
			$this_page = "transact";
			include("others/sidebar.php"); ?>

			<!-- BANNER CONTENT -->
			<section class="banner-con">
				<div class="wrapper">
					<div class="banner-div">
						<h2><a href="purchase.php">Purchase</a> <span>> <a href="status.php?purchaseid=<?php echo $_GET['purchaseid']; ?>">Status</a></span> <span>> Details</span></h2>

						<?php
						##
						$details = DB::query("SELECT * FROM details WHERE purchase_id=?", array($_GET['purchaseid']), "READ");
						$details = $details[0];

						echo "
						<form class='profile column' method='post'>
							<div>
								<label>Deceased name</label>
								<input type='text' name='txtname' value='".$details['deceased_name']."'>
							</div>
							<div>
								<label>Burial datetime</label>
								<input type='datetime-local' name='txtbdt' value='".date("Y-m-d\TH:i", strtotime($details['burial_datetime']))."'>
							</div>
							<div>
								<label>Burial address</label>
								<input type='text' name='txtbadd' value='".$details['burial_add']."'>
							</div>
							<div>
								<label>Delivery address</label>
								<input type='text' name='txtdadd' value='".$details['delivery_add']."'>
							</div>
							<button class='btn btn-link-absolute higher-top' type='submit' name='btnupdate'>Update</button>
						</form>
						";

						if(isset($_POST['btnupdate'])){
							$service_type = DB::query("SELECT * FROM purchase a JOIN services b ON a.service_id = b.service_id WHERE purchase_id=?", array($_GET['purchaseid']), "READ");
							$service_type = $service_type[0];

							update_details($service_type['service_type']);
						}
						?>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
</html>
