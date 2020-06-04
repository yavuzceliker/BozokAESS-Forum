
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
    <style>
		#tablo{width:100%;
		height:10px;}
</style>
</head>

<body class="our-team-page">
    <!-- =====================================================================
                                     HEADER BAŞLANGIÇ
    ====================================================================== -->
    <form method="post" enctype="multipart/form-data">
       <div class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/elements/logo.png" width="160" height="66" alt="logo" />
                    </a>
                </div>
                <div class="menu">
                <span class="res-menu">Menu</span>
                    <ul>
                        <li class="current_page_item"><a href="index.php">Anasayfa<span>Main<br>Page</span></a></li>
                        <li><a href="#">Sayfalar<span>internal<br>Pages</span></a>
                            <ul class="children">
                                <li><a href="about-us.html">Hakkımızda</a></li>
                                <li><a href="error-404.html">Error 404</a></li>
                                <li><a href="our-team.html">Ekibimiz</a></li>
                                <li><a href="our-projects.html">Projelerimiz</a>
                                    <ul class="children">
                                        <li><a href="single-project.html">Inception </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="services.html">Hizmetlerimiz<span>what<br/> we offer</span></a></li>
                        <li><a href="forum.php">Forum<span>forum<br/></span></a></li>
                        <li><a href="contact.html">İletiişim<span>find<br/> us</span></a></li>
                        <li><?php
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
							<input type="submit" name="oturumkapa" value="Oturumu Kapat"  style="width:150px; font-size: 10px;height:'30px;" >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- =====================================================================
                                     END HEADER 
    ====================================================================== -->
    
    <!-- =====================================================================
                                     START ICERIK 
    ====================================================================== -->
    <script type="text/javascript">
						var timer = setInterval(kontrol,10);
						
						function kontrol()
						{
							$kadi=16-document.getElementsByName("kadi")[0].value.length;
							$esifre=12-document.getElementsByName("esifre")[0].value.length;
							$ysifre=12-document.getElementsByName("ysifre")[0].value.length;
							$yysifre=12-document.getElementsByName("yysifre")[0].value.length;
							if($esifre<5)
							{
								document.getElementsByName("esifre")[0].style.background = "#e2ffc1";
								document.getElementsByName("ysifre")[0].disabled=false;
								if($ysifre<5)
								{
									document.getElementsByName("ysfire")[0].style.background = "#e2ffc1";
									document.getElementsByName("yysifre")[0].disabled=false;
									if($yysifre<5)
									{
										document.getElementsByName("yysfire")[0].style.background = "#e2ffc1";
									}
									else
									{
										document.getElementsByName("yysfire")[0].style.background = "#ffd1d1";
									}
								}
								else
								{
									document.getElementsByName("yysifre")[0].disabled=true;
									document.getElementsByName("ysifrekontrol")[0].style.background = "#ffd1d1";;
								}
							}
							else
							{
								document.getElementsByName("ysifre")[0].disabled=true;
								document.getElementsByName("esifre")[0].style.background = "#ffd1d1";;
							}
						}
		
						var timer2 = setInterval(kontrol2,10);
						function kontrol2()
						{
							$haberbaslik=30-document.getElementsByName("h_baslik")[0].value.length;
							$habermetin=50-document.getElementsByName("h_metni")[0].value.length;
							$haberresim=document.getElementsByName("hresim")[0].value.length;
							if($haberbaslik<16)
							{
								document.getElementsByName("h_baslik")[0].style.background = "#e2ffc1";
								document.getElementsByName("h_metni")[0].disabled=false;
								if($habermetin<10)
								{
									document.getElementsByName("h_metni")[0].style.background = "#e2ffc1";
									document.getElementsByName("hresim")[0].disabled=false;
									if($haberresim>0)
									{
								document.getElementsByName("hekle")[0].disabled=false;
										document.getElementsByName("hekle")[0].style.background = "#e2ffc1";
										document.getElementsByName("hekle")[0].style.color = "black";
										document.getElementsByName("hresim")[0].style.background = "#e2ffc1";
									}
									else
									{
										document.getElementsByName("hekle")[0].style.background = "#ffd1d1";
										document.getElementsByName("hekle")[0].style.color = "white";
									}
								}
								else
								{
									document.getElementsByName("hekle")[0].disabled=true;
									document.getElementsByName("hresim")[0].disabled=true;
									document.getElementsByName("hresim")[0].style.background = "#ffd1d1";
									document.getElementsByName("h_metni")[0].style.background = "#ffd1d1";
										document.getElementsByName("hekle")[0].style.background = "#ffd1d1";
										document.getElementsByName("hekle")[0].style.color = "white";
								}
							}
							else
							{
								document.getElementsByName("h_metni")[0].disabled=true;
								document.getElementsByName("h_metni")[0].style.background ="#ffd1d1";
								document.getElementsByName("h_baslik")[0].style.background = "#ffd1d1";
									document.getElementsByName("hekle")[0].disabled=true;
									document.getElementsByName("hresim")[0].style.background = "#ffd1d1";
										document.getElementsByName("hekle")[0].style.background = "#ffd1d1";
										document.getElementsByName("hekle")[0].style.color = "white";
							}
						}
		
		
			var a=0;
		function bas()
		{
			if(a==0)
			{
				alert(a);
				a=1;
				document.getElementById("container").style.height="10px";
				document.getElementById("container").style.background="pink";
			}
			else
			{
				alert(a);
				a=0;
				document.getElementById("container").style.background="purple";
				document.getElementById("container").style.height="80px";
			}
		}
		</script>
		<div id="test">asd</div>
	<div class="container">
    	<div id="container">
                   	
						
                <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                <tr>
                	<td colspan="2">
            	
                    	<table id="admintable" style="width:620px;">
                        <TR><TH  colspan="5" id="baslik">ZİYARETÇİ DEFTERİ</TH></TR>
                        	<tr>
                            	<th>Başlık</th><th>Mesaj</th><th>Gönderen</th><th>Tarih</th>
                            </tr>
                            	<?php/*
									$sql=mysqli_query($baglan,"select * from ziyaretci where onay=0 order by tarih LIMIT 10");
										$x=0;
										while($satir=mysqli_fetch_array($sql))
										{
											echo"
										<tr>
											<td><input id='ziyaretci' name='baslik$x' type='text' disabled='disabled' value='".$satir["baslik"]."' /></td>
											<td><input id='ziyaretci' name='mesaj$x' type='text' disabled='disabled' value='".$satir["mesaj"]."' /></td>
											<td><input id='ziyaretci' name='adsoyad$x' type='text' disabled='disabled' value='".$satir["adsoyad"]."' /></td>
											<td><input id='ziyaretci' name='tarih$x' type='text' disabled='disabled' value='".$satir["tarih"]."' /></td>
											<td><input id='ziyaretci' type='submit' value='ONAYLA' name='btn$x' /></td>
												
												";
										if(@$_POST["btn".$x]=="ONAYLA")
										{
											$ekle=mysqli_query($baglan,"update ziyaretci set onay=1 where id=".$satir["id"]);
											if($ekle)
											header("refresh:0;");
										}
										
										$x++;
										}
										
												*/
							?>
                        </table>
               
                	
                    </td>
                 </tr>-->
                      
                       	<table id="tablo">
                       		<TR><TH  colspan="6">ÜYE KONTROLÜ</TH></TR>
                        	<tr><th>Üye Arama</th><th colspan="5"></th></tr>
                        	<tr>
                        		<td colspan="6"><input type="text" id="input" placeholder="Kullanıcı Adı:" name="k_ad">
                        		<input type="submit" id="btn" name="k_ara" value="ARA"/>
                        		</td>
                        	</tr>
                        	<tr>
                            	<th>Üye Adı</th><th>E-Posta</th><th>Durum</th><td colspan="3"></td>
                            </tr>
						   <?php
							@include("kontrol.php");
							if(@$_POST["k_ara"]=="ARA")
							{
								header("location:a-aess.php?k_ad=".harfkontrol($_POST["k_ad"]));
							}
							
							
							
							
							
							
							
							
							
							
							
							
						   		//--SAYFA LİSTELEME(YAVUZ ÇELİKER 2015 MOVIECLUB)--//
				   				$sayfada = 8; // sayfada gösterilecek içerik miktarını belirtiyoruz.
							$sorgu="";
							$sonuc="";
						   	$toplam_icerik="";
 							$toplam_sayfa =0;
						   	$sayfa =0;
						   	$limit=0;
								if(isset($_GET['k_ad']))
								{
									$metin=harfkontrol($_GET["k_ad"]);
									$sorgu2 = mysqli_query($baglan,"SELECT COUNT(*) AS toplam FROM kullanici  where k_adi like '$metin%'");
									
						   		$sonuc = mysqli_fetch_assoc($sorgu2);
						   		$toplam_icerik = $sonuc['toplam'];
 								$toplam_sayfa = ceil($toplam_icerik / $sayfada);
						   		// eğer sayfa girilmemişse 1 varsayalım.
						   		$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
						   		// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
						   		if($sayfa < 1) $sayfa = 1; 
						   		// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
						   		if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
						   		// kaçıncı içerikten başlanacağını ifade edecek limit değeri.
								$limit = ($sayfa - 1) * $sayfada;
								
									$sorgu=mysqli_query($baglan,"select * from kullanici where k_adi like '$metin%' LIMIT ".$limit.",".$sayfada);
								}
								else
								{
						   			$sorgu2 = mysqli_query($baglan,"SELECT COUNT(*) AS toplam FROM kullanici");
									
						   		$sonuc = mysqli_fetch_assoc($sorgu2);
						   		$toplam_icerik = $sonuc['toplam'];
 								$toplam_sayfa = ceil($toplam_icerik / $sayfada);
						   		// eğer sayfa girilmemişse 1 varsayalım.
						   		$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
						   		// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
						   		if($sayfa < 1) $sayfa = 1; 
						   		// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
						   		if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
						   		// kaçıncı içerikten başlanacağını ifade edecek limit değeri.
								$limit = ($sayfa - 1) * $sayfada;
						   			$sorgu = mysqli_query($baglan,"SELECT * FROM kullanici LIMIT ".$limit.",".$sayfada);
								}
						   		$x=0;
						   		$sessionkontrol="";
 								while($satir=mysqli_fetch_array($sorgu)) 
								{
											$sessionkontrol=$satir["k_adi"];
									echo"<tr>";
										if(@$_POST["btnduzenle".$x]=="DÜZENLE")
										{
												echo"
											<td><input id='input' name='uyeadi$x' type='text' value='".$satir["k_adi"]."' style='width:170px;' /></td>
											<td><input id='input' name='eposta$x' type='text' value='".$satir["eposta"]."' style='width:170px;' /></td>
											<td>
												<select id='input' name='durum$x'>
													";
													if($satir["durum"]=="admin")
													{
														echo"
														<option>".$satir['durum']."</option>
														<option>üye</option>";
													}
													else
													{
														echo"
														<option>".$satir['durum']."</option>
														<option>admin</option>";
													}
												echo"
												</select></td>";			
										}
										else
										{
												echo"
											<td><input id='input' name='uyeadi$x' type='text' disabled='disabled' value='".$satir["k_adi"]."' style='width:180px;' /></td>
											<td><input id='input' name='eposta$x' type='text' disabled='disabled' value='".$satir["eposta"]."' style='width:180px;' /></td>
											
											<td>
												<select id='input' disabled='disabled' name='durum$x'>
													";
													if($satir["durum"]=="admin")
													{
														echo"
														<option>".$satir['durum']."</option>
														<option>üye</option>";
													}
													else
													{
														echo"
														<option>".$satir['durum']."</option>
														<option>admin</option>";
													}
												echo"
												</select></td>";	
										}
											echo"
											<td><input id='btn' type='submit' value='DÜZENLE' id='btnduzenle$x' name='btnduzenle$x' style='vertical-align:bottom;margin-bottom:-5px;'/></td>
											<td><input id='btn' type='submit' value='GÜNCELLE' name='btnguncelle$x'  style='vertical-align:bottom;margin-bottom:-5px;'/></td>
											<td><input id='btn' type='submit' value='SİL' name='btnsil$x'  style='vertical-align:bottom;margin-bottom:-5px;'/></td>
												
												";
										if(@$_POST["btnsil".$x]=="SİL")
										{
											$ekle=mysqli_query($baglan,"delete from kullanici where uye_id=".$satir["uye_id"]);
											if($ekle)
											header("refresh:0;");
										}
										
										if(@$_POST["btnguncelle$x"]=="GÜNCELLE")
										{
											$kadi=$_POST['uyeadi'.$x];
											$mail=$_POST['eposta'.$x];
											$durum=$_POST['durum'.$x];
											$gs=$_POST['gecensure'.$x];
											$tarih=$_POST['tarih'.$x];
											$ekle=mysqli_query($baglan,"update kullanici set k_adi='$kadi' , eposta='$mail' , durum='$durum' where k_id=".$satir["k_id"]."");
											if($ekle)
											{
												
												if($_SESSION["kadi"]==$sessionkontrol)
												{
													$_SESSION["kadi"]=$kadi;
												}
												header("refresh:0;");
											}
											else
												echo"<script>alert('Hata Oluştu');</script>";
										}
										
										$x++;
											echo"</tr>";
								}
						   		echo"<tr><td colspan='6' style='text-align:center;'>";
						   		$sayfa_goster = 3; // gösterilecek sayfa sayısı
 								$en_az_orta = ceil($sayfa_goster/2);
						   		$en_fazla_orta = ($toplam_sayfa+1) - $en_az_orta;
						   		$sayfa_orta = $sayfa;
						   		if($sayfa_orta < $en_az_orta)
									$sayfa_orta = $en_az_orta;
						   		if($sayfa_orta > $en_fazla_orta) 
									$sayfa_orta = $en_fazla_orta;
						   		$sol_sayfalar = round($sayfa_orta - (($sayfa_goster-1) / 2));
						   		$sag_sayfalar = round((($sayfa_goster-1) / 2) + $sayfa_orta); 
						   		if($sol_sayfalar < 1) 
									$sol_sayfalar = 1;
						   		if($sag_sayfalar > $toplam_sayfa) 
									$sag_sayfalar = $toplam_sayfa;
						   if(isset($_GET['k_ad']))
							{
								if($sayfa != 1) 
									echo ' <a href="?sayfa=1?k_ad='.$metin.'#btn">&lt;&lt;İlk sayfa</a> ';
						   		if($sayfa != 1) 
									echo ' <a href="?sayfa='.($sayfa-1).'?k_ad='.$metin.'#btn">&lt;Önceki</a> ';
 								for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) 
								{
    								if($sayfa == $s) 
									{
        								echo '[' . $s . '] ';
    								}
									else 
									{
        								echo '<a href="?sayfa='.$s.'?k_ad='.$metin.'#btn">'.$s.'</a> ';
    								}
								}
 								if($sayfa != $toplam_sayfa) 
									echo ' <a href="?sayfa='.($sayfa+1).'?k_ad='.$metin.'#btn">Sonraki&gt;</a> ';
						   		if($sayfa != $toplam_sayfa) 
									echo ' <a href="?sayfa='.$toplam_sayfa.'?k_ad='.$metin.'#btn">Son sayfa&gt;&gt;</a>';
						   		echo"</td></tr>";
							}		
							else
							{
								if($sayfa != 1) 
									echo ' <a href="?sayfa=1#btn">&lt;&lt;İlk sayfa</a> ';
						   		if($sayfa != 1) 
									echo ' <a href="?sayfa='.($sayfa-1).'#btn">&lt;Önceki</a> ';
 								for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) 
								{
    								if($sayfa == $s) 
									{
        								echo '[' . $s . '] ';
    								}
									else 
									{
        								echo '<a href="?sayfa='.$s.'#btn">'.$s.'</a> ';
    								}
								}
 								if($sayfa != $toplam_sayfa) 
									echo ' <a href="?sayfa='.($sayfa+1).'#btn">Sonraki&gt;</a> ';
						   		if($sayfa != $toplam_sayfa) 
									echo ' <a href="?sayfa='.$toplam_sayfa.'#btn">Son sayfa&gt;&gt;</a>';
						   		echo"</td></tr>";
							}		
							?>
                        </table>
                        <table id="tablo">
                       		<tr>
                        		<th colspan="2">FORUM KONTROL</TH>
                        	</tr>
							<tr>
								<th colspan="2">Forum Ekle</th>
							</tr>
                        	<tr>
                        		<td>
									<input type="text" id="input" placeholder="Forum Adı:" name="forum_ad" style="width:90%;">
								</td>
                        		<td>
									<input type="submit" name="ekle" value="Ekle" id="btn" style=" width:90%;vertical-align:bottom;
                            		margin-bottom:-5px;">
								</td>
                        	</tr>
							<tr>
								<th colspan="2">Forum Düzenle</th>
							</tr>
								<?php
								//--SAYFA LİSTELEME(YAVUZ ÇELİKER 2015 MOVIECLUB)--//
				   				$sayfada = 8; // sayfada gösterilecek içerik miktarını belirtiyoruz.
						   		$sorgu = mysqli_query($baglan,"SELECT COUNT(*) AS toplam FROM forum");
						   		$sonuc = mysqli_fetch_assoc($sorgu);
						   		$toplam_icerik = $sonuc['toplam'];
 								$toplam_sayfa = ceil($toplam_icerik / $sayfada);
						   		// eğer sayfa girilmemişse 1 varsayalım.
						   		$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
						   		// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
						   		if($sayfa < 1) $sayfa = 1; 
						   		// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
						   		if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
						   		// kaçıncı içerikten başlanacağını ifade edecek limit değeri.
						   		$limit = ($sayfa - 1) * $sayfada;
						   		$sorgu = mysqli_query($baglan,"SELECT * FROM forum LIMIT ".$limit.",".$sayfada);
						   		$x=0;
						   		while($satir=mysqli_fetch_array($sorgu)) 
								{
									echo"<tr>";
										if(@$_POST["fbtnduzenle".$x]=="DÜZENLE")
										{
												echo"
											<td>
												<input id='input' name='forumadi$x' type='text' value='".$satir["forum_baslik"]."' style='width:90%;'/>
											</td>";
										}
										else
										{
												echo"
											<td>
												<input id='input' name='forumadi$x' type='text' value='".$satir["forum_baslik"]."' style='width:90%;' disabled='disable' /></td>";	
										}
											echo"
											<td>
												<input id='btn' type='submit' value='DÜZENLE' id='btnduzenle$x' name='fbtnduzenle$x' style='vertical-align:bottom;margin-bottom:-5px; width:30%;'/>
												<input id='btn' type='submit' value='GÜNCELLE' name='fbtnguncelle$x'  style='vertical-align:bottom;margin-bottom:-5px; width:30%;'/>
												<input id='btn' type='submit' value='SİL' name='fbtnsil$x'  style='vertical-align:bottom;margin-bottom:-5px; width:30%;'/>
											</td>
												
												";
										if(@$_POST["fbtnsil".$x]=="SİL")
										{
											$ekle=mysqli_query($baglan,"delete from forum where forum_id=".$satir["forum_id"]);
											if($ekle)
											header("refresh:0;");
										}
										
										if(@$_POST["fbtnguncelle$x"]=="GÜNCELLE")
										{
											$fadi=$_POST['forumadi'.$x];
											$ekle=mysqli_query($baglan,"update forum set forum_baslik='$fadi' where forum_id=".$satir["forum_id"]."");
											if($ekle)
											{
												header("refresh:0;");
											}
											else
												echo"<script>alert('Hata Oluştu');</script>";
										}
										
										$x++;
											echo"</tr>";
								}
			echo"<tr><td colspan='6' style='text-align:center;'>";
						   		$sayfa_goster = 3; // gösterilecek sayfa sayısı
 								$en_az_orta = ceil($sayfa_goster/2);
						   		$en_fazla_orta = ($toplam_sayfa+1) - $en_az_orta;
						   		$sayfa_orta = $sayfa;
						   		if($sayfa_orta < $en_az_orta)
									$sayfa_orta = $en_az_orta;
						   		if($sayfa_orta > $en_fazla_orta) 
									$sayfa_orta = $en_fazla_orta;
						   		$sol_sayfalar = round($sayfa_orta - (($sayfa_goster-1) / 2));
						   		$sag_sayfalar = round((($sayfa_goster-1) / 2) + $sayfa_orta); 
						   		if($sol_sayfalar < 1) 
									$sol_sayfalar = 1;
						   		if($sag_sayfalar > $toplam_sayfa) 
									$sag_sayfalar = $toplam_sayfa;
						   		if($sayfa != 1) 
									echo ' <a href="?sayfa=1#btn">&lt;&lt;İlk sayfa</a> ';
						   		if($sayfa != 1) 
									echo ' <a href="?sayfa='.($sayfa-1).'#btn">&lt;Önceki</a> ';
 								for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) 
								{
    								if($sayfa == $s) 
									{
        								echo '[' . $s . '] ';
    								}
									else 
									{
        								echo '<a href="?sayfa='.$s.'#btn">'.$s.'</a> ';
    								}
								}
 								if($sayfa != $toplam_sayfa) 
									echo ' <a href="?sayfa='.($sayfa+1).'#btn">Sonraki&gt;</a> ';
						   		if($sayfa != $toplam_sayfa) 
									echo ' <a href="?sayfa='.$toplam_sayfa.'#btn">Son sayfa&gt;&gt;</a>';
						   		echo"</td></tr>";
				   				
								?>
                        </table>
						<?php
							@include("kontrol.php");
							if(@$_POST["ekle"]=="Ekle")
							{
								$forum=harfkontrol($_POST["forum_ad"]);
								$ekle=mysqli_query($baglan,"insert into forum (forum_baslik) values('$forum')");
								if(!$ekle)
									echo"<script>alert('Hata Oluştu');</script>";
							}
						?>
    	</div>
    <?php ob_end_flush();?>
    	
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