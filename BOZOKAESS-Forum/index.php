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
   <form method="post">
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
                        <li><a href="index.php">Anasayfa<span>Main Page</span></a></li>
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
                                     START THE SLIDER
    ====================================================================== -->
            <?php
				include("baglan.php");
				$komut=mysqli_query($baglan,"select * from haber");
				$say=mysqli_fetch_assoc($komut);
        		if($say!=0)
				{
       				echo"<div class='the-slider' data-tesla-plugin='slider' data-tesla-item='.slide' data-tesla-next='.slide-right' data-tesla-prev='.slide-left' data-tesla-container='.slide-wrapper'>
        			<div class='slide-arrows'>
            		<div class='slide-left'></div>
            		<div class='slide-right'></div>
        			</div>
        			<ul class='slide-wrapper'>";
    $komut=mysqli_query($baglan,"select * from haber order by haber_id desc limit 5");
				
       					while($adet=mysqli_fetch_array($komut))
						{
							echo"
            					<li class='slide'style='width:85%;margin-left:8.5%;'><img  src='".$adet['haber_resmi']."' alt='slider image'/></li>";
						}
       				echo"
       				</ul>
        			<div class='the-slider-bullets'>
            			<div class='container'>
                			<ul class='the-bullets' data-tesla-plugin='bullets'>";
                    $komut=mysqli_query($baglan,"select * from haber order by haber_id desc limit 5");
				
            					while($adet=mysqli_fetch_array($komut))
								{
									echo"
            						<li>
                        				<span class='the-bullets-actived'></span>
                        				<h4>".$adet['haber_baslik']."<span><img src='images/slider/slider-icon-5.png' alt='slider'></span></h4>
                    				</li>
									";
								}
					echo"
                			</ul>
            			</div>
        			</div>
    			</div>";
				}
			?>
    <!-- =====================================================================
                                     END THE SLIDER
    ====================================================================== -->


    <!-- =====================================================================
                                     START CONTENT
    ====================================================================== -->
    <div class="content">
  
        <div class="breadcrumb-2 image-bg-services">
            <div class="container">
            <h1>MİSYONUMUZ</h1>
            <p> Bozok Üniversitesinde faaliyet gösteren IEEE Öğrenci Kolununun AESS komitesi olarak inovatif projeler üretip katıldığımız yarışmalarda Üniversite ve Kulübümüzü en iyi şekilde
                temsil etmektir.</p>
            </div>
        </div>
        <div class="top-services">
            <div class="container"> 
                <div class="row">
                    <div class="span3">
                        <div class="service-box">
                            <div class="service-icon">
                                <img src="images/elements/logo.png" alt="service image">
                            </div>
                            <h5>İNOVASYON</h5>
                            <p>Yapacağımız projelerde ilk düşüneceğimiz unsurdur.</p>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="service-box">
                            <div class="service-icon">
                                <img src="images/elements/logo.png" alt="service image">
                            </div>
                            <h5>KARARLILIK</h5>
                            <p>Bir işe başladığımız zaman o işi en iyi şekilde bitirmek hedefimizdir.</p>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="service-box">
                            <div class="service-icon">
                                <img src="images/elements/logo.png" alt="service image">
                            </div>
                            <h5>ÇEŞİTLİLİK</h5>
                            <p>Çeşitli bölüm öğrencilerinden oluşan ekibimizle projelerimize her türden fikri dahil ederiz.</p>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="service-box">
                            <div class="service-icon">
                                <img src="images/elements/logo.png" alt="service image">
                            </div>
                            <h5>BAĞLILIK</h5>
                            <p>Ekibe girecek olan üyelerimizden ilk istediğimiz kulübü sahiplenmeleridir.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="breadcrumb-2 image-bg-team">
            <div class="container">
            <h1>AESS KOMİTESİ</h1>
            <p>2017 Şubat tarihinde kurulan Kulübümüzde ilk işimiz; misyon ve vizyonlarımızı belirleyip ekibi toplamak oldu.
                Ekibimize üye alımlarını tamamladıktan sonra iş bölümü yapıp grubumuzu kçük birimlere ayırdık. 2,5 Aylık gibi
                bir süreçte Model Sondaj Roketi Projemizi ve Spaceapps 2017 katılımlarımızı gerçekleştirdik. </p>
            </div>
        </div>

 <div class="content">
        <div class="container">
            <div class="our-team">
                <div class="row">
                    <div class="span4">
                        <div class="team-member">
                            <div class="team-member-cover">
                                <img src="images/team/member-2.jpg" alt="team member">
                            </div>
                            <div class="team-member-name">
                               Yavuz Çeliker <span>Başkan</span><span>AĞ YÖNETİCİSİ</span>
                            </div>
                            <p>Ekibin idari işleriyle ilgilenmek.
                            <br> Projelerin her safhasında var olmak.<br>
                            Kulübün web sayfasını yönetip gerekli düzeltme ve güncellemeleri yapmak.</p>
                            <ul>
                                <li><a href="#"><img src="images/socials/facebook-b.png" alt="social profile"></a></li>
                                <li><a href="#"><img src="images/socials/twitter-b.png" alt="social profile"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="team-member">
                            <div class="team-member-cover">
                                <img src="images/team/member-1.jpg" alt="team member">
                            </div>
                            <div class="team-member-name">
                                Emirhan Dikci <span>Yazılım</span>
                            </div>
                            <p>Ekibe ve projelerine yazılımsal destek sağlayıp altyapı oluşturmak.</p>
                            <ul>
                                <li><a href="#"><img src="images/socials/facebook-b.png" alt="social profile"></a></li>
                                <li><a href="#"><img src="images/socials/twitter-b.png" alt="social profile"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="team-member">
                            <div class="team-member-cover">
                                <img src="images/team/member-3.jpg" alt="team member">
                            </div>
                            <div class="team-member-name">
                                Emre Gürbüz <span>AVİYONİK</span>
                            </div>
                            <p>Hava vasıtalarına yerleştirilecek olan payload kısmın gelişiminde liderlik yapmak.</p>
                            <ul>
                                <li><a href="#"><img src="images/socials/facebook-b.png" alt="social profile"></a></li>
                                <li><a href="#"><img src="images/socials/twitter-b.png" alt="social profile"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <span class="button-center"><a href="our-team.html" class="button-3">view all</a></span>
            </div>
        </div>

        <div class="breadcrumb-2 image-bg-project">
            <div class="container">
            <h1>VİZYONUMUZ</h1>
            <p>Başlamış olduğumuz projelerimizi en verimli şekilde bitirip diğer projelerimize başlamak.
                Yapmış olduğumuz projelerimizde biriken bilgi birikimini diğer üniversiteler ile ortak bir portalda paylaşmak.
                </p>
            </div>
        </div>

        <div class="filter-area">
        <ul class="home-filter filter tesla_filters" data-tesla-plugin="filters">
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
                    <div class="span4 art">
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

                    <div class="span4 illustration">
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

                    <div class="span4 fashion">
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

                    <div class="span4 nature">
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

                    <div class="span4 business">
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

                </div>
                <span class="button-center"><a href="our-projects.html" class="button-3">view all</a></span>
            </div>
        </div>
                
        </div>

        <div class="testimonial  image-bg-testimonial">
            <div class="container">
                <div class="testimonial-cover"><img src="images/team/member-10.jpg" alt="testimonial user image" /></div>
                <h1 class="center"><font color="white">MASKOTUMUZ<br/> <span>TOSBİK(IS DEAD)</span></font></h1>
                <h3 class="center"><font color="white">Fırlattığımız küçük model roketimizi ararken, zor durumda olduğunu gördüğümüz kaplumbağayı<br>
                    sahiplenip ona tosbik adını verdik. Böylece ekibimizin artık yeni bir üyesi olmuş oldu.<br>( Sonra ölü taklidi yapmasından sıkılarak saldık çayıra. )</font></h3>
            </div>
        </div>

        <div class="container">
        <h1 class="center">our <span>clients</span></h1>
            <div class="our-partners">
                <div class="row">
                    <div class="span1">
                        <div class="our-partners-arrows">
                            <div class="our-partners-arrows-l"></div>
                        </div>
                    </div>
                    <div class="span10 our-partners-items">
                        <div class="row">
                            <div class="our-partners-items-wrapper">
                                <div class="span3">
                                    <div class="partner">
                                        <a href="#"><img src="images/partners/1.png" width="300" height="160" alt="partners"></a>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="partner">
                                        <a href="#"><img src="images/partners/2.png" width="300" height="160" alt="partners"></a>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="partner">
                                        <a href="#"><img src="images/partners/3.png" width="300" height="160" alt="partners"></a>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="partner">
                                        <a href="#"><img src="images/partners/4.png" width="300" height="160" alt="partners"></a>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="partner">
                                        <a href="#"><img src="images/partners/5.png" width="300" height="160" alt="partners"></a>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="partner">
                                        <a href="#"><img src="images/partners/6.png" width="300" height="160" alt="partners"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span1">
                        <div class="our-partners-arrows">
                            <div class="our-partners-arrows-r"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-box">
            <div class="contact-box-bg">
                <div class="container">
                    <h1 class="center">BİZİMLE<br/><span>İLETİŞİME GEÇİN</span></h1>
                    <br/>
                    <div class="row">
                        <div class="span4">
                            <div class="center">
                                <img src="images/elements/contact-1.png" alt="contact image">
                            </div>
                            <h3 class="center">Adres</h3>
                            <p>Yozgat,Bozok Üniversitesi<br/>M.M Fakültesi, A Blok</p>
                        </div>
                        <div class="span4">
                            <div class="center">
                                <img src="images/elements/contact-2.png" alt="contact image">
                            </div>
                            <h3 class="center">Mail</h3>
                            <p>bozoaess@ieee.org<br>16008116050@ogr.bozok.edu.tr</p>
                        </div>
                        <div class="span4">
                            <div class="center">
                                <img src="images/elements/contact-3.png" alt="contact image">
                            </div>
                            <h3 class="center">Telefon</h3>
                            <p>+90(507) 854 6580<br/>+90(554) 870 7805</p>
                        </div>
                    </div>

                    <div class="contact-title"><span>BİZE YAZIN</span></div>
                    <div class="row">
                        <div class="span8">
                            <input type="text" name="name" class="contact-box-line" placeholder="İsim">
                            <input type="text" name="email" class="contact-box-line" placeholder="E-mail">
                            <textarea name="message" placeholder="Mesaj" class="contact-box-area"></textarea>
                        </div>         
                    </div>
                        <input type="submit" id="contact_send" value="GÖNDER" class="button-2">
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
                            <p>Masaüstü veya E-Posta bildirimlerini açarak kulübümüzün yapmakta olduğu projeler hakkında güncel bilgi edinebilirsiniz.</p>
                                <input type="text" name="email" placeholder="E-mail adres" class="subscription-line">
                                <input type="submit" value="ABONE OL" class="subscription-button">
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
                    <h3><span>MENU</span></h3>
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
                        <ul class="twitter_widget" data-user="bozokaess" data-posts="2">
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
    <!-- ======================================================================
                                    END SCRIPTS
    ======================================================================= -->
	</form>
</body>

</html>