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
                                     HEADER BAŞLANGIÇ
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
        <ul class="filter tesla_filters" data-tesla-plugin="filters">
            <li><a data-category="" class="active" href="#">all</a></li>
            <li><a data-category="art" href="#">art</a></li>
            <li><a data-category="illustration" href="#">illustration</a></li>
            <li><a data-category="fashion" href="#">fashion</a></li>
            <li><a data-category="people" href="#">people</a></li>
            <li><a data-category="nature" href="#">nature</a></li>
            <li><a data-category="business" href="#">business</a></li>
        </ul>
            <div class="container">
                <div class="row" data-tesla-plugin="masonry">
                    <div class="span4 nature">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
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
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
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
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
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

                    <div class="span4 people">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-4.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-4.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4 business">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-5.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-5.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4 art">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-6.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-6.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4 illustration">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-7.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-7.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4 art">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-8.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-8.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4 nature">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-9.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-9.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4 fashion">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-10.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-10.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4 people">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-11.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-11.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="span4 business">
                        <div class="filter-item">
                            <div class="filter-hidden">
                                <div class="filter-hover">
                                    <h5><a href="single-project.html">Fashion Pack</a></h5>
                                    <ul>
                                        <li><a class="filter-zoom swipebox" href="images/photos/project-12.png"></a></li>
                                        <li><a class="filter-link" href="single-project.html"></a></li>
                                    </ul>
                                </div>
                                <div class="filter-cover">
                                    <img src="images/photos/project-12.png" alt="project">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <ul class="page-numbers">
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a class="active" href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
        </ul>
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