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
			$this_page = "services";
			include("others/sidebar.php"); ?>

			<!-- BANNER CONTENT -->
			<section class="banner-con">
				<div class="wrapper">
					<div class="banner-div intro">
						<div class="">
							<h2>Let's get started..</h2>
							<?php
							## TYPE [notify, success, error]
							messaging("notify", "Note: Please upload a death certificate and wait to be verified! Click <a href='profile.php'>here</a> to upload!");
							?>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim quis natus perferendis qui magnam expedita fugit labore earum, doloremque dolorem. Culpa doloribus obcaecati ut fugiat, expedita ipsa voluptatem sunt, illum voluptate recusandae pariatur tenetur illo ad eos ipsum! Velit id soluta perspiciatis, enim officia exercitationem libero aliquid eligendi. Sed dolore quam at laboriosam laborum aliquam quasi quis libero soluta nesciunt.</p>
							<p>You can also check our terms and conditions by clicking <a href="terms.php" target="_blank">here</a>.</p>
							
							<?php
								## CHECK IF USER IS VERIFIED
								echo (verified_bool()) ? "<a class='btn' href='funeral.php'>Browse Services</a>" : "<a class='btn none'>Browse Services</a>";
							?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
</html>
