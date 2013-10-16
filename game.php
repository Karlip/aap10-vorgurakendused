<!-- Test2 -->

<html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<head>
<title>Karli testleht</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<a href=http://www.vkhk.ee><img src=http://infokiosk.vkhk.ee/pildid/VKHK_LOGO3.jpg></a><p></br>Mängupõrgu</p>
<?php require("menu.html");?>
<p id="punkte">
Vajuta "Click Me" mängu alustamiseks.
<p id>
</p>
<script>
/*function hide()
{
	document.getElementById('nupp2').style.visibility = 'hidden';
	document.getElementById('nupp3').style.visibility = 'hidden';
}
hide();*/
var myVar=setInterval(function(){myTimer()},1000);
var automaatpts = 0;
var sekundit = 0;
var minutit = 0;
var punkte = 0;
var t1lvl1 = 10;
var lvl1done = 0;
var lvl2done = 0;
var t1lvl2 = 20;
var t1lvl3 = 30;
var t1lvl4 = 40;
var t2lvl1 = 50;
var t2lvl2 = 60;
var t2lvl3 = 70;
function myFunction()
{
	punkte++;
	document.getElementById("punkte").innerHTML=punkte;
	document.getElementById('nupp2').style.visibility = 'hidden';
	document.getElementById('nupp3').style.visibility = 'hidden';
	document.getElementById('nupp4').style.visibility = 'hidden';
	if(punkte==t1lvl1)
	{
		document.getElementById("punkte2").innerHTML="Palju õnne. " + punkte + " punkti olemas. (Tase 1 Level 2)";
	}
	if(punkte==t1lvl2)
	{
		document.getElementById("punkte2").innerHTML="Palju õnne " + punkte + " punkti olemas. Oota natuke veel.. (Tase 1 Level 2)";
	}
	if(punkte==t1lvl3)
	{
		document.getElementById("punkte2").innerHTML="Palju õnne. " + punkte + " punkti olemas. Osta end edasi? Maksab "+ punkte +" punkti!"; 
		document.getElementById("nupp").disabled=true; // Tõmbame "Click me" kinni
		document.getElementById("nupp2").disabled=false; // Valik: "Jah"
		document.getElementById('nupp2').style.visibility = 'visible'; // Valik "Jah" nähtav
	}
	if(punkte==t1lvl4)
	{
		document.getElementById("punkte2").innerHTML="Palju õnne. " + punkte + " punkti olemas. Tase 1 level 4 käes!"; 
		document.getElementById("nupp").disabled=false;
		document.getElementById("nupp2").disabled=true;
		document.getElementById('nupp2').style.visibility = 'hidden';
	}
	
}

function osa2() // Tase 2
{
	punkte=punkte+2;
	if(lvl1done==0)
	{
		lvl1done = 1;
		punkte = 0;
		document.getElementById("nupp").disabled=false;
		document.getElementById("nupp2").disabled=true;
		document.getElementById('nupp2').style.visibility = 'hidden';
		document.getElementById('nupp').style.visibility = 'hidden';
		document.getElementById('nupp4').style.visibility = 'visible';
	}
	document.getElementById("punkte").innerHTML=punkte;
	document.getElementById("punkte2").innerHTML="Palju õnne. " + punkte + " punkti olemas."; 
	if(punkte==t2lvl1)
	{
		document.getElementById("punkte2").innerHTML="Palju õnne. " + punkte + " punkti olemas. Tase 2 Level 1 käes!";
	}
	if(punkte==t2lvl2)
	{
		document.getElementById("punkte2").innerHTML="Palju õnne. " + punkte + " punkti olemas. Tase 2 Level 2 käes!";
	}
	if(punkte==t2lvl3)
	{
		document.getElementById("punkte2").innerHTML="Palju õnne. " + punkte + " punkti olemas. Tase 2 Level 3 käes! Osta automaatpunktid? Maksab "+punkte+" punkti!";
		document.getElementById("nupp4").disabled=true; // Tõmbame "Topeltpunktid" kinni
		document.getElementById("nupp3").disabled=false; // Valik: "Jah"
		document.getElementById('nupp3').style.visibility = 'visible'; // Valik "Jah" nähtav
	}
}

function osa3() // Tase 3 - Automaatpunktid
{
	if(lvl2done==0)
	{
		automaatpts=1;
		punkte = 0;
		document.getElementById("nupp3").disabled=true;
		document.getElementById('punkte2').style.visibility = 'hidden';
		document.getElementById('nupp3').style.visibility = 'hidden';
		document.getElementById('nupp4').style.visibility = 'hidden';
	}
}

function myTimer()
{
	sekundit=sekundit+1;
	//location.reload(true);
	if(sekundit==60)
	{
		sekundit=0;
		minutit=minutit+1;
	}
	if(automaatpts==1)
	{
		punkte=punkte+1;
		document.getElementById("punkte").innerHTML = punkte;
	}
}	

</script>
<button type="button" id="nupp" onclick="myFunction()">Punkte!</button>
<button type="button" id="nupp4" onclick="osa2()">Topeltpunkte!</button>
<p id="punkte2">
Üllatus hiljem..
</br>Hoiatus: Kui aken suletakse või Refreshitakse, siis tehtu kaob.
<p id>
<button type="button" id="nupp2" disabled=true onclick="osa2()">Jah</button>
<button type="button" id="nupp3" disabled=true onclick="osa3()">Jah</button>
</body>
</html>

<! -- LÕPUVÄRK
document.getElementById("punkte2").innerHTML="Palju õnne. " + punkte + " punkti olemas. Oled mängu lõpus! Aega võttis mäng sul " + minutit + " minutit ja "+ sekundit+" sekundit.";
		
document.getElementById("nupp4").disabled=true; // Tõmbame "Punktinupu"
>

