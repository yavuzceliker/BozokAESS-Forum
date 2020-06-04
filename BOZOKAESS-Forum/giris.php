<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Forum Giriş</title>
      <link rel="stylesheet" href="css/giris.css">
</head>
<body>
    <form method="post">
		<div id="container" class="form-container">
			<div class="logo">
				<img src="images/elements/giris.png" width="80px" height="43px"> </img>
            </div>
			<h1>Forum Giriş</h1>
	        <input class="username" type="text" name="username" placeholder="Kullanıcı Adı"><br />
	        <input class="password" type="password" name="password" input="password" placeholder="Şifre"><br />
	        <input class="sign-in animated bounceIn" type="submit" name="giris" value="Giriş">
			<div id="login-problem" class="log-problem">
				<p><a href="sifreyenile.php">Kullanıcı adını veya şifreni mi unuttun?</a></p>
				<p><a href="kayit.php">Henüz üye değil misin?</a></p>
			</div>
		</div>
   	<?php
		session_start();
		include("baglan.php");
		if(@$_POST["giris"]=="Giriş")
		{
			$kadi=$_POST["username"];
			$pw=$_POST["password"];
			$girisquery=mysqli_query($baglan,"select * from kullanici");
			$giriskontrol=0;
			while($kontrol=mysqli_fetch_array($girisquery))
			{
				if($kontrol["k_adi"]==$kadi && $kontrol["k_sifre"]==$pw)
				{
					$_SESSION["kadi"]=$kadi;
					$giriskontrol=1;
					if($kontrol[8]!="Doğrulandı")
					{
						header("location:dogrula.php?kadi=$kontrol[2]");
					}
					else
					{
						
						if($kontrol["durum"]=="admin")
							header("location:a-aess2.php");
						else
							header("location:forum.php");
					}
				}
			}
			if($giriskontrol==0)
			{
				echo"<script>alert('Kullanıcı Adı veya Şifre Yanlış!');</script>";
			}
		}
	?>
    </form>
  </body>
</html>
