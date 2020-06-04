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

<body>
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
    <div class="content contact-page">
        <div class="container">
            <div class="location-map">
                <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;t=m&amp;ll=39.310734,-76.617081&amp;spn=0.001453,0.00228&amp;z=18&amp;output=embed"></iframe>    
            </div>
            <div class="contact-page-content">
                <div class="row">
                    <div class="span8">
                    <h1>drop us a <span>line</span></h1>
                        <form class="contact-form" id="contact_form">
                            <p>Name</p>
                            <span class="line-limit"><input type="text" name="name" class="contact-line" placeholder="Enter your name"></span>
                            <p>E-mail</p>
                            <span class="line-limit"><input type="text" name="email" class="contact-line" placeholder="Enter your e-mail adress"></span>
                            <p>Website</p>
                            <span class="line-limit"><input type="text" name="website" class="contact-line" placeholder="Enter website adress"></span>
                            <p>Comment</p>
                            <span class="line-limit"><textarea name="message" class="contact-area"></textarea></span>
                            <input type="submit" id="contact_send" value="Drop us a line" class="contact-button">
                        </form>
                    </div>
                    <div class="span4">
                    <h1>contact <span>info</span></h1>
                        <ul class="contact-info">
                            <li>(000) 777 888 999 555</li>
                            <li>(222) 555 222 333 555</li>
                            <li>(111) 888 999 555 111</li>
                            <li><a href="mailto:display@gmail.com">display@gmail.com</a></li>
                            <li>London 215 / 3<br/> Guarder street 22<br/> ofice 2</li>
                        </ul>
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