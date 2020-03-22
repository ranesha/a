<?php

?>
<?php
include 'lib/Session.php';
Session::init();
?>
<?php
include "lib/Database.php";
include 'helpers/Formate.php';

spl_autoload_register(function ($classes){ include_once 'classes/'.$classes.'.php';});
$databaseObject = new Database();

$messageObject  = new Message();
$categoryObject = new Category();
    $brandObject    = new Brand();
    $productObject  = new Product();
    $formateObject  = new Formate();
?>
<?php
$formateObject = new Formate();
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
<!--<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"-->
<!--     aria-hidden="true">-->
<!--    <div class="modal-dialog modal-lg">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">-->
<!--                    &times;</button>-->
<!--                <h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>-->
<!--            </div>-->
<!--            <div class="modal-body modal-body-sub">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12 modal_body_left modal_body_left1" >-->
<!--                        <div class="sap_tabs">-->
<!--                            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">-->
<!--                                <ul>-->
<!--                                    <li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>-->
<!--                                    <li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>-->
<!--                                </ul>-->
<!--                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">-->
<!--                                    <div class="facts">-->
<!--                                        <div class="register">-->
<!--                                            <form action="#" method="post">-->
<!--                                                <input name="Email" placeholder="Email Address" type="text" required="">-->
<!--                                                <input name="Password" placeholder="Password" type="password" required="">-->
<!--                                                <div class="sign-up">-->
<!--                                                    <input type="submit" value="Sign in"/>-->
<!--                                                </div>-->
<!--                                            </form>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">-->
<!--                                    <div class="facts">-->
<!--                                        <div class="register">-->
<!--                                            <form action="#" method="post">-->
<!--                                                <input placeholder="Name" name="Name" type="text" required="">-->
<!--                                                <input placeholder="Email Address" name="Email" type="email" required="">-->
<!--                                                <input placeholder="Password" name="Password" type="password" required="">-->
<!--                                                <input placeholder="Confirm Password" name="Password" type="password" required="">-->
<!--                                                <div class="sign-up">-->
<!--                                                    <input type="submit" value="Create Account"/>-->
<!--                                                </div>-->
<!--                                            </form>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>-->
<!--                        <script type="text/javascript">-->
<!--                            $(document).ready(function () {-->
<!--                                $('#horizontalTab').easyResponsiveTabs({-->
<!--                                    type: 'default', //Types: default, vertical, accordion-->
<!--                                    width: 'auto', //auto or any width like 600px-->
<!--                                    fit: true   // 100% fit in a container-->
<!--                                });-->
<!--                            });-->
<!--                        </script>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- header modal -->
<!-- header -->
<div class="header" id="home1">
    <div class="container">
        <div class="w3l_logo">
            <h1><a href="index.php">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;IIZI<span>The Largest Service Provider In Sri Lanka</span></a></h1>
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
                    <li><a href="Postadvertisment.php">Post Your Ad</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- //navigation -->
<!--banner-->
<div class="banner banner10">
    <div class="container">
      <h2>Post Your Ad</h2>
    </div>
</div>
<!--//banner-->
<!-- breadcrumbs -->
<div class="breadcrumb_dress">
    <div class="container">
        <ul>
            <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home </a> <i>/</i></li>
            <li>Post Your Ad</li>
        </ul>
    </div>
</div>


<?php
    $categoryObject = new Category();
    $brandObject    = new Brand();
    $productObject  = new Product();
    $formateObject  = new Formate();
?>
    <!-- /top navigation -->

    <!-- page content -->
    

               
            </div>
            <div class="clearfix"></div>
            <?php
                if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['addProduct']))
                {
                    $productObject->insertProduct($_POST, $_FILES);
                }

                if (isset($_GET['delPro']))
                {
                    $productObject->deleteProductById($_GET['delPro']);
                }
            ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        

                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                   <br>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Advertisment Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" name="product" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <!--Category-->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" name="category" title="Category">
                                            <option></option>
                                            <?php
                                                $category = $categoryObject->allCategory();
                                                if (isset($category)):
                                                    while ($cat = $category->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $cat['id'];?>" ><?php echo $cat['catname'];?></option>
                                            <?php endwhile; endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <!--Brand-->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Working place</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" name="brand" title="Brand">
                                            <option></option>
                                            <?php
                                                $brand = $brandObject->allBrand();
                                                if (isset($brand)):
                                                    while ($bra = $brand->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $bra['id'];?>"><?php echo $bra['brand'];?></option>
                                            <?php endwhile; endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Advertisment Description</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="form-control" rows="5" name="prodis" id="comment" title="Brand Description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fee <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" name="price" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone No<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" name="phoneno" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                      
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Advertisment Picture</label>
                                    <div class="btn-group col-md-6 col-sm-6 col-xs-12">
                                        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                      <input type="file" data-role="magic-overlay" name="image" data-target="#pictureBtn" data-edit="insertImage" />
                                    </div>
                                </div>

                                <!--Type-->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Advertisment Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" name="type" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-app" name="addProduct"><i class="fa fa-save"></i> Save</button>
                                        <button class="btn btn-app" type="reset"><i class="fa fa-repeat"></i> Reset</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
	</div>
                
                
 