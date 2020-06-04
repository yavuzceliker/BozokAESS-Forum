<!DOCTYPE html>
<html lang="tr">

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
  <form method="post"> 
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
							include("kontrol.php");
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
                                     START ICERIK 
    ====================================================================== -->
    
    
    
	<div class="container">
		<table id="tablo" class="pricing-table">
			<tr>
				<td><input type="submit" name="yenikonu" value="Yeni Konu Oluştur"/></td>
				<?php
					include("baglan.php");
					$get=harfkontrol($_GET['forumid'],"forumid");
					$query=mysqli_fetch_array(mysqli_query($baglan,"select * from forum where forum_id=".$get));
					echo("<td colspan='2'><a href='forum.php'>Forum</a>  >>  $query[1]</td></tr>");
					if(!$query)
						header("location:forum.php");
					if(@$_POST['yenikonu']=="Yeni Konu Oluştur")
						header("location:yenikonu.php?forumid=$get");
				?>
			<tr>
				<th>Konu Başlığı</th>
				<th>Başlangıç Tarihi</th>
				<th>Yorum Sayısı</th>
			</tr>
			<?php
				if(isset($_GET["forumid"]))
				{	
					$query=mysqli_query($baglan,"select * from konu");
					while($ekle=mysqli_fetch_array($query))
					{
						if($get==$ekle[3])
						{
							echo"<tr>";
							echo"<td><a href='konu.php?id=$ekle[0]'>$ekle[1]</a></td>";
							echo"<td>$ekle[5]</td>";
							$cmdyorumsay=mysqli_query($baglan,"select * from yorum where konu_id=$ekle[0]");
							$yorumsayisi=0;
							while($yorumsay=mysqli_fetch_array($cmdyorumsay))
							{
								$yorumsayisi++;
							}
							echo"<td>$yorumsayisi</td>";
							echo"</tr>";
						}
					}
				}
				else
				{
					header("location:forum.php");
				}
			?>
		</table>
	</div>
    
    
    
    <!-- =====================================================================
                                     END ICERIK 
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
                                <input type="text" name="email" placeholder="E-mail adress" class="subscription-line">
                                <input type="submit" value="subscribe" class="subscription-button">
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
                    <h3>Our <span>menu</span></h3>
                        <ul class="footer-menu">
                            <li><a href="#">- Anasayfa</a></li>
                            <li><a href="#">- Sayfalar</a></li>
                            <li><a href="#">- Hizmetler</a></li>
                            <li><a href="#">- Blog</a></li>
                            <li><a href="#">- İletişim</a></li>
                            <li><a href="#">- Tur</a></li>
                            <li><a href="#">- Projeler</a></li>
                        </ul>
                    </div>
                </div>
                <div class="span3">
                    <div class="widget">
                        <h3>Son <span>Tweetler</span></h3>
                        <ul class="twitter_widget" data-user="ieeebozok_aess" data-posts="3">
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
    </div>


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
	</form>
</body>

</html>