<?php
    include 'header.php';
?>

	<div class="banner banner5">
	<div class="container">
	  <h2 class="text-uppercase"><strong><em>   <br> &nbsp;</em>The Largest Service Provider In Sri Lanka</strong></h2>
	</div>
	</div>

	
	
			<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>

	<?php include 'footer.php' ?>