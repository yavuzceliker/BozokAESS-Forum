<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Display</title>
    <meta name="description" content="Here goes description" />
    <meta name="author" content="author name" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <!-- ======================================================================
                                Mobile Specific Meta
    ======================================================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- ======================================================================
                                Style CSS + Google Fonts
    ======================================================================= -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="our-team-page">
    <!-- =====================================================================
                                     START HEADER 
    ====================================================================== -->
    <div class="header">
        <div class="container">
            <div class="menucontainer">
				<div class="menulogo">
                	<a href="index.php">
                        <img src="images/elements/giris.png" width="160" height="66" alt="logo" />
                    </a>
                </div>
                   	<span class="acilirmenu" name="acilirmenu" onClick="acilirmenu()"><img src="images/elements/menu.png">Menu</span>
                <div class="menuul" id='menuac'>
                    <ul>
                        <li><a href="forum.php">Anasayfa<span>Main Page</span></a></li>
                        <li class="current_page_item"><a href="forum.php">Forumlar<span>Forums</span></a></li>
                        <li><a href="ekip.php">Ekibimiz<span>Our Team</span></a></li>
                        <li><a href="projeler.php">Projelerimiz<span>Our Projects</span></a>
                        	<ul class="altmenu">
                            	<li><a href="proje.php">Inception</a></li>
                        	</ul>
                        </li>
                        <li><a href="bizeulasin.php">İletişim<span>Find Us</span></a></li>
						<li style="border: none; margin:0;"><?php
						ob_start();
							session_start();
								echo $_SESSION["kadi"]."<br>";
								if(@$_POST["oturumkapa"]=="Oturumu Kapat")
								{	
									session_destroy();
									header("location:giris.php");
								}
								if(!isset($_SESSION['kadi']))
								{
									header("location:giris.php");
								}
							?>
							<input type="submit" name="oturumkapa" value="Oturumu Kapat" class="oturumkapat" >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
		   
	   function acilirmenu()
	   {
		   	var menu=document.getElementById("menuac");
		   	if(menu.style.display=="block")
		   		menu.style.display="none";
		   	else
		   		menu.style.display="block";
	   }
		</script>
    </div>
    <!-- =====================================================================
                                     END HEADER 
    ====================================================================== -->


    <!-- =====================================================================
                                     START CONTENT
    ====================================================================== -->
    <div class="content">
        <div class="filter-area">
            <div class="container">
                <div class="project">
                    <div class="row">
                        <div class="span7">
                            <div class="project-cover">
                                <img src="images/photos/project-single.png" alt="single project image">
                            </div>    
                        </div>

                        <div class="span5">
                            <div class="project-details">
                                <ul class="project-selection">
                                    <li><a href="#">prev</a></li>
                                    <li><a class="last" href="#">next</a></li>
                                </ul>
                                <h1>drawings <span>2013</span></h1>
                                <ul class="project-info">
                                    <li><span>Joe Doe</span>Author</li>
                                    <li><span>20.10.2013</span>Date</li>
                                    <li><span>illustration, art, new</span>Category</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. </p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Duis aute irure dolor in reprehenderit in voluptate velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non, sunt.</p>
                                <br/>
                                <div class="share-it">
                                <span>Share</span>
                                    <ul>
                                        <li><a href="#"><img src="images/socials/facebook.png" alt="facebook"></a></li>
                                        <li><a href="#"><img src="images/socials/twitter.png" alt="twitter"></a></li>
                                        <li><a href="#"><img src="images/socials/linkedin.png" alt="linkedin"></a></li>
                                        <li><a href="#"><img src="images/socials/youtube.png" alt="youtube"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="center"><span>Related</span> projects</h1>
                <br/>
                <div class="row" data-tesla-plugin="masonry">
                    <div class="span4 nature">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="#">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-1.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-1.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4 art">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="#">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-2.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-2.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4 illustration">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="#">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-3.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-3.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =====================================================================
                                     END CONTENT
    ====================================================================== -->


    <!-- =====================================================================
                                     START FOOTER
    ====================================================================== -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <div class="widget">
                        <div class="subscription">
                            <h3>Gelişmeleri takip etmek için <span>ABONE OLUN!</span></h3>
                            <p>Masaüstü bildirimlerini açarak kulübümüzün yapmakta olduğu projeler hakkında bilgi edinebilirsiniz.</p>
                            <form class="subscription-form" id="newsletter" method="post">
                                <input type="text" name="email" placeholder="E-mail adresi" class="subscription-line">
                                <input type="submit" value="Takip Et" class="subscription-button">
                            </form>
                        </div>
                    </div>
                    <div class="widget">
                        <ul class="socials">
                            <li><a href="#"><img src="images/socials/facebook.png" width="20" height="20" alt="Facebook share" /></a></li>
                            <li><a href="#"><img src="images/socials/twitter.png" width="20" height="20" alt="Twitter share" /></a></li>
                            <li><a href="#"><img src="images/socials/linkedin.png" width="20" height="20" alt="Linkedin connection" /></a></li>
                            <li><a href="#"><img src="images/socials/dribble.png" width="20" height="20" alt="Dribble portfolio" /></a></li>
                            <li><a href="#"><img src="images/socials/rss.png" width="20" height="20" alt="Rss Subscription" /></a></li>
                            <li><a href="#"><img src="images/socials/pinterest.png" width="20" height="20" alt="Pinterest pin" /></a></li>
                            <li><a href="#"><img src="images/socials/googleplus.png" width="20" height="20" alt="Google plus share" /></a></li>
                            <li><a href="#"><img src="images/socials/youtube.png" width="20" height="20" alt="Youtube page" /></a></li>
                            <li><a href="#"><img src="images/socials/behance.png" width="20" height="20" alt="Behance page" /></a></li>
                            <li><a href="#"><img src="images/socials/flickr.png" width="20" height="20" alt="Flickr page" /></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span3">
                    <div class="widget">
                    <h3><span>menu</span></h3>
                        <ul class="footer-menu">
                        	<li><a href="forum.php">- Anasayfa</a></li>
                       	 	<li><a href="forum.php">- Forumlar</a></li>
                        	<li><a href="ekip.html">- Ekibimiz</a></li>
                        	<li><a href="projeler.html">- Projelerimiz</a></li>
                        	<li><a href="contact.html">- İletişim</a></li>
                        </ul>
                    </div>
                </div>
                <div class="span3">
                    <div class="widget">
                        <h3>Son <span>Tweetler</span></h3>
                        <ul class="twitter_widget" data-user="ieeebozok_aess" data-posts="4">
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =====================================================================
                                     END FOOTER
    ====================================================================== -->


    <!-- ======================================================================
                                    START SCRIPTS
    ======================================================================= -->
    <script src="js/modernizr.custom.63321.js" type="text/javascript"></script>
    <script src="js/jquery-1.10.0.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/placeholder.js" type="text/javascript"></script>
    <script src="js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
    <script src="js/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="js/jquery.swipebox.min.js" type="text/javascript"></script>
    <script src="js/farbtastic/farbtastic.js" type="text/javascript"></script>
    <script src="js/options.js" type="text/javascript"></script>
    <script src="js/plugins.js" type="text/javascript"></script>
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!-- ======================================================================
                                    END SCRIPTS
    ======================================================================= -->
</body>

</html>