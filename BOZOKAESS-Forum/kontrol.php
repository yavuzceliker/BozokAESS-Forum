<?php
	function harfkontrol($veri,$veri2)
	{
		$aranan=Array("-","_","/","\\","\"","'","="," "," or "," and ","&&","||","==","===","!=","");
		if($veri2=="1")
			$aranan=Array("-","_","/","\\","\"","'","=",""," or "," and ","&&","||","==","===","!=","");
		$str = $veri;
    	for($i=0;$i<count($aranan);$i++)
    	{
    		$str=str_replace($aranan[$i],"",$str);
    	}
		return $str;
	}
	function dogrulamametni()
	{
		$harf= array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","r","s","t","u","v","w","x","y","z");
		$bharf= array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","R","S","T","U","V","W","X","Y","Z");
		$sayi=array("0","1","2","3","4","5","6","7","8","9");
		$metin="";
		for($i=0;$i<6;$i++)
		{
			$random=rand(0,2);
			if($random==0)
			{
				$random2=rand(0,23);
				$metin=$metin.$harf[$random2];
			}
			else if($random==1)
			{
				$random2=rand(0,23);
			    $metin=$metin.$bharf[$random2];
			}
			else
			{
				$random2=rand(0,9);
			    $metin=$metin.$sayi[$random2];
			}
		}
		return($metin);
	}
?>