 
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
		#resimcontainer
		{
			border-radius:10px;
			padding-top:3%;
			background:#999;
			opacity:0;
			visibility:hidden;
			width:80%;
			position:absolute;
			z-index:20;
			transition:all 1s;
			box-shadow:0 0  1000px 1000px rgba(0,0,0,0.9);
		}
		#uyecontainer,#forumcontainer
		{
			border-radius:10px;
			padding-top:3%;
			background:#999;
			opacity:0;
			visibility:hidden;
			width:80%;
			position:absolute;
			z-index:20;
			margin-top:-60%;
			transition:all 1s;
			box-shadow:0 0  1000px 1000px rgba(0,0,0,0.9);
		}
		.baslik,#baslik
		{
  			border:5px solid black;
			transition: all .5s;
			text-align:center;
			border-radius:20px;
			background:#4a5763;
			color:#999;
			margin-bottom:3%;
			height:43px;
			padding:2% 2% 2% 6%;
		}
		.baslik>h1
		{
			color:white;
		}
		#tb0,#tb1,#tb2,#tb3{visibility: hidden;width:100%;}
		.baslik>h1:hover,#baslik>h1:hover
		{
			transition:all 1s;
			color:white;
			cursor:n-resize;
		}
    </style>
</head>

<body class="our-team-page" id="admin">
  	
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
    
   <script>
	   	function hareket(baslikno)
	   	{
		   	for(var i=0;i<=3;i++)
			{
				var deneme=document.getElementById("b"+i);
				var tb=document.getElementById("tb"+i);
				if(baslikno==i.toString())
				{
					if(deneme.style.height=="auto" && deneme.style.background=="rgb(132, 215, 255)")
					{
						tb.style.visibility="hidden";
			   			deneme.style.height="43px";
			   			deneme.style.background="#4a5763";
					}
		   			else
					{
						tb.style.visibility="visible";
			   			deneme.style.height="auto";
			   			deneme.style.background="#84D7FF";
					}
				}
			}
	   }
	   
		function resimgoster()
	   	{
			   
			$resimyol=document.getElementsByName('h_resim')[0].getAttribute("src");
			var resimcontainer=document.getElementById("resimcontainer");
			if(resimcontainer.getAttribute('deger')=="kapali")
			{
				resimcontainer.style.visibility='visible';
				resimcontainer.setAttribute("deger","acik");
				resimcontainer.style.opacity='1';
			}
			else
			{
				resimcontainer.style.opacity='0';
				resimcontainer.style.visibility='hidden';
				resimcontainer.setAttribute("deger","kapali");
			}
		}
		function bilgigetir(sayi)
	   	{
			var uyecontainer=document.getElementById("uyecontainer");
			if(sayi==2)
			uyecontainer=document.getElementById("forumcontainer");
			if(uyecontainer.getAttribute('deger')=="kapali")
			{
				uyecontainer.style.visibility='visible';
				uyecontainer.setAttribute("deger","acik");
				uyecontainer.style.opacity='1';
			}
			else
			{
				uyecontainer.style.opacity='0';
				uyecontainer.style.visibility='hidden';
				uyecontainer.setAttribute("deger","kapali");
			}
		}

	   	$hbkontrol=0;
		$hmkontrol=0;
		$dk=0;
	   	var timer = setInterval(kontrol,10);
						function kontrol()
						{
							$haberbaslik=16-document.getElementsByName("h_baslik")[0].value.length;
							$habermetni=30-document.getElementsByName("h_metni")[0].value.length;
							$dosya=document.getElementsByName("hresim")[0].value.length;
							if($hbkontrol==1 && $hmkontrol==1 && $dk==1)
							{
									document.getElementsByName("h_baslik")[0].style.background = "#e2ffc1";
									document.getElementsByName("hekle")[0].disabled=false;
									document.getElementsByName("hekle")[0].style.background = "#0ea800";
							}
							else
							{
								document.getElementsByName("hekle")[0].disabled=true;
								document.getElementsByName("hekle")[0].style.background = "#cc3939";
							}
							if($haberbaslik<6)
							{
								$hbkontrol=1;
								document.getElementsByName("h_baslik")[0].style.background = "#e2ffc1";
								document.getElementsByName("h_metni")[0].disabled=false;
								if($habermetni<8)
								{
									$hmkontrol=1;
									document.getElementsByName("h_metni")[0].style.background = "#e2ffc1";
									document.getElementsByName("hresim")[0].disabled=false;
									if($dosya>5)
									{
										$dk=1;
										document.getElementsByName("hresim")[0].style.background = "#e2ffc1";
										document.getElementsByName("hekle")[0].disabled=false;
									}
									else
									{
										$kadikontrol=0;
										document.getElementsByName("hekle")[0].disabled=true;
										document.getElementsByName("hresim")[0].style.background = "#ffd1d1";
									}
								}
								else
								{
									$kadikontrol=0;
									document.getElementsByName("hresim")[0].disabled=true;
									document.getElementsByName("h_metni")[0].style.background = "#ffd1d1";
								}
							}
							else
							{
								$adikontrol=0;
								document.getElementsByName("h_metni")[0].disabled=true;
								document.getElementsByName("h_baslik")[0].style.background = "#ffd1d1";
							}
						}
	</script>
	<div class="container">
    	<div id="container" >
			<div class="baslik" id="b0">
   				<h1 id="baslik0" onClick="hareket('0')">Admin Bilgileri</h1>
   				<table id="tb0"style="font-size:15px;">
                   		<tr>
                   			<th colspan="3" class="tablo1" onClick="bas()">Admin Bilgileri</th>
                   		</tr>
                   		<tr>
                   			<td><?php
								include("baglan.php");
									$satir=mysqli_fetch_array($ekle=mysqli_query($baglan,"select * from kullanici where k_adi='".$_SESSION["kadi"]."'"));
									if($satir["durum"]!="admin")
										header("location:index.php");
									echo "&nbsp&nbsp<img src='".$satir["pp"]."' style='border-radius:5px;box-shadow:0 0 10px rgba(0,0,0,0.8);' width='100' />";
									if(@$_POST["guncelle"]=="GÜNCELLE")
									{
										if($_FILES['profpics']['name']!="")
										{
											$pp="images/kullanici/".$_SESSION['kadi'].".png";
											$gecici=$_FILES['profpics']['tmp_name'];
			   								$satir=mysqli_fetch_array($ekle=mysqli_query($baglan,"select * from kullanici where k_adi='".$_SESSION["kadi"]."'"));					@unlink($satir["pp"]);
											copy($gecici,$pp);
											$ekle=mysqli_query($baglan,"update kullanici set pp='$pp' where k_adi='".$_SESSION["kadi"]."'");
											if($ekle)
											{
												header("refresh:0;");	
											}
										}
										else if($_POST['kadi']!="")
										{
											$kadi=$_POST['kadi'];																			
											$ekle=mysqli_query($baglan,"update kullanici set k_adi='$kadi' where k_adi='".$_SESSION["kadi"]."'");
											if($ekle)
											{
												$_SESSION["kadi"]=$kadi;
												header("refresh:0;");	
											}
										}
										else if($_POST['mail']!="")
										{
											$mail=$_POST['mail'];																			
											$ekle=mysqli_query($baglan,"update kullanici set eposta='$mail' where k_adi='".$_SESSION["kadi"]."'");
											if($ekle)
											{
												header("refresh:0;");	
											}	
										}
										else if($_POST['esifre']!="" and $_POST['ysifre']!="" and $_POST['yysifre']!="")
										{
											$esifre=$_POST['esifre'];
											$ysifre=$_POST['ysifre'];
											$yysifre=$_POST['yysifre'];								
											if($satir["k_sifre"]==$esifre)							
											{
												if($ysifre==$yysifre)
												{
													$ekle=mysqli_query($baglan,"update kullanici set k_sifre='$mail' where k_adi='".$_SESSION["kadi"]."'");
													if($ekle)
													{
														header("refresh:0;");	
													}
												}
												else
													echo("<script>alert('Yeni Şifreler Eşleşmiyor!')</script>");
											}
											else
												echo("<script>alert('Eski Şifre Eşleşmiyor!')</script>");
										}
										else if($_POST['telefon']!="")
										{
											$telefon=$_POST['telefon'];																			
											$ekle=mysqli_query($baglan,"update kullanici set telefon='$telefon' where k_adi='".$_SESSION["kadi"]."'");
											if($ekle)
											{
												header("refresh:0;");	
											}	
										}
										else if($_POST['isim']!="")
										{
											$isim=$_POST['isim'];																			
											$ekle=mysqli_query($baglan,"update kullanici set isim='$isim' where k_adi='".$_SESSION["kadi"]."'");
											if($ekle)
											{
												header("refresh:0;");	
											}	
										}
										else if($_POST['kadi']=="" and $_POST['mail']=="" and $_POST['profpics']['name']=="" and $_POST['isim']=="" and $_POST['telefon']=="")
										{
											echo"<script>GÜNCELLENECEK VERİYİ GİRİNİZ!</script>";	
										}
									}
									echo"<br>&nbsp;&nbsp;<b>".$satir["isim"]."</b>";?></td>
                   			<td>
                   				<b>
                   					İsim:
                   				<br>Kullanıcı Adı:
                   				<br>Şifre:
                   				<br>E-Posta:
                   				<br>Telefon:
                   				</b>
                   			</td>
                   			<td>
                   			<?php 
								echo $satir["isim"]."<br>".$satir["k_adi"]."<br>*************<br>".$satir["eposta"]."<br>".$satir["telefon"];
							?>
                   			</td>
                   		</tr>
                            <tr>
                            	<th colspan="3">Güncelle</th>
                            </tr>
                            <tr>
                                <td>
                                	<input type="file" class="profpics" name="profpics" id="input" style="width:170px;" />
                                </td>
                                <td><input placeholder="Kullanıcı A." type="text" maxlength="16" id="input" name="kadi" style="width:170px;" /></td>
                                <td><input type="text" placeholder="İsim" maxlength="80" id="input" name="isim" style="width:170px;" /></td>
                           </tr>
                           <tr>
                           		<td><input type="email" maxlength="100" placeholder="E-Posta" id="input" name="mail" style="width:170px;" /></td>
                                <td><input type="text" placeholder="telefon" id="input" name="telefon" style="width:170px;" pattern="[0-9]" autocomplete="off" title="0-9 Arası Karakterler!" /></td>
                            	<td>
                            		<input type="submit" id="btn" name="sifreyenile" value="Şifre Yenile" style="vertical-align:bottom;
                            		margin-bottom:-5px; width:205px;"/>
                            	</td>
                           </tr>
                           <?php
								if(@$_POST["sifreyenile"]=="Şifre Yenile")
								{
									echo"<script>var deneme=document.getElementById('b0');
									var tb=document.getElementById('tb0');
									tb.style.visibility='visible';
			   						deneme.style.height='auto';
			   						deneme.style.background='#84D7FF';</script>";
									echo"
									<tr>
										<td><input type='password'  maxlength='12' placeholder='Eski Şifre' id='input' name='esifre' autocomplete='off' style='width:170px;'/></td>
										<td><input type='password'  maxlength='12' placeholder='Yeni Şifre' id='input' name='ysifre' autocomplete='off' style='width:170px;' disabled='true'/</td>
										<td><input type='password' maxlength='12'placeholder='Yeni Şifre Tekrar' id='input' autocomplete='off' name='yysifre' style='width:170px;' disabled='true'/></td>
									</tr>
									";	
								}
							?>
                           <tr>
                            	<td colspan="3">
                            		<input type="submit" id="btn" style="width: 100%;" name="guncelle" value="GÜNCELLE"/>
                            	</td>
                           </tr>
                        </table>
   			</div>
    		<div class="baslik" id="b1">
    			<h1 id="baslik1" onClick="hareket('1')">Haber Kontrolü</h1>
    			<table id="tb1">
					<tr>
						<th colspan="3">HABER KONTROLÜ</th>
					</tr>
					<tr>
						<th colspan="3">Haber Ekleme</th>
					</tr>
					<tr>
                    	<td colspan="3">
							<input type="text" placeholder="Haber Başlığı" maxlength="17" id="input" name="h_baslik" style="width:80%; min-width:170px;" /><br>
							<textarea placeholder="Haber Metni" id="input" name="h_metni" maxlength="400" style="width:80%; min-width:170px;" disabled='disable'></textarea><br>
							<input type="file" class="profpics" name="hresim" id="input" style="min-width:170px; width:80%;" disabled='disable'/><br>
							<input type="submit" id="btn" style="vertical-align:bottom; width:85%; min-width:170px;" name="hekle" value="HABERİ EKLE" disabled='disable'/>
						</td>
					</tr>
					<tr><td><br></td></tr>
					<tr>
						<th colspan="3">Haber Kontrol</th>
					</tr>
           			<tr>
           				<td colspan="2">
           					<select style="width:90%;margin-left:10%;" id="input" name="secopt">
								<option value="0">Düzenlenecek Haberi Seçin</option>
								<?php
								if(isset($_GET['d']))
								{
										echo"
										<script>
											document.getElementsByName('btnduzenle')[0].style.visibility='visible';
											document.getElementsByName('btnguncelle')[0].style.visibility='visible';
											document.getElementsByName('btnsil')[0].style.visibility='visible';</script>";
									echo"<script>var deneme=document.getElementById('b1');
									var tb=document.getElementById('tb1');
									tb.style.visibility='visible';
			   						deneme.style.height='auto';
			   						deneme.style.background='#84D7FF';</script>";
								}
								$deger=explode("|",$_GET['d']);
								   $sayac=1;
									$sql=mysqli_query($baglan,"select * from haber");
									while($yaz=mysqli_fetch_array($sql))
									{
										if($deger[0]==$sayac)
											echo"<option value='$sayac|$yaz[1]' selected>$yaz[1]</option>";
											else
										echo"<option value='$sayac|$yaz[1]'>$yaz[1]</option>";
										$sayac++;
									}
								?>
           					</select>
           				</td>
           				<td><input type="submit" id="btn" style="margin-top:-14%; margin-left:-15%;" name="sec" value="SEÇ"  ></td>
           			</tr>
           			<tr>
					   <?php
			if(@$_POST["sec"]=="SEÇ")
			{
				header("location:a-aess2.php?d=".$_POST["secopt"]);
				
			}
			if(@$_POST["hekle"]=="HABERİ EKLE")
			{
				$boyut=$_FILES["hresim"]["size"];
				$durum=0;
				$habermetni=$_POST["h_metni"];
				$haberbaslik=$_POST["h_baslik"];
				$ekle="";
    			if($habermetni=="" || $haberbaslik=="" || $boyut==0)
				{
					echo("<script>alert('Hata');</script>");
				}
				else
				{
					
					$dosyaadi=$haberbaslik;
					$aranan=array("ç","Ç","ğ","Ğ","ı","İ","ö","Ö","ş","Ş","ü","Ü"," ");
					$yerine=array("c","C","g","G","i","I","o","O","s","S","u","U","_");
    				for($i=0;$i<sizeof($aranan);$i++)
    				{
    					$dosyaadi=str_replace($aranan[$i],$yerine[$i],$dosyaadi);
    				}
					$geciciyol=$_FILES["hresim"]["tmp_name"];
					$dosyayolu="images/haber/".$dosyaadi.".png";
					$tarih=date('Y-m-d H:i:s');
					if (!is_dir("images/haber/"))
					{
						$durum=1;
					}
					$ekle=mysqli_query($baglan,"insert into haber(haber_baslik,haber_metni,haber_resmi,tarih) values('$haberbaslik','$habermetni','$dosyayolu','$tarih')");
					if($ekle)
					{
						if($durum==1)
							mkdir("images/haber/", 0700);
							copy($geciciyol,$dosyayolu);
							$sorgu=mysqli_query($baglan,"select * from haberbilgi");
							while($gonder=mysqli_fetch_array($sorgu))
							{
								@mail($gonder[1],$haberbaslik,$habermetni,"From:dogrulama@aess.com");
							}
							header("location:a-aess2.php?d=0");
					}
					else
					{
						echo("<script>alert('Hata');</script>");
					}
				}
			}
								@$sorgu=mysqli_query($baglan,"select * from haber where haber_baslik='".$deger[1]."'");
									
									
						   		$x=0;
								$satir=0;
						   		$sessionkontrol="";
 								while(@$satir=mysqli_fetch_array($sorgu)) 
								{
									echo"<tr>
           								<td><input id='input' name='haberbaslik' type='text' value='$satir[1]' disabled='true' style='width:45%;'/></td>
           								<td><input id='input' name='habermetni' type='text' value='$satir[2]' disabled='true' style='width:70%; margin-left:-20%;'/></td>
										<td><img src='$satir[3]' name='h_resim' style='border-radius:5px;box-shadow:0 0 10px rgba(0,0,0,0.8);height:50px;margin-left:-40%;margin-top:-20px;' onclick='resimgoster()'></td>";
										if(@$_POST["btnduzenle"]=="DÜZENLE")
										{
											echo"
											<script>
												document.getElementsByName('haberbaslik')[0].disabled=false;
												document.getElementsByName('habermetni')[0].disabled=false;
												document.getElementsByName('btnduzenle')[0].style.visibility='visible';
												document.getElementsByName('btnsil')[0].style.visibility='visible';
												document.getElementsByName('btnguncelle')[0].style.visibility='visible';
											</script>";
										}
										if(@$_POST["btnsil"]=="SİL")
										{
											$ekle=mysqli_query($baglan,"delete from haber where haber_id=".$satir["haber_id"]);
											if($ekle)
											{
												unlink($satir["haber_resmi"]);
												echo"<script>alert('Silindi!');</script>";
												header("location:a-aess2.php");
											}
										}
										
										if(@$_POST["btnguncelle"]=="GÜNCELLE")
										{
											$haberbaslik=$_POST['haberbaslik'];
											$habermetni=$_POST['habermetni'];
											$ekle=mysqli_query($baglan,"update haber set haber_baslik='$haberbaslik',haber_metni='$habermetni' where haber_id=".$satir["haber_id"]."");
											if($ekle)
											{
												echo"<script>alert('Güncellendi!');</script>";
												header("location:a-aess2.php");
											}else
												echo"<script>alert('Hata Oluştu');</script>";
										}
										
										$x++;
											echo"</tr>
											
											<tr>
												<td style='padding-bottom:20px; '><input id='btn' style='width:60%;'type='submit'  value='DÜZENLE' id='btnduzenle' name='btnduzenle' /></td>
												<td style='padding-bottom:20px;'><input id='btn' style='width:85%;margin-left:-27%;'  type='submit' value='GÜNCELLE' id='btnguncelle' name='btnguncelle'/></td>
												<td style='padding-bottom:20px; '><input id='btn' style='margin-left:-45%;width:80%;'  type='submit' value='SİL' id='btnsil' name='btnsil'/></td>
											</tr>
											</tr>
											<tr>
												<td colspan='3'>
													<div deger='kapali' id='resimcontainer'>
														<img id='h_resim' style='width:85%;border-radius:20px;' id='img' src='".$satir[3]."' onclick='resimgoster()'/><div onclick='resimgoster()' style='background:red;width:5%;height:5%;float:right;cursor:pointer;margin-right:1%;color:#FFF;'><b>X</b></div><br>
														<input type='file' class='profpics' name='h_resimdegis' id='input' style='min-width:170px; width:39%;margin-top:3%;' />
														<input type='submit' id='btn' style='width:39%; min-width:170px;margin-top:3%;'' name='rdegis' value='Fotoğrafı Değiştir'/>
													</div>
												</td>
											</tr>
											";
											
								if(@$_POST["rdegis"]=="Fotoğrafı Değiştir")
								{
									$dosyaadi=$satir[1];
									$aranan=array("ç","Ç","ğ","Ğ","ı","İ","ö","Ö","ş","Ş","ü","Ü"," ");
									$yerine=array("c","C","g","G","i","I","o","O","s","S","u","U","_");
									for($i=0;$i<sizeof($aranan);$i++)
									{
										$dosyaadi=str_replace($aranan[$i],$yerine[$i],$dosyaadi);
									}
									$geciciyol=$_FILES["h_resimdegis"]["tmp_name"];
									$dosyayolu="images/haber/".$dosyaadi.".png";
									$ekle=mysqli_query($baglan,"update haber set haber_resmi='$dosyayolu' where haber_id='".$satir[0]."'");
									if($ekle)
									{
										unlink($satir["haber_resmi"]);
										copy($geciciyol,$dosyayolu);
												echo"<script>alert('Güncellendi!');</script>";
												header("location:a-aess2.php");
									}
								}
							}
					?>
            
				</table>
    		</div>
    				<div class="baslik"  id="b2">
    					<h1 id="baslik2" onClick="hareket('2')">Üye Kontrolü</h1>
						<table id="tb2"><TR><TH  colspan="6">ÜYE KONTROLÜ</TH></TR>
                        	<tr><th colspan="2">Üye Arama</th></tr>
                        	<tr>
                        		<td><input type="text" id="input" placeholder="Kullanıcı Adı:" name="k_ad" style="width:40%;"><input  style="width:17%;"type="submit" id="btn" name="k_ara" value="ARA" onclick="bilgigetir()"
                        	/></td>
                        	</tr>
                        	<tr>
                            	<th colspan="2">Üye Adı</th>
                            </tr>
						   	<?php
								@include("kontrol.php");
								
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
									$metin=harfkontrol($_GET["k_ad"],"1");
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
 								while(@$satir=mysqli_fetch_array($sorgu)) 
								{
									if($satir["durum"]=="admin")
									{
										if($satir["k_adi"]==$_SESSION["kadi"])
											echo"<tr><td colspan='2'><input id='input' name='uyeadi$x' type='submit' value='".$satir["k_adi"]."' style='width:60%; background:rgb(107, 255, 120);'/></td></tr>";
										else
											echo"<tr><td colspan='2'><input id='input' name='uyeadi$x' type='submit' value='".$satir["k_adi"]."' style='width:60%; background:rgb(226, 255, 193);'/></td></tr>";
									}
									else
										echo"<tr><td colspan='2'><input id='input' name='uyeadi$x' type='submit' value='".$satir["k_adi"]."' style='width:60%;'/></td></tr>";
									
								
								if(@$_POST["uyeadi$x"]==$satir["k_adi"])
								{
									header("location:a-aess2.php?ud=1&uk=1&id=".$satir['k_adi']."#uyecontainer");
								}	
									
									
									$x++;
									
								}
						   		echo"<tr><td colspan='2' style='text-align:center;'>";
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
										echo ' <a href="?sayfa=1?k_ad='.$metin.'&uk=1#btn">&lt;&lt;İlk sayfa</a> ';
						   			if($sayfa != 1) 
										echo ' <a href="?sayfa='.($sayfa-1).'?k_ad='.$metin.'&uk=1#btn">&lt;Önceki</a> ';
 									for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) 
									{
    									if($sayfa == $s) 
										{
        									echo '[' . $s . '] ';
    									}
										else 
										{
        									echo '<a href="?sayfa='.$s.'?k_ad='.$metin.'&uk=1#btn">'.$s.'</a> ';
										}
									}
 									if($sayfa != $toplam_sayfa) 
										echo ' <a href="?sayfa='.($sayfa+1).'?k_ad='.$metin.'&uk=1#btn">Sonraki&gt;</a> ';
						   			if($sayfa != $toplam_sayfa) 
										echo ' <a href="?sayfa='.$toplam_sayfa.'?k_ad='.$metin.'&uk=1#btn">Son sayfa&gt;&gt;</a>';
						   			echo"</td></tr>";
								}		
								else
								{
									if($sayfa != 1) 
										echo ' <a href="?sayfa=1&uk=1#btn">&lt;&lt;İlk sayfa</a> ';
						   			if($sayfa != 1) 
										echo ' <a href="?sayfa='.($sayfa-1).'&uk=1#btn">&lt;Önceki</a> ';
 									for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) 
									{
    									if($sayfa == $s) 
										{
        									echo '[' . $s . '] ';
    									}
										else 
										{
        									echo '<a href="?sayfa='.$s.'&uk=1#btn">'.$s.'</a> ';
    									}
									}
 									if($sayfa != $toplam_sayfa) 
										echo ' <a href="?sayfa='.($sayfa+1).'&uk=1#btn">Sonraki&gt;</a> ';
						   			if($sayfa != $toplam_sayfa) 
										echo ' <a href="?sayfa='.$toplam_sayfa.'&uk=1#btn">Son sayfa&gt;&gt;</a>';
						   			echo"</td></tr>";
								}
								echo"
								<tr>
									<td>
										<div id='uyecontainer'><div onclick='bilgigetir()' style='background:red;width:5%;height:5%;float:right;cursor:pointer;margin-right:1%;color:#FFF;'><b>X</b></div>
											<table style='width:80%;margin:0 0 4% 10%;'><tr><th><h3>Üye Bilgi Kotrolü</h3></th></tr>";
											if(isset($_GET["ud"])&&isset($_GET["id"]))
											{
												if($_GET["ud"]=="1")
												{
													$k_id=$_GET["id"];
													$query=mysqli_query($baglan,"select * from kullanici where k_adi='$k_id'");
													echo"<script>
														var uyecontainer=document.getElementById('uyecontainer');
														document.getElementById('uyecontainer').style.visibility='visible';
														document.getElementById('uyecontainer').style.opacity='1';
													</script>";
													
													while($satir=mysqli_fetch_array($query))
													{
														echo"
												<tr>
													<td><input type='text' id='input' placeholder='".$satir['k_adi']."' name='ku_id' style='width:80%;'></td>
												</tr>
												<tr>
													<td><input type='text' id='input' placeholder='".$satir['isim']."' name='ku_isim' style='width:80%;'></td>
												</tr>
												<tr>
													<td>
														<select style='width:84%;' id='input' name='ku_durum'>";
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
														</select>
													</td>
												</tr>
												<tr>
													<td><input  style='width:84%;margin-left:-1%;'type='submit' id='btn' name='ku_kaydet' value='KAYDET'
													/></td>
												</tr>
											</table>
										</div>
									</td>
								</tr>";			}
											}
												
											if(@$_POST["ku_kaydet"]=="KAYDET")
											{
												$kadi=@$_POST['ku_id'];
												$isim=@$_POST['ku_isim'];
												$durum=@$_POST['ku_durum'];
												if($kadi!=""&&$isim!="")
												{
													$komut=mysqli_query($baglan,"update kullanici set k_adi='".harfkontrol($kadi,"1")."',isim='".harfkontrol($isim,"1")."',durum='".harfkontrol($durum,"")."' where k_adi='$k_id'");
												}
												else if($kadi!=""&&$isim=="")
												{
													$komut=mysqli_query($baglan,"update kullanici set k_adi='".harfkontrol($kadi,"")."',durum='".harfkontrol($durum,"")."' where k_adi='$k_id'");
												}
												else if($kadi==""&&$isim!="")
												{
													$komut=mysqli_query($baglan,"update kullanici set isim='".harfkontrol($isim,"1")."',durum='".harfkontrol($durum)."' where k_adi='$k_id'");
												}
												else
												{
													$komut=mysqli_query($baglan,"update kullanici set durum='".harfkontrol($durum,"")."' where k_adi='$k_id'");
												}
												if($komut)
												{
													echo"<script>alert('oldu');</script>";
													header("location:a-aess2.php?uk=1#tb2");
												}
											}
										}
										else
											echo"</table></div></td></tr>";
							
							
								if(@$_POST["k_ara"]=="ARA")
								{
									header("location:a-aess2.php?k_ad=".harfkontrol($_POST["k_ad"],"")."&uk=1");
								}
								if(isset($_GET["uk"]))
								{
									if($_GET["uk"]=="1")
									{
										echo"
										<script>
											var deneme=document.getElementById('b2');
											var tb=document.getElementById('tb2');
											tb.style.visibility='visible';
			   								deneme.style.height='auto';
			   								deneme.style.background='#84D7FF';
										</script>";
									}
								}
								
							?>
                        </table>
    		</div>
    		<div class="baslik"  id="b3">
    			<h1 id="baslik3" onClick="hareket('3')">Forum Kontrolü</h1>
                       	<table id="tb3"><TR><TH  colspan="6">Forum KONTROLÜ</TH></TR>
                        	<tr><th colspan="2">Forum Arama</th></tr>
                        	<?php
								//--SAYFA LİSTELEME(YAVUZ ÇELİKER 2015 MOVIECLUB)--//
				   				$sayfada = 8; // sayfada gösterilecek içerik miktarını belirtiyoruz.
								$sorgu="";
								$sonuc="";
						   		$toplam_icerik="";
 								$toplam_sayfa =0;
						   		$sayfa =0;
						   		$limit=0;
								if(isset($_GET['f_ara']))
								{
									$metin=harfkontrol($_GET["f_ara"],"1");
									$sorgu2 = mysqli_query($baglan,"SELECT COUNT(*) AS toplam FROM forum where forum_baslik like '%$metin%'");
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
									$sorgu=mysqli_query($baglan,"select * from forum where forum_baslik like '%$metin%' LIMIT ".$limit.",".$sayfada);
								}
								else
								{
						   			$sorgu2 = mysqli_query($baglan,"SELECT COUNT(*) AS toplam FROM forum");
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
						   			$sorgu = mysqli_query($baglan,"SELECT * FROM forum LIMIT ".$limit.",".$sayfada);
								}
						   		$x=0;
 								while(@$satir=mysqli_fetch_array($sorgu)) 
								{
									echo"<tr><td colspan='2'><input id='input' name='forumadi$x' type='submit' value='".$satir["forum_baslik"]."' style='width:60%;'/></td></tr>";
									if(@$_POST["forumadi$x"]==$satir["forum_baslik"])
										header("location:a-aess2.php?fd=1&fk=1&id=".$satir['forum_id']."#uyecontainer");
									$x++;
								}
							
								
								echo"<tr><td colspan='2' style='text-align:center;'>";
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
								if(isset($_GET['f_ara']))
								{
									if($sayfa != 1) 
										echo ' <a href="?sayfa=1?f_ara='.$metin.'&fk=1#btn">&lt;&lt;İlk sayfa</a> ';
						   			if($sayfa != 1) 
										echo ' <a href="?sayfa='.($sayfa-1).'?f_ara='.$metin.'&fk=1#btn">&lt;Önceki</a> ';
 									for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) 
									{
    									if($sayfa == $s) 
										{
        									echo '[' . $s . '] ';
    									}
										else 
										{
        									echo '<a href="?sayfa='.$s.'?f_ara='.$metin.'&fk=1#btn">'.$s.'</a> ';
										}
									}
 									if($sayfa != $toplam_sayfa) 
										echo ' <a href="?sayfa='.($sayfa+1).'?f_ara='.$metin.'&fk=1#btn">Sonraki&gt;</a> ';
						   			if($sayfa != $toplam_sayfa) 
										echo ' <a href="?sayfa='.$toplam_sayfa.'?f_ara='.$metin.'&fk=1#btn">Son sayfa&gt;&gt;</a>';
						   			echo"</td></tr>";
								}		
								else
								{
									if($sayfa != 1) 
										echo ' <a href="?sayfa=1&fk=1#btn">&lt;&lt;İlk sayfa</a> ';
						   			if($sayfa != 1) 
										echo ' <a href="?sayfa='.($sayfa-1).'&fk=1#btn">&lt;Önceki</a> ';
 									for($s = $sol_sayfalar; $s <= $sag_sayfalar; $s++) 
									{
    									if($sayfa == $s) 
										{
        									echo '[' . $s . '] ';
    									}
										else 
										{
        									echo '<a href="?sayfa='.$s.'&fk=1#btn">'.$s.'</a> ';
    									}
									}
 									if($sayfa != $toplam_sayfa) 
										echo ' <a href="?sayfa='.($sayfa+1).'&fk=1#btn">Sonraki&gt;</a> ';
						   			if($sayfa != $toplam_sayfa) 
										echo ' <a href="?sayfa='.$toplam_sayfa.'&fk=1#btn">Son sayfa&gt;&gt;</a>';
						   			echo"</td></tr>";
								}
								
							
							
							
								
								echo"
								<tr>
									<td>
										<div id='forumcontainer'>
										<div onclick='bilgigetir(2)' style='background:red;width:5%;height:5%;float:right;cursor:pointer;margin-right:1%;color:#FFF;'><b>X</b></div>
											<table style='width:80%;margin:0 0 4% 10%;'>
												<tr>
													<th><h3>Forum Bilgi Kotrolü</h3></th>
												</tr>";
												if(isset($_GET["fd"])&&isset($_GET["id"]))
												{
													if($_GET["fd"]=="1")
													{
														$k_id=$_GET["id"];
														$query=mysqli_query($baglan,"select * from forum where forum_id='$k_id'");
														echo"
														<script>
															var forumcont=document.getElementById('forumcontainer');
															forumcont.style.visibility='visible';
															forumcont.style.opacity='1';
														</script>";
													
														while($satir=mysqli_fetch_array($query))
														{
												echo"
												<tr>
													<td><input type='text' id='input' placeholder='".$satir['forum_baslik']."' name='f_id' style='width:80%;'></td>
												</tr>
												<tr>
													<td><input  style='width:84%;margin-left:-1%;'type='submit' id='btn' name='f_kaydet' value='KAYDET'/></td>
												</tr>
											</table>
										</div>
									</td>
								</tr>";					}
													}
												
													if(@$_POST["f_kaydet"]=="KAYDET")
													{
														$kadi=@$_POST['f_id'];
														if($kadi!="")
														{
															$komut=mysqli_query($baglan,"update forum set forum_baslik='".harfkontrol($kadi,"1")."' where forum_id='$k_id'");
															if($komut)
															{
																echo"<script>alert('oldu');</script>";
																header("location:a-aess2.php?fk=1#tb3");
															}
														}
														else
															header("location:a-aess2.php?fk=1#tb3");
													}
												}
												else
													echo"
											</table>
										</div>
									</td>
								</tr>";
							
								
								if(@$_POST["f_ara"]=="ARA")
								{
									header("location:a-aess2.php?f_ara=".harfkontrol($_POST["f_ad"],"1")."&fk=1");
								}
								if(isset($_GET["fk"]))
								{
									if($_GET["fk"]=="1")
									{
										echo"
										<script>
											var deneme=document.getElementById('b3');
											var tb=document.getElementById('tb3');
											tb.style.visibility='visible';
			   								deneme.style.height='auto';
			   								deneme.style.background='#84D7FF';
										</script>";
									}
								}
							
							
							
							?>
                        </table>
    		</div>
	</div>
    
    
    
    <!-- =====================================================================
                                     END ICERIK 
    ====================================================================== -->
    
    
    <!-- =====================================================================
                                     START FOOTER
    ====================================================================== -->


    <div class="footer">
	<div class="container" style="padding-left:3%;">
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