<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>AESS Kayıt</title>
      <link rel="stylesheet" href="css/giris.css">
	<style type="text/css">
		input
		{
			margin:3%;
		}
		#container
		{
			background-size: cover;
			margin-top:1%;
		}
		#dosya
		{
			padding-top:10px;
		}
	</style>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
		<div id="container" class="form-container">
			<div class="logo">
				<img src="images/elements/giris.png" width="80px" height="43px"> </img>
            </div>
			<h1>AESS Kayıt</h1>
	        <input class="username" type="text" name="adi" placeholder="Ad Soyad:" maxlength="80"><br />
	        <input class="username" type="text" name="kadi" placeholder="Kullanıcı Adı:" maxlength="16"disabled="true" onKeyUp="harfkontrol()"><br />
	        <input class="username" type="password" name="sifre" placeholder="Şifre:" maxlength="12"  disabled="true"><br />
	        <input class="username" type="password" name="sifretekrar" placeholder="Şifre Tekrar:" maxlength="12"  disabled="true"><br />
	        <input class="username" type="email" name="mail" placeholder="E-Posta:" maxlength="100" disabled="true"><br />
	        <input class="username" type="text" name="tel" placeholder="Telefon:" maxlength="10" disabled="true"><br />
	        <input id="dosya" type="file" name="dosya" disabled="true"><br />
	        <input name="check" style="-webkit-appearance:checkbox;
    -moz-appearance: checkbox;
    -o-appearance: checkbox;
    appearance: checkbox;width:10%;" type="checkbox" checked><span style="font-size:12px;color:white;margin-top:4%;width:80%;float:right;">BOZOKAESS tarafından haber bilgilendirme e-postaları almayı kabul ediyorum."</span>
	        <input class="sign-in animated bounceIn" type="submit" value="Kaydol" name="kaydol" disabled="true">
		</div>
		<?php
			session_start();
			include("baglan.php");
			@$kadi=$_POST["kadi"];
			@$adi=$_POST["adi"];
			@$sifre=$_POST["sifre"];
			@$mail=$_POST["mail"];
			@$tel=$_POST["tel"];
			@$dosyaturu=$_FILES["dosya"]["type"];
			@$geciciyol=$_FILES["dosya"]["tmp_name"];
			$dosyayolu="images/kullanici/$kadi";
			if(@$_POST["kaydol"]=="Kaydol")
			{
				if($sifre=="" or $_POST["sifretekrar"]=="" or $kadi=="" or $adi=="" or $mail=="" or $tel=="")
				{
					echo"<script>alert('Boş Alan Bırakmayınız!";
				}
				else
				{
					if($sifre!=$_POST["sifretekrar"])
					{
						echo"<script>alert('Şifreler Uyuşmuyor!');</script>";
					}
					else if(strlen($kadi)<5)
					{
						echo"<script>alert('Kullanıcı Adı Min. 5 Karakter Olmalı.');</script>";
					}
					else if(strlen(@$sifre)<8)
					{
						echo"<script>alert('Şifre 8-12 Karakter Olmalı.');</script>";
					}
					else if(($dosyaturu != "image/jpeg")
&& ($dosyaturu != "image/jpg")
&& ($dosyaturu != "image/png"))
					{
						echo"<script>alert('$dosyaturu');</script>";
					}
					else
					{
						$say=mysqli_fetch_array(mysqli_query($baglan,"select * from kullanici where k_adi='$kadi'"));
						$say2=mysqli_fetch_array(mysqli_query($baglan,"select * from kullanici where eposta='$mail'"));
						if($say)
							echo"<script>alert('Kullanıcı Adı Kullanılmakta');</script>";
						else if($say2)
							echo"<script>alert('E-posta Adresi Kullanılmakta');</script>";
						else
						{
							include("kontrol.php");
							$dogrulama=dogrulamametni();
							$ekle=mysqli_query($baglan,"insert into kullanici (isim,k_adi,k_sifre,eposta,telefon,durum,pp,dogrulama) values('$adi','$kadi','$sifre','$mail','$tel','üye','$dosyayolu.png','$dogrulama')");
							if($ekle)
							{
									
								echo("<script>alert('Kullanıcı Adınız:".$kadi."\nŞifreniz:".$sifre."');</script>");
								copy($geciciyol,$dosyayolu.".png");
								mail("yavuz@localhost.com","Hesap Doğrulama Kodu","AESS Hesap Doğrulama Kodunuz:$dogrulama","From:dogrulama@aess.com");
								if($_POST["check"]=="on")
								{
									$ekle=mysqli_query($baglan,"insert into haberbilgi (mail) values('$mail')");
								}
								header("location:dogrula.php?kadi=$kadi");
							}
							else
							{
								echo"<script>alert('Hata Oluştu!');</script>";
							}
						}
					}
				}
			}
			?>
		<script type="text/javascript">
							function harfkontrol()
							{
								var aranan=Array("ç","Ç","ğ","Ğ","ı","İ","ö","Ö","ş","Ş","ü","Ü"," ");
								var yerine=Array("c","C","g","G","i","I","o","O","s","S","u","U","_");
    							var str = document.getElementsByName("kadi")[0].value;
    							for(var i=0;i<aranan.length;i++)
    							{
    								str = str.replace(aranan[i],yerine[i]);
    							}
    							document.getElementsByName("kadi")[0].value = str;
							}
							$kadikontrol=0;
							$adikontrol=0;
							$sifrekontrol=0;
							$sifretekrarkontrol=0;
							$mailkontrol=0;
							$telkontrol=0;
							$dosyakontrol=0;
						var timer = setInterval(kontrol,10);
						function kontrol()
						{
							$kadi=16-document.getElementsByName("kadi")[0].value.length;
							$adi=10-document.getElementsByName("adi")[0].value.length;
							$sifre=12-document.getElementsByName("sifre")[0].value.length;
							$sifretekrar=12-document.getElementsByName("sifretekrar")[0].value.length;
							$posta=16-document.getElementsByName("mail")[0].value.length;
							$telefon=10-document.getElementsByName("tel")[0].value.length;
							$dosya=document.getElementsByName("dosya")[0].value;
							if($kadikontrol==1 &&$adikontrol==1 && $sifrekontrol==1 && $sifretekrarkontrol==1 && $mailkontrol==1 && $telkontrol==1 && $dosyakontrol==1)
							{
									document.getElementsByName("tel")[0].style.background = "#e2ffc1";
									document.getElementsByName("kaydol")[0].disabled=false;
									document.getElementsByName("kaydol")[0].style.background = "#0ea800";
							}
							else
							{
								document.getElementsByName("kaydol")[0].disabled=true;
								document.getElementsByName("kaydol")[0].style.background = "#cc3939";
							}
							if($adi<6)
							{
								$adikontrol=1;
								document.getElementsByName("adi")[0].style.background = "#e2ffc1";
								document.getElementsByName("kadi")[0].disabled=false;
								if($kadi<8)
								{
									$kadikontrol=1;
									document.getElementsByName("kadi")[0].style.background = "#e2ffc1";
									document.getElementsByName("sifre")[0].disabled=false;
									if($sifre<5)
									{
										$sifrekontrol=1;
										document.getElementsByName("sifre")[0].style.background = "#e2ffc1";
										document.getElementsByName("sifretekrar")[0].disabled=false;
										if($sifretekrar<5)
										{
											$sifretekrarkontrol=1;
											document.getElementsByName("sifretekrar")[0].style.background = "#e2ffc1";
											document.getElementsByName("mail")[0].disabled=false;
											if($posta<=0)
											{
												$mailkontrol=1;
												document.getElementsByName("mail")[0].style.background = "#e2ffc1";
												document.getElementsByName("tel")[0].disabled=false;
												if($telefon==0)
												{
													$telkontrol=1;
													document.getElementsByName("tel")[0].style.background = "#e2ffc1";
													document.getElementsByName("dosya")[0].disabled=false;
													if($dosya!="")
													{
														$dosyakontrol=1;
														document.getElementsByName("dosya")[0].style.background = "#e2ffc1";
														document.getElementsByName("kaydol")[0].disabled=false;

													}
													else
													{
														$dosyakontrol=0;
														document.getElementsByName("kaydol")[0].disabled=true;
														document.getElementsByName("dosya")[0].style.background = "#ffd1d1";;
														document.getElementsByName("kaydol")[0].style.background = "#cc3939";
													}
												}
												else
												{
													$telkontrol=0;
													document.getElementsByName("kaydol")[0].disabled=true;
													document.getElementsByName("tel")[0].style.background = "#ffd1d1";;
													document.getElementsByName("kaydol")[0].style.background = "#cc3939";
												}
											}
											else
											{
												$mailkontrol=0;
												document.getElementsByName("tel")[0].disabled=true;
												document.getElementsByName("mail")[0].style.background = "#ffd1d1";;
											}
										}
										else
										{
											$sifretekrarkontrol=0;
											document.getElementsByName("mail")[0].disabled=true;
											document.getElementsByName("sifretekrar")[0].style.background = "#ffd1d1";
										}
									}
									else
									{
										$sifrekontrol=0;
										document.getElementsByName("sifretekrar")[0].disabled=true;
										document.getElementsByName("sifre")[0].style.background = "#ffd1d1";
									}
								}
								else
								{
									$kadikontrol=0;
									document.getElementsByName("sifre")[0].disabled=true;
									document.getElementsByName("kadi")[0].style.background = "#ffd1d1";
								}
							}
							else
							{
								$adikontrol=0;
								document.getElementsByName("kadi")[0].disabled=true;
								document.getElementsByName("adi")[0].style.background = "#ffd1d1";
							}
						}
						</script>
    </form>
  </body>
</html>
