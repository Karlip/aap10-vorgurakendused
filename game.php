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
<?php require("menu.html");?> <! MENÜÜ >
<p id="punkte"> Vajuta "Punkte!" mängu alustamiseks. <p id> </p>

<script>

/* =============- VKHKQuest -=========== 

Tere tulemast. Niiet siis mäng, kus saab areneda saades järjest enam punkte. 

* Tase 1: Punkte tuleb ainult klikates. Kordajat pole.
* Tase 2: Punkte tuleb ainult klikates. Kordaja on, saab kaks punkti klikilt.
* Tase 3: Punkte tuleb automaatselt, 1 sekundis. Kordajat pole.
* Tase 4: Punkte tuleb automaatselt, 1 sekundis. Kordaja on, saab kaks punkti sekundis.
* Tase 5: Punktikordaja lõpp. Mängu jutu algus. Mängija ostab mõõga. Ja sealt edasi.

Ehitus:

-> Varem: Algus.
----> Nagu näha, siis script on VÄGA algeline ning kõik on ühes padas koos. Kahjuks praegu ei oska paremat viisi teha.

-> 24. Oktoober: Parandatud topelt-automaatpunktid
----> Lisatud kaks mõõka. BFG ja üks teine keerulise nimega..
----> Jutustuse algus. Punktide dünaamiline kadu, pidev juurdetulek.
------> Dünaamiline kadu: Mängija ostab asju, kaotab punkte. 
------> Pidev juurdetulek: Alates topelt-automaatpunktidest, punkte enam kiiremini ei saa. Võib-olla tulevikus teenib neid võistlustelt.



*/

var myVar=setInterval(function(){myTimer()},1000);

/* =============- Muutujad -=========== */

var pause = 0;
var automaatpts = 0;
var automaatptsx2 = 0;
var sekundit = 0;
var minutit = 0;
var punkte = 0;
var mook = 0;

/* =============- Tasemete läbimise kontroll. 1 = Läbitud -=========== */

var lvl1done = 0;
var lvl2done = 0;
var lvl3done = 0;
var lvl4done = 0;

/* =============- Tasemed -=========== */

var t1lvl1 = 10;
var t1lvl2 = 11;
var t1lvl3 = 12;
var t1lvl4 = 13;
var t2lvl1 = 14;
var t2lvl2 = 15;
var t2lvl3 = 16;
var t3lvl1 = 17;
var t4lvl1 = 18;


function osa1()
{
	punkte++; // Punkte jookseb iga kliki pealt.
	document.getElementById("punkte").innerHTML=punkte; // Paneme tekstile väärtuse, ehk näitame mängijale tema punkte
	/* Peidame nupud ja mõned tekstid ära. Igaks juhuks. CSS-is juba tehtud. */
	document.getElementById('nupp4').style.visibility = 'hidden';
	document.getElementById('nupp6').style.visibility = 'hidden';
	document.getElementById('nupp7').style.visibility = 'hidden';
	document.getElementById('nupp2').style.visibility = 'hidden';
	document.getElementById('nupp3').style.visibility = 'hidden';
	document.getElementById('abitekst').style.visibility = 'hidden';
	document.getElementById('mook_1').style.visibility = 'hidden';
	document.getElementById('mook_2').style.visibility = 'hidden';
	/* Kontrollime punkte ja anname vastavalt teateid ja nuppe. */
	if(punkte==t1lvl1) document.getElementById("punkte2").innerHTML="Palju õnne. " + punkte + " punkti olemas. (Tase 1 Level 2)";
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
		document.getElementById("tase").innerHTML="------------------------------------------------------------ <br> Sinu tase: 2";
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
		automaatpts = 1;
		punkte = 0;
		lvl2done = 1;
		document.getElementById("nupp3").disabled = true;
		document.getElementById('punkte2').style.visibility = 'hidden';
		document.getElementById('nupp3').style.visibility = 'hidden';
		document.getElementById('nupp4').style.visibility = 'hidden';
		document.getElementById("tase").innerHTML="------------------------------------------------------------ <br> Sinu tase: 3";
	}
	if(punkte==t3lvl1)
	{
		pause = 1;
		//document.Write("Palju õnne. " + punkte + " punkti olemas. Tase 3 Level 1 käes! Osta topelt-automaatpunktid? Maksab "+punkte+" punkti!");
		document.getElementById("nupp6").disabled=false; // Valik: "Jah"
		document.getElementById('nupp6').style.visibility = 'visible'; // Valik "Jah" nähtav	
		document.getElementById('abitekst').style.visibility = 'visible';
	}
}

function osa4() // Tase 4 - TopeltTätte-Automaatpunktid
{
	document.getElementById("tase").innerHTML="------------------------------------------------------------ <br> Sinu tase: 4";
	if(lvl3done==0)
	{
		automaatpts = 0;
		automaatptsx2 = 1;
		punkte = 0;
		pause = 0;
		lvl3done = 1;
		document.getElementById("nupp6").disabled = true;
		document.getElementById('abitekst').style.visibility = 'hidden';
		document.getElementById('nupp3').style.visibility = 'hidden';
		document.getElementById('nupp6').style.visibility = 'hidden';
	}
	if(punkte==t4lvl1)
	{
		pause = 1;
		document.getElementById("abitekst").innerHTML="Nüüd on sinu võimalus. Sa saad mõõga, aga seda puudutades kaovad su punktid.";
		document.getElementById("nupp7").disabled=false; // Valik: "Jah"
		document.getElementById('nupp7').style.visibility = 'visible'; // Valik "Jah" nähtav	
		document.getElementById('abitekst').style.visibility = 'visible';
	}
}

function osa5() // Tase 5 - Mõõgasupp
{
	if(lvl4done==0)
	{
		lvl4done = 1;
		automaatptsx2 = 0;
		automaatptsx2t3 = 1;
		pause = 0; // PUNKTID JOOKSEVAD
		punkte = 0;
		mook = 1;
		document.getElementById("tase").innerHTML="------------------------------------------------------------ <br> Sinu tase: Punktiuuenduste Lõpp - Jutu algus";
		document.getElementById("nupp7").disabled=true; // Valik: "Jah"
		document.getElementById('nupp7').style.visibility = 'hidden'; // Valik "Jah" nähtav	
		document.getElementById('abitekst').style.visibility = 'hidden';
		document.getElementById("mook_1").style.visibility = 'visible';
	}
	if(punkte >= 200)
	{
		if(mook == 1)
		{
			document.getElementById("abitekst").innerHTML="Sul on nüüd valik osta uus mõõk. Maksab 200 punkti.";
			document.getElementById('abitekst').style.visibility = 'visible';
			document.getElementById("nupp8").disabled=false; // Valik: "Jah"
			document.getElementById('nupp8').style.visibility = 'visible'; // Valik "Jah" nähtav
		}	
	}
}


function myTimer()
{
	sekundit=sekundit+1;

	if(sekundit==60)
	{
		sekundit=0;
		minutit=minutit+1;
	}
	if(pause == 0)
	{
		if(automaatpts==1)
		{
			osa3();
			punkte=punkte+1;
			document.getElementById("punkte").innerHTML = punkte;
		}
		if(automaatptsx2==1)
		{
			osa4();
			punkte=punkte+2;
			document.getElementById("punkte").innerHTML = punkte;
		}
		if(automaatptsx2t3==1)
		{
			osa5();
			punkte=punkte+2;
			document.getElementById("punkte").innerHTML = punkte;
		}
	}
}	
	
function mook_uuendus()
{
	if(mook == 1)
	{
		if(punkte >= 200)
		{
			document.getElementById("nupp8").disabled=true; // Valik: "Jah" kinni
			document.getElementById('nupp8').style.visibility = 'hidden'; // Valik "Jah" peidetud	
			document.getElementById('abitekst').style.visibility = 'hidden';
			document.getElementById("mook_1").style.visibility = 'hidden';
			document.getElementById("mook_2").style.visibility = 'visible';
			punkte=punkte-200;
			mook = 2;
		}
	}
}

</script>

<! --------------------------------- NUPUD - samuti muuta ka css-is(!) ------------------------------------------>

<button type="button" id="nupp" onclick="osa1()">Punkte!</button>
<button type="button" id="nupp2" disabled=true onclick="osa2()">Jah</button>
<button type="button" id="nupp3" disabled=true onclick="osa3()">Jah</button>
<button type="button" id="nupp4" onclick="osa2()">Topeltpunkte!</button>
<button type="button" id="nupp6" disabled=true onclick="osa4()">Jah</button>
<button type="button" id="nupp7" disabled=true onclick="osa5()">Jah</button>
<button type="button" id="nupp8" disabled=true onclick="mook_uuendus()">Jah</button>

<p id="punkte2"> Üllatus hiljem.. </br>Hoiatus: Kui aken suletakse või Refreshitakse, siis tehtu kaob. <p id>
<p id="abitekst"> Oled valmis topelt-automaatpunktideks? <p id>

<footer>
<p id="tase"> ------------------------------------------------------------ <br>Sinu tase: 1 <p id>



<! ------------------------------------------ SWORDS ----------------------------------------------------->



<p id="mook_1"> <! BFG 9000 >
<table>
<tr><td valign="top" style="text-align:center;">
Mõõk: BFG 9000
</tr></td><tr>
<td valign="top" style="text-align:left;">	    
        <pre>      /| ________________
O|===|* &gt;________________&gt;
      \|
</pre>
</td></tr>
</table>


<p id><p id="mook_2"> <! Ultra Killer Sniper Shooter 2: Ghosts 3: Day 2 DLC >
<table>
<tr>
<td valign="top" style="text-align:center;">
Mõõk: Ultra Killer Sniper Shooter 2: Ghosts 3: Day 2 DLC
</tr>
</td>
<td valign="top" style="text-align:left;">	    
        <pre>           /\
 _         )( ______________________
(_)///////(**)______________________&gt;
           )(
           \/</pre></td>
</table>
<p id>


</footer>

</body>
</html>

<! -- LÕPUVÄRK
document.getElementById("punkte2").innerHTML="Palju õnne. " + punkte + " punkti olemas. Oled mängu lõpus! Aega võttis mäng sul " + minutit + " minutit ja "+ sekundit+" sekundit.";
		
document.getElementById("nupp4").disabled=true; // Tõmbame "Punktinupu"
>

