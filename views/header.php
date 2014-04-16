<!--=== Top ===-->   
<!DOCTYPE html>

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>IITG | Academic Portal</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSS Global Compulsory-->
<!--         <link rel="stylesheet" href="assets/plugins/bootstrap/css/flat-ui.css" />
 -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/headers/header1.css" />
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="assets/css/style_responsive.css" />
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css" type="text/css" media="screen" />        
    <link rel="stylesheet" href="assets/plugins/parallax-slider/css/parallax-slider.css" type="text/css" />
    <!-- CSS Theme -->    
<!--     <link rel="stylesheet" href="assets/css/themes/headers/default.css" id="style_color-header-1" /> 
 --><!--     <link rel="stylesheet" href="assets/css/mystyle.css">   
 --><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>    

<body>
<header> 
<div class="top">
    <div class="container">         
        <?php

       // echo "username ".$_SESSION['status'];
 
        if(isset($_SESSION['status']))
            {
                echo '
                <div class="dropdown" /*style="position:absolute; left:20% */">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">Welcome '.$_SESSION["username"].'
              <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.html"><i class="icon-user"></i> Profile</a></li>
                <li><a href="../controller/logout.php"><i class="icon-off"></i> Sign Out</a></li>
              </ul></div>';
            
            }

            else
                { 
        ?>
                <ul class="pull-right" >

       <a href="login.php" class="btnu btnu-primary-u"> Login</a>

          <a href="signup.php" class="btnu btnu-primary-u " >Sign Up</a> 
         </ul>
    </div>      
</div><!--/top-->
 
<?php } ?>



<div class="modal hide fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="border-radius:4px;">
			              <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                <h4 class="modal-title">							
							Login
							</h4>
			              </div>
			              <div class="modal-body" style="background:#5bc3be; text-align:center">
			<form method="post" role="form" id="login-form" onSubmit="return validateForm()">
									<div class="form-group">
				                            <label for="username" style="color:white">Username:</label>
				                         
									 <div class="controls">
  											 <span class="add-on"><i class="icon-user"></i></span>

				                            <input type="text" class="input-text" name="username" id="username" tabindex="1">
				                            <span data-alertid="example"></span>
									    </div>
				                    </div>
		  				<div class="form-group">
	                                <label for="password" style="color:white">Password:</label>
	                           <div class="controls">
                              
				                    <span class="add-on"><i class="icon-lock"></i></span>

				                    <input class="input-text" type="password" name="password" id="password" tabindex="2">
				                            <span data-alertid="example"></span>
				               </div>
				        </div>
				                            <div class="clear"></div>

						  <div class="form-group" style="margin-left:12px;">
							  <select class="form-control" name="usertype">
					                    <option name="fac">Faculty</option>
					                    <option name="stud">Student</option>
					           </select>
					      </div>

					      <div class="clear"></div>
     						  <div class="form-group" >
     						   	<div class="errormsg"></div>

							   <input type="submit" class="btnu btn-primary submit" name="login" value="Sign In">
							   							   <div class="clear"></div>

							   <div style="font-size:15px;">Forgot password click <a href="#" style="color:red">here</a></div>
							   <div class="clear"></div>
							   <div class="clear"></div>

								<div style="font-size:15px;">New User, then <a class="btnu btnu-danger" href="index.html#signup-modal">Sign Up</a></div>
							 </div>
					</form>
			    </div>
           </div>
        </div>
</div>

<div class="modal hide fade" id="signup-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                  Sign Up
                </h4>
              </div>
              <div class="modal-body" style="background:#5bc3be; color: white; text-align:center">
                <form method="post" role="form">
             
                  <div class="form-group">
                    <label class="sr-only" for="signup-first-name">First Name</label>
                    <input type="text" class="form-control" id="signup-first-name" placeholder="First name">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="signup-last-name">Last Name</label>
                    <input type="text" class="form-control" id="signup-last-name" placeholder="Last name">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="signup-username">Userame</label>
                    <input type="text" class="form-control" id="signup-username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="signup-email">Email address</label>
                    <input type="email" class="form-control" id="signup-email" placeholder="Email address">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="signup-password">Password</label>
                    <input type="password" class="form-control" id="signup-password" placeholder="Password">
                  </div>
                  <div class="checkbox">
                   
                  </div>
                  <button class="btnu btn-primary" type="submit">Sign up</button>
                </form>
              </div>
              <div class="modal-footer">
                <small>Already signed up? <a href="index.html#login-modal">Login here</a>.</small>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!--=== Header ===-->
<div class="header">               
    <div class="container"> 
        <!-- Logo -->       
                                    
        <!-- Menu -->       
        <div class="navbar">                                
            <div class="navbar-inner">                                  
                <a class="btnu btnu-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a><!-- /nav-collapse -->                                  
                <div class="nav-collapse collapse">                                     
                    <ul class="nav top-2">
                        <li class="active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home
                                <b class="caret"></b>                            
                            </a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="index.html">Option1: Landing Page</a></li>
                                <li><a href="page_home.html">Option2: Header Option</a></li>
                                <li><a href="page_home4.html">Option3: Revolution Slider</a></li>
                                <li><a href="page_home5.html">Option4: Amazing Content</a></li>
                                <li><a href="page_home1.html">Option5: Mixed Content</a></li>
                                <li><a href="page_home2.html">Option6: Content with Sidebar</a></li>
                                <li><a href="page_home3.html">Option7: Aplle Style Slider</a></li>
                                <li><a href="page_home_all.html">Home All In One</a></li>
                            </ul>
                            <b class="caret-out"></b>                        
                        </li>
                        <li>
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Pages
                                <b class="caret"></b>                            
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="page_about.html">About Us</a></li>
                                <li><a href="page_services.html">Services</a></li>
                                <li><a href="page_pricing.html">Pricing</a></li>
                                <li><a href="page_coming_soon.html">Coming Soon</a></li>
                                <li><a href="page_faq.html">FAQs</a></li>
                                <li><a href="page_search.html">Search Result</a></li>
                                <li><a href="page_gallery.html">Gallery</a></li>
                                <li><a href="page_registration.html">Registration</a></li>
                                <li><a href="page_login.html">Login</a></li>
                                <li><a href="page_404.html">404</a></li>
                                <li><a href="page_clients.html">Clients</a></li>
                                <li><a href="page_privacy.html">Privacy Policy</a></li>
                                <li><a href="page_terms.html">Terms of Service</a></li>
                                <li><a href="page_column_left.html">2 Columns (Left)</a></li>
                                <li><a href="page_column_right.html">2 Columns (Right)</a></li>
                            </ul>
                            <b class="caret-out"></b>                        
                        </li>
                        <li>
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Features
                                <b class="caret"></b>                            
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="feature_grid.html">Grid Layout</a></li>
                                <li><a href="feature_typography.html">Typography</a></li>
                                <li><a href="feature_thumbnail.html">Thumbnails</a></li>
                                <li><a href="feature_component.html">Components</a></li>
                                <li><a href="feature_navigation.html">Navigation</a></li>
                                <li><a href="feature_table.html">Tables</a></li>
                                <li><a href="feature_form.html">Forms</a></li>
                                <li><a href="feature_icons.html">Icons</a></li>
                                <li><a href="feature_button.html">Buttons</a></li>
                            </ul>
                            <b class="caret-out"></b>                        
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio
                                <b class="caret"></b>                            
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="portfolio_item.html">Portfolio Item</a></li>
                                <li><a href="portfolio_2columns.html">Portfolio 2 Columns</a></li>
                                <li><a href="portfolio_3columns.html">Portfolio 3 Columns</a></li>
                                <li><a href="portfolio_4columns.html">Portfolio 4 Columns</a></li>
                            </ul>
                            <b class="caret-out"></b>                        
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog
                                <b class="caret"></b>                            
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog_item.html">Blog Item</a></li>
                                <li><a href="blog_left_sidebar.html">Blog Left Sidebar</a></li>
                                <li><a href="blog_item_left_sidebar.html">Blog Item Left Sidebar</a></li>
                            </ul>
                            <b class="caret-out"></b>                        
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact
                                <b class="caret"></b>                            
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="page_contact.html">Contact Default</a></li>
                                <li><a href="page_contact1.html">Contact Boxed Map</a></li>
                            </ul>
                            <b class="caret-out"></b>                        
                        </li>
                        <li><a class="search"><i class="icon-search search-btnu"></i></a></li>                               
                    </ul>
                    <div class="search-open">
                        <div class="input-append">
                            <form />
                                <input type="text" class="span3" placeholder="Search" />
                                <button type="submit" class="btnu-u">Go</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /nav-collapse -->                                
            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->                          
    </div><!-- /container -->               
</div><!--/header -->     
</header> 
<!--=== End Header ===-->
