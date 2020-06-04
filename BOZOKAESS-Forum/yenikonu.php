


<!DOCTYPE html>
<html lang="en"
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
    <style type="text/css">
		#container
		{
			padding:0 0 5% 32%;
		}
	</style>
</head>

<body class="our-team-page">
    <!-- =====================================================================
                                     HEADER BAŞLANGIÇ
    ====================================================================== -->
    <form method="post" enctype="multipart/form-data">
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
                        <li class="aciksayfa"><a href="forum.php">Forumlar<span>Forums</span></a></li>
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
                                     START ICERIK 
    ====================================================================== -->
    
    
    
	<div class="container">
    	<?php
		include("baglan.php");
		include("kontrol.php");
		if(isset($_GET["forumid"]))
		{
			$get=harfkontrol($_GET["forumid"],"0");
			if(mysqli_fetch_array(mysqli_query($baglan,"select * from forum where forum_id=$get"))==@is_null())
			{
				header("location:forum.php");
			}
			if(@$_POST["ekle"]=="Ekle")
			{
				$boyut=$_FILES["dosya"]["size"];
				$durum=0;
				$durum1=0;
				$yorum=$_POST["yorum"];
				$kadi=$_POST["konu_ad"];
				$ekle="";
    			if($yorum=="" || $kadi=="")
				{
					echo("<script>alert('Hata');</script>");
				}
				else
				{
					
					$dosyaadi=$kadi;
					$aranan=array("ç","Ç","ğ","Ğ","ı","İ","ö","Ö","ş","Ş","ü","Ü"," ");
					$yerine=array("c","C","g","G","i","I","o","O","s","S","u","U","_");
    				for($i=0;$i<sizeof($aranan);$i++)
    				{
    					$dosyaadi=str_replace($aranan[$i],$yerine[$i],$dosyaadi);
    				}
					$geciciyol=$_FILES["dosya"]["tmp_name"];
					$dosyayolu="images/forum/".$get."/".$dosyaadi."/".$dosyaadi;
					$tarih=date('Y-m-d H:i:s');
					if (!is_dir("images/forum/".$get))
					{
						$durum=1;
						if(!is_dir("images/forum/".$get."/".$dosyaadi))
						{
							$durum1=1;
						}
					}
					else
					{
						if(!is_dir("images/forum/".$get."/".$dosyaadi))
						{
							$durum1=1;
						}
					}
					if($boyut!=0)
					{
						$ekle=mysqli_query($baglan,"insert into konu(konu_adi,k_adi,forum_id,yorum,tarih,resim) values('$kadi','".$_SESSION["kadi"]."','".$get."','$yorum','$tarih','$dosyayolu.jpg')");
					}
					else
					{
						$ekle=mysqli_query($baglan,"insert into konu(konu_adi,k_adi,forum_id,yorum,tarih) values('$kadi','".$_SESSION["kadi"]."','".$get."','$yorum','$tarih')");
						$durum=0;
						$durum1=0;
					}
					if($ekle)
					{
						if($durum==1)
							mkdir("images/forum/".$get, 0700);
						if($durum1==1)
						{
							mkdir("images/forum/".$get."/".$dosyaadi, 0700);
							copy($geciciyol,"$dosyayolu.jpg");
						}
						header("location:forum.php");
					}
					else
					{
						echo("<script>alert('Hata');</script>");
					}
				}
			}
		}
		else
		{
			header("location:forum.php");
		}
		?>
		<script type="text/javascript">
			
							$kadikontrol=0;
							$yorumkontrol=0;
							$dosyakontrol=0;
						var timer = setInterval(kontrol,10);
						function kontrol()
						{
							$kadi=8-document.getElementsByName("konu_ad")[0].value.length;
							$yorum=20-document.getElementsByName("yorum")[0].value.length;
							$dosya=document.getElementsByName("dosya")[0].value;
							if($kadikontrol==1 && $yorumkontrol==1)
							{
									document.getElementsByName("dosya")[0].style.background = "#e2ffc1";
									document.getElementsByName("ekle")[0].disabled=false;
									document.getElementsByName("ekle")[0].style.background = "green";
							}
							else
							{
								document.getElementsByName("ekle")[0].disabled=true;
								document.getElementsByName("ekle")[0].style.background = "#cc3939";
							}
							if($kadi<=0)
							{
								$kadikontrol=1;
								document.getElementsByName("konu_ad")[0].style.background = "#e2ffc1";
								document.getElementsByName("yorum")[0].disabled=false;
								if($yorum<=0)
								{
									$yorumkontrol=1;
									document.getElementsByName("yorum")[0].style.background = "#e2ffc1";
									document.getElementsByName("dosya")[0].disabled=false;
									if($dosya!="")
									{
										$dosyakontrol=1;
										document.getElementsByName("dosya")[0].style.background = "#e2ffc1";
									}
									else
									{
										$dosyakontrol=0;
										document.getElementsByName("dosya")[0].style.background = "#ffd6ba";
									}
								}
								else
								{
									$sifrekontrol=0;
									document.getElementsByName("dosya")[0].disabled=true;
									document.getElementsByName("yorum")[0].style.background = "#ffd1d1";
								}
							}
							else
							{
								$kadikontrol=0;
								document.getElementsByName("yorum")[0].disabled=true;
								document.getElementsByName("konu_ad")[0].style.background = "#ffd1d1";
							}
						}
					</script>
		<div id="container">
		
    	<h1>Yeni Konu</h1>
			<input type="text" id="input" placeholder="Konu Adı:" name="konu_ad" style="border:1px solid gray;width:50%;"><br>
			<textarea id="input" style="width:50%; height:100px; border:1px solid gray;" placeholder="Yorum" name="yorum"></textarea><br>
			<input type="file" name="dosya" id="input" style="padding-top:10px; border:1px solid gray;width:50%;" disabled="true"><br>
			<input type="submit" name="ekle" value="Ekle" id="btn" style="margin-left:15%; width:20%;">
   		</div>
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