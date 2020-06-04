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
        <div class="container">
            <div class="row">
               
                <div class="forumcontainer"><?php //SAYFA YANINA REKLAM KOYARKEN forumcontainer yerine span8 yaz span4ün widgetlerine reklamları ayarla  ?>
                    <div class="all-entrys">
                        <div class="blog-entry">
                            <div class="entry-header">
                               <?php
								include("baglan.php");
								$query=mysqli_query($baglan,"select * from konu where konu_id=".$_GET["id"]);
								if($cmd=mysqli_fetch_array($query))
								{
									$yorumsay=0;
									$yorumquery=mysqli_query($baglan,"select * from yorum where konu_id=".$_GET["id"]);
									while(mysqli_fetch_array($yorumquery))
										$yorumsay++;
									echo"
									<h1><a href='#'>$cmd[1]</a></h1>
								</div>";
								if($cmd[6]!="")
								{
                            		echo"
									<div class='entry-cover'>
                                		<img src='$cmd[6]' alt='Konu Resmi' width='500' height='500'>
                            		</div>";
								}
                            	echo"<div class='entry-content'>
                                	<div class='entry-content-details'>
                                    	<ul>
                                        	<li class='details-date'><span>Tarih:</span>$cmd[5]</li>
                                        	<li class='details-author'><span>Yazan:</span>$cmd[2]</li>
                                        	<li class='details-comments'><span>Yorumlar:</span> <a href='#'>($yorumsay)</a></li>
                                    </ul>
                                </div>
                                <p>$cmd[4]</p>
                            </div>";
								}
								else
								{
									header("Location:forum.php");
								}
								?>
                               
                        </div>

                        <div class="comments-area">
                        
                        <h1><?php yorumsay(); ?></h1>
                               
                               
                        <div id="respond">
                                <h1 name="yorumsay">Yorumlar (<span> <?php echo($yorumsay);?> </span>)</h1>
                                <ul class="commentlist">
                                   <?php
										if(@$_POST["yorumyap"]=="Gönder")
										{
											$metin=$_POST["yorum"];
											$kadi=$_SESSION["kadi"];
											$tarih=date('Y-m-d H:i:s');
											$konuid=$_GET["id"];
											$ekle="";
											if($metin=="")
												echo("<script>alert('boşluk bırakmayın');</script>");
											else
											{
												$kontrol=0;
												if(isset($_GET["cevap"]))
												{
													$cevap=$_GET["cevap"];
													$dereceq=mysqli_query($baglan,"select * from yorum where yorum_id=$cevap");
													$derece=mysqli_fetch_array($dereceq);
													$ekle=mysqli_query($baglan,"insert into yorum(konu_id,k_adi,metin,tarih,cevap,cevap_id,cevap_derece) values($konuid,'$kadi','$metin','$tarih',1,$cevap,".($derece[7]+1).")");
													if($ekle)
														$kontrol=1;
												}
												else
												{
													$ekle=mysqli_query($baglan,"insert into yorum(konu_id,k_adi,metin,tarih) values($konuid,'$kadi','$metin','$tarih')");
													if($ekle)
														$kontrol=1;
												}
												if($kontrol!=1)
													echo("<script>alert('Yorum Gönderilirken Hata');</script>");
												else
												{
													yorumsay();
													header("location:konu.php?id=".$_GET["id"]."");
												}
											}
						
										}
										function yorumsay()
										{
											include("baglan.php");
											$yorumquery=mysqli_query($baglan,"select * from yorum where konu_id=".$_GET["id"]);
											$yorumsay=0;
											while(mysqli_fetch_array($yorumquery))
												$yorumsay++;
											echo"<script>document.getElementsByName('yorumsay')[0].innerHTML='Yorumlar (<span> $yorumsay </span>)';</script>";	
										}
										function cevapkontrol($cevapid)
										{
											include("baglan.php");
											$cevapquery=mysqli_query($baglan,"select * from yorum where cevap_id=$cevapid");
											while($cevap=mysqli_fetch_array($cevapquery))
											{
												$kquery=mysqli_query($baglan,"select * from kullanici where k_adi='$cevap[2]'");
												while($say2=mysqli_fetch_array($kquery))
												{
													echo"
                                        			<ul class='children'>
                                            			<li>
															<div class='comment'>
                                            					<span class='avatar'><img src='$say2[7]' alt='Profil Resmi'></span>
                                            					<span class='comment-info'><a name='a' href='konu.php?id=$cevap[1]&cevap=$cevap[0]#yorum' class='comment-reply'>Cevapla</a>$cevap[2] <span>$cevap[4]</span></span>
                                            					<p>$cevap[3]</p>
                                        					</div>
                                            			</li>";
														if(mysqli_fetch_array(mysqli_query($baglan,"select * from yorum where cevap_id=$cevapid")))
															cevapkontrol($cevap[0]);
                                        			echo"</ul>";
												}
											}
										}
									
									
										$query=mysqli_query($baglan,"select * from yorum");
										while($say=mysqli_fetch_array($query))
										{
											if($say[1]==$_GET["id"])
											{
												$query2=mysqli_query($baglan,"select * from kullanici where k_adi='$say[2]'");
												while($say2=mysqli_fetch_array($query2))
												{
													if($say[5]=="0")
													{
                                    					echo"
														<li>
															<div class='comment'>
                                            					<span class='avatar'><img src='$say2[7]' alt='Profil Resmi'></span>
                                            					<span class='comment-info'><a href='?id=$say[1]&cevap=$say[0]#yorum' class='comment-reply'>Cevapla</a>$say[2] <span>$say[4]</span></span>
                                            					<p>$say[3]</p>
                                        					</div>";
															$cevapquery=mysqli_query($baglan,"select * from yorum where cevap_id=$say[0]");
															if($cevap=mysqli_fetch_array($cevapquery))
															{
																cevapkontrol($cevap[6]);
															}
														echo"</li>";
													}
												}
											}
										}
									?>
                                </ul>
                            </div>
                                <p>Yorum:</p>
                                <textarea class="comments-area" id="yorum" name="yorum"></textarea>
                                <input type="submit" name="yorumyap" class="button-2" value="Gönder">
                            
                        </div>
                    </div>
                </div>
                <div class="span4" hidden="true">
                    <div class="sidebar">
                       
                        <div class="widget">
                        </div>

                        <div class="widget">
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
                        <--<ul class="twitter_widget" data-user="ieee_bozokaess" data-posts="2">
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
    </form>
</body>

</html>