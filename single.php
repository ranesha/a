<?php

?>
<?php
    if (!isset($_GET['proid']) || $_GET['proid'] == null) echo "<script>window.location = 'index.php'</script>";
    else $productId = $_GET['proid'];
?>
<?php
    include 'lib/Session.php';
    Session::init();
?>
<?php
    include "lib/Database.php";
    include 'helpers/Formate.php';

    spl_autoload_register(function ($classes){ include_once 'classes/'.$classes.'.php';});
    $databaseObject     = new Database();
    $productObject      = new Product();
    $categoryObject     = new Category();
    $userObject         = new User();
    $cartObject         = new Cart();
    $formateObject      = new Formate();
    $allCategoryObject  = new AllCategory();
?>
<?php
    global $cat;
?>
<!DOCTYPE html>
<html lang="<?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']?>">
<head>
    <title> <?php echo $formateObject->title(); ?> </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Tushar Khan" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- web fonts -->
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //web fonts -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->
    <style>
        .star-rating {
            line-height:32px;
            font-size:1.25em;
        }

        .star-rating .fa-star{
            color: yellow;
        }
    </style>
</head>
<body>
	<!-- header modal -->

	<!-- header modal -->
	<!-- header -->
	<div class="header" id="home1">
		<div class="container">
			<div class="w3l_logo">
			  <h1><a href="index.php"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;IIZI<span>The Largest Service Provider In Sri Lanka</span></a></h1>
			</div>
            <div class="search">
                <input class="search_box" type="checkbox" id="search_box">
                <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                <?php if ( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['search']) ):  ?>
                    <?php
                    $id = $productObject->searchProduct($_POST['Search']);
                    if ($id)
                    {
                        while ($pri = $id->fetch_assoc()) {
                            echo "<script>window.location = 'single.php?proid="; echo $pri['proid']; echo "'</script>";
                        }
                    }
                    ?>
                <?php endif;  ?>
                <div class="search_form">
                    <form action="#" method="post">
                        <input type="text" name="Search" placeholder="Search Product..." />
                        <input type="submit" value="Send" name="search" />
                    </form>
                </div>
            </div>
		</div>
	</div>
	<!-- //header -->
	<!-- navigation -->
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<!-- Mega Menu -->
						<li>
							<a href="products.php" >Services</a>
						</li>
						<li><a href="about.php">About Us</a></li>
                        <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if (Session::get("userLogin")): ?>
                                    <li><a href="cart.php">My Cart</a></li>
                                <?php endif; ?>
                                <li><a href="mail.php">Mail Us</a></li>
                            </ul>
                        </li>
                        <?php if (Session::get("userLogin")): ?>
                            <li><a href="profile.php">Profile</a></li>
                        <?php endif; ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>Advertisment Description</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Advertisment Description</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->  
	<!-- single -->
<?php $proInfo = $productObject->getProductById($productId); if ($proInfo): ?>
    <?php while ($info = $proInfo->fetch_assoc()): $cat = $info['catid']; ?>
	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
						<li data-thumb="<?php echo $info['image'];?>">
							<div class="thumb-image"> <img src="<?php echo $info['image'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
					</ul>
				</div>
				<!-- flexslider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
				<!-- flexslider -->
				<!-- zooming-effect -->
					
				<!-- //zooming-effect -->
			</div>
            <!--Start-->

                    <div class="col-md-8 single-right">
                        <h3><?php echo $info['proname']?></h3>
                        <div class="rating1">
                            <span class="star-rating">
                                <?php $rating = $productObject->rating($productId); if ($rating) :?>
                                    <?php while ($rev = $rating->fetch_assoc()): ?>
                                        <?php for ($i = 1; $i <= $rev['rate']; ++$i): ?>
                                            <span class="fa fa-star-o"></span>
                                        <?php endfor; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="description">
                            <h5><i>Description</i></h5>
                            <p><?php echo $info['body'];?></p>
                        </div>
                       <div class="description">
                            
								<h5><i>Fee : </i></h5>
                               <p><h5>Rs <?php echo $info['price'];?>.00 Per hour</h5></p>
                      </div>
                            <div class="description">
                              <h5><em>Working Place</em></h5>
                              <p><h5><?php   
								echo $info['brandid'];?></h5></p>
                      </div>
                            
                             <div class="description">
                            
								<h5><i>Phone No</i></h5>
                               <p><h5><?php echo $info['Phoneno'];?></h5></p>
                            </div>
                            
                            
                            <div class="color-quality-right">
                                <!--quantity-->
                              <script>
                                        $('.value-plus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                            divUpd.text(newVal);
                                        });

                                        $('.value-minus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                            if(newVal >= 1) divUpd.text(newVal);
                                        });
                                        </script>
                                    <!--quantity-->

                            </div>
                            <div class="clearfix"> </div>
          </div>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCart']))
                            {
                                $cartObject->addToCart($_POST['quantity'], $productId);
                            }
                        ?>
                        
                    </div>
            <!--End-->
			<div class="clearfix"> </div>
		</div>
	</div>
    <?php endwhile; ?>
<?php endif; ?>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && (Session::get("userLogin"))  ): ?>
        <?php $allCategoryObject->inseertProductReviewByCustomerId(Session::get("userId"), $_POST['Name'], $_POST['Email'], $_POST['Review'], $_POST['rate'], $productId, $_POST['Telephone']);  ?>
    <?php endif;  ?>

<?php $proInfo = $productObject->getProductById($productId); if ($proInfo): ?>
    <?php while ($info = $proInfo->fetch_assoc()): ?>
	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Advertisment Information</span></li>
                        <?php if (Session::get("userLogin")): ?>
						    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
                        <?php endif; ?>
                    </ul>
					<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
						<h3><?php echo $info['proname'];?></h3>
						<p><?php echo $info['body'];?></p>
					</div>	

					<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<div class="additional_info_sub_grids">
							<div class="col-xs-10 additional_info_sub_grid_right">
                                <?php $rating = $productObject->rating($productId); if ($rating) :?>
                                    <?php while ($rev = $rating->fetch_assoc()): ?>
								<div class="additional_info_sub_grid_rightl">
									<a href="#"><?php echo $rev['name'];?></a>
									<h5><?php echo $rev['date'];?></h5>
									<p><?php echo $rev['review'];?></p>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
                                            <?php for ($i = 1; $i <= $rev['rate']; ++$i): ?>
                                                <span class="fa fa-star-o"></span>
                                            <?php endfor; ?>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
                            <?php endwhile; ?>
                            <?php endif; ?>
							<div class="clearfix"> </div>
						</div>
						<div class="review_grids">
							<h5>Add A Review</h5>
                            <form action="#review" id="review" method="post">
                                <div class="form-group">
                                    <label for="usr">Name:</label>
                                    <input type="text" class="form-control" name="Name" id="usr" placeholder="Your Name" />
                                </div>
                                <div class="form-group" style="position: relative;right: 15px;">
                                    <label for="pwd" style="position: relative;left: 15px;">E-mail:</label>
                                    <input type="email" name="Email" class="form-control" id="pwd" placeholder="Your E-mail" />
                                </div>
                                <div class="form-group">
                                    <label for="rate">Rate:</label>
                                    <input type="number" name="rate" class="form-control" id="rate" placeholder="Rate 1-5 " />
                                </div>
                                <div class="form-group">
                                    <label for="ph">Phone:</label>
                                    <input type="text" name="Telephone" class="form-control" id="ph" placeholder="Your Phone" />
                                </div>
                                <div class="form-group">
                                    <label for="comment">Review:</label>
                                    <textarea class="form-control" name="Review" rows="5" id="comment" placeholder="Your Review"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit"  value="Submit" />
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
			<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab1').easyResponsiveTabs({
						type: 'default',        
						width: 'auto', 
						fit: true   
					});
				});
			</script>
		</div>
	</div>
    <?php endwhile; ?>
<?php endif; ?>
	
	<?php include 'footer.php'?>