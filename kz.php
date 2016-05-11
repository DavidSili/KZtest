<?php include 'connect.php'; ?>
<html>
<head profile="http://www.w3.org/2005/20/profile">
<link rel="icon"
	  type="image/png"
	  href="favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title id="Timerhead">Klub zdravlja | Test</title>
<link type='text/css' rel='stylesheet' href='style.css' />
<script language="javascript" type="text/javascript">
var Timer;
var TotalSeconds;


function CreateTimer(TimerID, Time) {
    Timer = document.getElementById(TimerID);
    TotalSeconds = Time;
    
    UpdateTimer()
    window.setTimeout("Tick()", 1000);
}

function Tick() {
    if (TotalSeconds <= 0) {
        alert("Vreme je isteklo!")
        return;
    }

    TotalSeconds -= 1;
    UpdateTimer()
    window.setTimeout("Tick()", 1000);
}

function UpdateTimer() {
    var Seconds = TotalSeconds;
    
    var Minutes = Math.floor(Seconds / 60);
    Seconds -= Minutes * (60);


    var TimeStr = LeadingZero(Minutes) + ":" + LeadingZero(Seconds)

    Timer.innerHTML = "preostalo je još: " + TimeStr;
    Timerhead.innerHTML = "Test: " + TimeStr;
}

function LeadingZero(Time) {

    return (Time < 10) ? "0" + Time : + Time;

}
</script>
</head>
<body>
<?php
$ip=$_SERVER['REMOTE_ADDR'];
$rtime=$_SERVER['REQUEST_TIME'];
$rtime1=date('G:i:s',$rtime);
$rtime2=date('d.m.Y.',$rtime);
$seed="jdsibh31123hm7l5vn99urkt675fp4l1c9gu3rh8dj3cfnzavzjirio2n7r8p3k5ivh661ba61e3l5lc05an4703m2us6u144hv9k3i00a7k8dma15donm7v1pbcukoz1zn8e154rfa36i5452tlo3enmc6o18snaat3lr4rmhrdfjupjpne6a4cptb1gmbazgdr9gddvemj6g4beev5ve4u88u5c27r1jad835sj9zl80lomvhl4eg02fs6k9e7ehjtig87jujjkvi30bg3ka9i9i629b3e8b080rldzejdeft99jtbh3dnrisp9a2hc3aeb1ggotz5kthakojhpmvnodudj6dhvknir3met6nm76j8bomie7rk46bubt5ds4ghl100cbs55a22el6ffi4dpo7aff955dlctr910cbeebrnvd19trn3s9cizvnork74fgiiha8l4910p38ulvoiajvms0j9sm4ne30264fn62hm1irfrv6z5stm4gsk0lc7pgbc7p4ljmf1kvptaru9av7jnjes3f2hfrrjia4fd8p7j8568h3cuutbmiez873oi1llaog6jke8vbsag6idspvz3dpzpofs23skf29o6ug6mczc6lfa6gcfr5hrm80st1efz8c743uzp9e072o4t57svnlizhem4rc6s9tgc4nl9203j0cnvjc5e757lozdmgno57om31u75lgncdd9czv9ah1mmrt1k3e8oz1o5pekb749gdpl87u9ho824o6gzggiokkniecvvi3m20ivda856ss0ujrsmrzo67khczl4vsdzv2n310uu6rsd30s3p1psuj18icb60z558l84v6zhhl7cjt96931r3uop4lc41186t6519td20cv9ha2541jli3t92rru5tm4uhcozg8ddz21rl71arhbe5dibrkijlht0p2d2zdludhkfsontgtvn20o2np5f0ph3u3vfbzrood4hvlas3idbshr4gbimrc38uebaiur1zkfvtvp7glnbg6oh69s07bfop8jgl8mk39nnnj5up5vo36jami20emplhbo3luek28sudkc1zv2gfh0g494kjdvv6tp2g131tjre12ff261kp0s3c02bjgzilplb9ejojbmbere0znr6vd01hnrfgztj22e2s9zs7eelpz0gpmh21ukaiggv9rl10m45be8blv2azg24f150upr1fm3pu2bpdmkim1b81phb3dk32nivn3t399f2dktvd41cvvcf82up1m4dfruvcmrfu6pkrj0f0s0j2994al6irce5p95aumk0efzj3zic21e6";
$d=date('d',time());
$m=date('n',time());
$y=date('Y',time());
$pos1=($y*$d-($d^$m)+$d)%1337;
$pos2=(($y*$d-($d^$m)+$d)*$m)%1337;
$pas=substr($seed,$pos1,4).substr($seed,$pos2,4);
echo $pas;

if(isset($_POST['stps'])) $sitepos=$_POST['stps'];
else $sitepos=0;
if(isset($_POST['greska'])) $greska=$_POST['greska'];
else $greska=0;
if(isset($_POST['sifra'])) $sfr=$_POST['sifra'];
else $sfr=0;
if(isset($_POST['bio'])) $bio=$_POST['bio'];
else $bio=0;
if(isset($_POST['grace'])) $grace=$_POST['grace'];
else $grace=0;
if(isset($_POST['ime'])) $ime=$_POST['ime'];
else $ime="";
if(isset($_POST['tel'])) $tel=$_POST['tel'];
else $tel="";
if(isset($_POST['email'])) $email=$_POST['email'];
else $email="";
if(isset($_POST['adr'])) $adr=$_POST['adr'];
else $adr="";

$flagy=0;
$flagz=0;
$sql ='SELECT flag FROM flags WHERE `ime`="'.$ime.'" ORDER BY `timestamp` DESC LIMIT 1';
$result = mysqli_query($mysqli,$sql)or die(mysqli_error().' - '.$sql);
$row = $result->fetch_assoc();
$flagy=$row['flag'];
$sql ='SELECT flag FROM flags WHERE `IP`="'.$ip.'" ORDER BY `timestamp` DESC LIMIT 1';
$result = mysqli_query($mysqli,$sql)or die(mysqli_error().' - '.$sql);
$row = $result->fetch_assoc();
$flagz=$row['flag'];
if ($flagy==1 OR $flagy==3 OR $flagz==1) $sitepos=-1;

if ($sitepos==-1) {
?>
	<div style="position:relative;margin:100px auto;width:430px;height:220px;background:#003366;padding:10px 20px;color:#FFFFFF">
		<div style="text-align:center;width:430px"><h3>Pristup testu vam je zabranjen.<br/>Za više informacija kontaktirajte administratora testa</h3></div>
	</div>
<?php
}


if($sitepos==2 AND $ime=="") $sitepos=1;
if ($sitepos==1 AND $bio>0 AND $bio<6 AND ($sfr!=$pas)) $sitepos=0;

if ($sitepos==1) $greska=0;
if ($sitepos==0) $greska=$bio;
		
$preostalo=5-$bio;

if ($sitepos==0 AND $bio==0) {
?>
	<div style="position:relative;margin:100px auto;width:430px;height:220px;background:#003366;padding:10px 20px;color:#FFFFFF">
		<div style="text-align:center;width:430px"><h3>Dobrodošli na test za instruktora zdravlja</h3></div>
		<div style="text-align:center;width:430px">Da bi ste nastavili dalje, unesite lozinku koju ste dobili za pristup testu</div><br/>
		<form name="sif" method="POST" action="kz.php">
			<div style="text-align:center;width:430px"><input type="text" style="width:150px;font-size:20pt;font-weight:bold;color:#003366;text-align:center" name="sifra" /></div>
			<input type="hidden" name="bio" value="1"/>
			<input type="hidden" name="stps" value="1"/>
			<div style="text-align:center;width:430px"><input type="submit" value="unesi" style="margin-top:10px"/></div>
		</form>
	</div>
<?php
}

if ($sitepos==0 AND $bio>0) {
?>
	<div style="position:relative;margin:100px auto;width:430px;height:220px;background:#003366;padding:10px 20px;color:#FFFFFF">
		<div style="text-align:center;width:430px"><h3>Dobrodošli na test za instruktora zdravlja</h3></div>
		<div style="text-align:center;width:430px"><?php if ($preostalo!=0) echo 'Pogrešno ste uneli lozinku, molimo vas ponovo je unesite'; ?></div><br/>
		<form name="sif" method="POST" action="kz.php">
			<div style="text-align:center;width:430px"><input type="text" style="width:150px;font-size:20pt;font-weight:bold;color:#003366;text-align:center" name="sifra" <?php if ($preostalo==0) echo 'disabled="disabled"' ?>/></div>
			<input type="hidden" name="bio" value="<?php echo $bio+1; ?>"/>
			<input type="hidden" name="stps" value="1"/>
			<div style="text-align:center;width:430px"><input type="submit" value="unesi" style="margin-top:10px"/></div>
		</form>
		<?php if ($bio==3) echo '<div style="text-align:center;width:430px;color:#FFBBBB">Imate još dva pokušaja</div>';
		elseif ($bio==4) echo '<div style="text-align:center;width:430px;color:#FFBBBB">Imate još jedan pokušaj</div>';?>
		<?php if ($preostalo==0) echo '<div style="text-align:center;width:430px;color:#FFBBBB">Pet puta ste pogrešno uneli lozinku, kontaktirajte osobu zaduženu za ispit</div>'; ?>
	</div>
<?php
}
if ($sitepos==1) {
?>

<div id="wrapper">
	<div style="position:relative;margin:10px auto;width:600px;height:500px;background:#003366;padding:10px 20px;color:#FFFFFF">
		<h2 style="text-align:center">Uputstva</h2>
		<p>Pellentesque non malesuada lorem. Etiam urna nisl, scelerisque sed tempus quis, viverra sed eros. Morbi in sem porttitor felis interdum posuere. Suspendisse blandit accumsan fermentum. Vivamus quis neque eget odio interdum tincidunt at sed ante. Morbi eget nulla sit amet velit porta rhoncus. Curabitur eget leo mi, sit amet blandit risus. Fusce ultrices augue sed massa aliquam et consectetur lorem pharetra. Fusce eleifend tellus vel augue molestie sodales. Aliquam erat volutpat. Fusce commodo ultrices augue, eu posuere sem varius vitae. Nunc euismod ante a quam ultricies pharetra. Nulla sed tortor eu ante ornare vehicula. Nullam ut lectus ac quam adipiscing faucibus vitae eget eros. Sed eros felis, ultricies id iaculis id, facilisis et mi.</p>
		<form name="pretest" method="POST" action="kz.php">
			<div style="width:600px;height:110px">
				<div style="float:left;width:130px;height:110px;margin-right:10px;text-align:right;line-height:26px">
					* Ime i prezime<br/>
					Telefon<br/>
					e-mail<br/>
					adresa<br/>
				</div>
				<div style="float:left;width:250px;height:110px">
					<input type="text" name="ime" title="obavezno polje" style="margin-bottom:6px"/><br/>
					<input type="text" name="tel" style="margin-bottom:6px" value="<?php echo $tel ?>" /><br/>
					<input type="text" name="email" style="margin-bottom:6px" value="<?php echo $email ?>" /><br/>
					<input type="text" name="adr" value="<?php echo $adr ?>" /><br/>
				</div>
			</div>
			<span style="font-size:10px;float:right">* obavezno polje</span>
			<input type="submit" value="počni test" style="margin:20px 0 0 200px;width:200px" />
			<input type="hidden" name="stps" value="2" />
			<input type="hidden" name="ip" value="<?php echo $ip ?>" />
			<input type="hidden" name="rtime" value="<?php echo $rtime ?>" />
		</form>
	</div>
</div>
<?php
}
if ($sitepos==4) {
	$counterok=0;
	for ($i = 1; $i <= 5; $i++) {

		$ID=$_POST['ID'.$i];
		$odgovor=$_POST['odgovor'.$i];
		$odgovora=$_POST['odgovora'.$i];
		$tacnih=$_POST['tacnih'.$i];
		$resenje=$_POST['resenje'.$i];
		$res=$resenje;
		$redosled=unserialize($_POST['redosled'.$i]);
		$odgovori=explode(" $##$ ",$odgovor);
		$resenje=explode(",",$resenje);
		
		if ($odgovora==1) $odg=$_POST['o'.$i];
		elseif ($odgovora>1) {
			if ($tacnih==1) {
				if (isset($_POST['o'.$i])) $odg=$_POST['o'.$i];
					else $odg=0;
			}
			if ($tacnih>1) {
				$odg="";
				sort($redosled);
				foreach ($redosled as $ii) {
					if (isset($_POST['o'.$i.'-'.$ii])) $xodg=$_POST['o'.$i.'-'.$ii];
						else $xodg=0;
					if ($xodg==1) {
					$odg.=$ii.',';
					}

				}
				$odg=substr($odg, 0, -1);
			}
		}
		elseif ($odgovora==0) {
			$odg="";
			for ($ii=1;$ii<=$tacnih;$ii++) {
				if (isset($_POST['o'.$i.'-'.$ii])) $xodg=$_POST['o'.$i.'-'.$ii];
					else $xodg="";
				$odg.=$xodg.',';
			}
			$odg=substr($odg, 0, -1);
			
		}
		${'tac'.$i}=0;
		if ($odgovora==1) {
			if (in_array($odg,$resenje)) {
			$counterok++;
			${'tac'.$i}=1;
			}
		}
		elseif ($odgovora>1 OR $odgovora==0) {
			if ($res==$odg) {
			$counterok++;
			${'tac'.$i}=1;
			}
		}
		
	}
	$procenat=$counterok/5;
	if ($procenat<0.9) $greska++;

echo '<div id="header">';
if ($procenat<0.9 AND $greska<3) {
	echo '<form method="POST" action="kz.php" style="float:left;width:100px">';
		echo '<input type="hidden" name="stps" value="2" />';
		echo '<input type="hidden" name="greska" value="'.$greska.'" />';
		echo '<input type="hidden" name="ime" value="'.$ime.'"/>';
		echo '<input type="hidden" name="tel" value="'.$tel.'" />';
		echo '<input type="hidden" name="email" value="'.$email.'" />';
		echo '<input type="hidden" name="adr" value="'.$adr.'" />';
		echo '<input type="hidden" name="ip" value="'.$ip.'" />';
		echo '<input type="submit" value="Ponovi test" style="float:left;margin:10px 0 10px 20px;width:200px">';
	echo '</form>';
}
if ($procenat==0.8 AND $greska==3) {
	echo '<form method="POST" action="kz.php" style="float:left;width:100px">';
		echo '<input type="hidden" name="stps" value="3" />';
		echo '<input type="hidden" name="greska" value="'.$greska.'" />';
		echo '<input type="hidden" name="ime" value="'.$ime.'"/>';
		echo '<input type="hidden" name="tel" value="'.$tel.'" />';
		echo '<input type="hidden" name="email" value="'.$email.'" />';
		echo '<input type="hidden" name="adr" value="'.$adr.'" />';
		echo '<input type="hidden" name="ip" value="'.$ip.'" />';
		echo '<input type="submit" value="Poslednja šansa" style="float:left;margin:10px 0 10px 20px;width:200px">';
	echo '</form>';
}

	echo '<div id="timer" style="float:right;color:#FFFFFF;font-size:16pt;font-weight:bold;margin:10px">Procenat tačnih odgovora je: '.$procenat*'100'.'%';
			if ($procenat<0.8 AND $greska==1) echo ' a potrebno je 45 pitanja za prolaz. Možete da ponovite test još dva puta';
			if ($procenat<0.8 AND $greska==2) echo ' a potrebno je 45 pitanja za prolaz. Možete da ponovite test još jednom';
			if ($procenat<0.8 AND $greska==3) echo ' - Žao nam je ali na sva tri testa niste prošli.';
			if ($procenat==0.8 AND $greska==3) echo ' Imate poslednju šansu.';
			if ($procenat>=0.9) echo ' Čestitamo vam, prošli ste test.';

?>
	</div>
</div>
<div>Legenda: <span style="color:#0000FF">Tačan odgovor </span> - <span style="color:#FF0000">Pogrešan odgovor </span> - <span style="color:#009900">Tačan odgovor koji niste otkačili </span></div>
<?php
$araya=array();
	
	for ($i = 1; $i <= 5; $i++) {

		$ID=$_POST['ID'.$i];
		$pitanje=$_POST['pitanje'.$i];
		$odgovor=$_POST['odgovor'.$i];
		$odgovora=$_POST['odgovora'.$i];
		$tacnih=$_POST['tacnih'.$i];
		$resenje=$_POST['resenje'.$i];
		$res=$resenje;
		$redosled=unserialize($_POST['redosled'.$i]);
		$odgovori=explode(" $##$ ",$odgovor);
		$resenje=explode(",",$resenje);
$oi=$i-1;
array_push($araya,array($ID,$pitanje,$odgovor,$odgovora,$tacnih,$res,array()));
		
		echo '<div>';
		
		$ocount=0;
				
		if ($odgovora!=0) {
			echo '<div style="font-weight:bold;font-size:16pt;color:#000000;padding:10px 5px 5px 5px">';
			if (${'tac'.$i}==1) echo '<span style="color:#0000FF">'.$i.'. </span>';
				else echo '<span style="color:#FF0000">'.$i.'. </span>';
			echo $pitanje.'</div>';
			}
			else {
				echo '<div style="font-weight:bold;padding:10px 5px 5px 5px;color:#000000;font-size:16pt">';
				if (${'tac'.$i}==1) echo '<span style="color:#0000FF">'.$i.'. </span>';
					else echo '<span style="color:#FF0000">'.$i.'. </span>';
				$pit=explode("$#$",$pitanje);
				$ii=1;
				if ($pit[0]!="") echo $pit[0];
				while ($ii<=$tacnih) {
					$xii=$ii-1;
					if ($_POST['o'.$i.'-'.$ii]==$resenje[$xii]) echo '<span style="color:#0000FF">'.$_POST['o'.$i.'-'.$ii].'</span>';
						else {
						echo '<span style="color:#FF0000;text-decoration:line-through">'.$_POST['o'.$i.'-'.$ii].'</span> <span style="color:#009900">'.$resenje[$xii].'</span>';
						}
					echo $pit[$ii];
					$ii++;
				}
				echo '</div>';
				
			}

		if ($odgovora>1) {
		
			if ($tacnih==1) {
			
				if (isset($_POST['o'.$i])) {
					$odg=$_POST['o'.$i];
					array_push($araya[$oi][6],$odg);
					}
					else $odg=0;
				if ($res==$odg) {
					$counterok++;
				
					foreach ($redosled as $ii) {
						$xii=$ii-1;
						if ($ocount%"2" == "1") $bgnd='FFFFFF';
							else $bgnd='DDDDDD';
						echo '<div style="margin:0 0 5px 20px;padding:0 3px;font-size:16;color:#000000;background:#'.$bgnd.'"><input type="radio" name="o'.$i.'" value="'.$ii.'" style="margin-right:7px" ';
						if ($odg==$ii) echo 'checked';
						echo '/><span';
						if ($odg==$ii) echo ' style="color:#0000FF"';
						echo '>'.$odgovori[$xii].'</span></div>';
						$ocount++;

					}
				
				}
				else {
				
					foreach ($redosled as $ii) {
						$xii=$ii-1;
						if ($ocount%"2" == "1") $bgnd='FFFFFF';
							else $bgnd='DDDDDD';
						echo '<div style="margin:0 0 5px 20px;padding:0 3px;background:#'.$bgnd.'"><input type="radio" name="o'.$i.'" value="'.$ii.'" style="margin-right:7px" ';
						if ($odg==$ii) echo 'checked';
						echo '/><span style="color:#';
						if ($odg==$ii) echo 'FF0000';
						if ($res==$ii) echo '009900';
						echo '">'.$odgovori[$xii].'</span></div>';
						$ocount++;
						
					}
				
				}
			
			}
			else {
				$odg="";
				$countx=0;
				foreach ($redosled as $ii) {
					if (isset($_POST['o'.$i.'-'.$ii])) {
						$xodg=$_POST['o'.$i.'-'.$ii];
							array_push($araya[$oi][6],$redosled[$countx]);
						}
						else $xodg=0;
					if ($xodg==1) {
					$odg.=$ii.',';
					}
				$countx++;
				}
				$odg=substr($odg, 0, -1);
				$yodg=explode(",",$odg);
				if ($res==$odg) {
					$counterok++;
				
					foreach ($redosled as $ii) {
						$xii=$ii-1;
						if ($ocount%"2" == "1") $bgnd='FFFFFF';
							else $bgnd='DDDDDD';
						echo '<div style="margin:0 0 5px 20px;padding:0 3px;background:#'.$bgnd.'"><input type="checkbox" name="o'.$i.'" value="'.$ii.'" style="margin-right:7px" ';
						if (in_array($ii,$resenje)) echo 'checked';
						echo '/><span';
						if (in_array($ii,$resenje)) echo ' style="color:#0000FF"';
						echo '>'.$odgovori[$xii].'</span></div>';
						$ocount++;
						
					}
				
				}
				else {
				
					foreach ($redosled as $ii) {
						$xii=$ii-1;
						if ($ocount%"2" == "1") $bgnd='FFFFFF';
							else $bgnd='DDDDDD';
						echo '<div style="margin:0 0 5px 20px;padding:0 3px;background:#'.$bgnd.'"><input type="checkbox" name="o'.$i.'" value="'.$ii.'" style="margin-right:7px" ';
						if (in_array($ii,$yodg)) echo 'checked';
						echo '/><span style="color:#';
						if (in_array($ii,$yodg)) {

							if (in_array($ii,$resenje)) echo '0000FF';
								else echo 'FF0000';
							
						}
						elseif (in_array($ii,$resenje)) {

							if (in_array($ii,$yodg)!=true) echo '009900';

						}
						echo '">'.$odgovori[$xii].'</span></div>';
						$ocount++;
						
					}
				
					
				}
				
			}
		
		}
		elseif ($odgovora==1) {
		
			if (isset($_POST['o'.$i])) {
				$odg=$_POST['o'.$i];
					array_push($araya[$oi][6],$odg);
				}
				else $odg=0;
				
				if (in_array($odg,$resenje)) {
				
					$counterok++;
					echo '<span style="color:#0000FF;margin-left:20px">'.$odg.'</span>';
					
				}
				else {
					echo '<span style="color:#FF0000;text-decoration:line-through;margin-right:20px">'.$odg.'</span>';
					echo '<span style="color:#009900"> '.$resenje[0].'</span>';
				
				}
		
		}
		
		echo '</div>';

	}
			if (($procenat<0.8 AND $greska==3) OR ($procenat<0.9 AND $greska==4)) {
$flag=1;
if ($greska==4) $info=3;
	else $info=2;
$flag_sql='INSERT INTO `flags` (`ime`,`tel`,`email`,`adr`,`IP`,`flag`,`info`) VALUES ("'.$ime.'","'.$tel.'","'.$email.'","'.$adr.'","'.$ip.'","'.$flag.'","'.$info.'")';
mysqli_query($mysqli,$flag_sql) or die (mysqli_error($mysqli).' - '.$flag_sql);
?>
<script language="javascript" type="text/javascript">
alert('Žao nam je ali na sva tri testa niste prošli. Molimo vas kontaktirajte koordinatora testa za dalje informacije.');
</script>
<?php
			}
			if ($procenat==0.8 AND $greska==3) {
?>
<script language="javascript" type="text/javascript">
alert('Pošto ste blizu granice, imate poslednju priliku da uradite još 5 dodatnih pitanja (sva trebaju da budu tačna).');
</script>
<?php
			}
			if ($procenat>=0.9) {
$flag=3;
$flag_sql='INSERT INTO `flags` (`ime`,`tel`,`email`,`adr`,`IP`,`flag`,`info`) VALUES ("'.$ime.'","'.$tel.'","'.$email.'","'.$adr.'","'.$ip.'","'.$flag.'","'.$greska.'")';
mysqli_query($mysqli,$flag_sql) or die (mysqli_error($mysqli).' - '.$flag_sql);
?>
<script language="javascript" type="text/javascript">
alert('Čestitamo vam, prošli ste test. Molimo vas kontaktirajte koordinatora testa za dalje informacije.');
</script>
<?php
			}
$arayb=serialize($araya);
$sql="INSERT INTO `testlog` (`IP`,`arayb`,`ime`,`tel`,`email`,`adr`,`greska`) VALUES ('".$ip."','".$arayb."','".$ime."','".$tel."','".$email."','".$adr."','".$greska."')";
mysqli_query($mysqli,$sql) or die (mysqli_error($mysqli).' - '.$sql);

}
$status_sql='INSERT INTO `log` (`IP`,`stps`,`ime`,`tel`,`email`,`adr`,`greska`) VALUES ("'.$ip.'","'.$sitepos.'","'.$ime.'","'.$tel.'","'.$email.'","'.$adr.'","'.$greska.'")';
mysqli_query($mysqli,$status_sql) or die (mysqli_error($mysqli).' - '.$status_sql);

if ($sitepos==2) {
?>
<div id="header">
	<?php if ($greska!=0) echo '<span style="float:left;margin:10px;color:#FFFFFF;font-size:20pt;font-weight:bold">Ukupno grešaka:'.$greska.'</span>'; ?>
	<div id="timer" style="float:right;color:#FFFFFF;font-size:20pt;font-weight:bold;margin:10px">
		<script type="text/javascript">
			window.onload = CreateTimer("timer", 2700);
		</script>
	</div>
</div>
<?php

$counter_a=1;
echo '<form name="test" method="POST" action="kz.php">';
	$sql ='SELECT * FROM pitanja ORDER BY RAND() LIMIT 5';
	$result = mysqli_query($mysqli,$sql)or die(mysqli_error().' - '.$sql);
	while($row = $result->fetch_assoc()){
		$ID=$row['ID'];
		$pitanje=$row['pitanje'];
		$odgovor=$row['odgovor'];
		$odgovora=$row['odgovora'];
		$tacnih=$row['tacnih'];
		$resenje=$row['resenje'];
		$odgovori=explode(" $##$ ",$odgovor);
		echo '<div>';

			if ($odgovora!=0) echo '<div style="font-weight:bold;padding:10px 5px 5px 5px;color:#000000;font-size:16pt">'.$counter_a.'. '.$pitanje.'</div>';
				else {
					echo '<div style="font-weight:bold;padding:10px 5px 5px 5px;color:#000000;font-size:16pt">'.$counter_a.'. ';
					$pit=explode("$#$",$pitanje);
					$i=1;
					if ($pit[0]!="") echo $pit[0];
					while ($i<=$tacnih) {
						echo ' <input style="font-weight:bold" type="text" name="o'.$counter_a.'-'.$i.'" />'.$pit[$i].' ';
						$i++;
					}
					echo '</div>';
				}
			
			$shuf = range (1, $odgovora);
			shuffle($shuf);
			$acount=0;
			
			if ($odgovora>1) {
				if ($tacnih==1) {
			
				foreach ($shuf as $i) {
						$xi=$i-1;
						if ($acount%"2" == "1") $bgnd='FFFFFF';
							else $bgnd='DDDDDD';
						echo '<div style="margin:0 0 5px 20px;padding:0 3px;background:#'.$bgnd.';font-size:16"><input type="radio" name="o'.$counter_a.'" value="'.$i.'" style="margin-right:7px"/>'.$odgovori[$xi].'</div>';
						$acount++;
					}
				}
				
				else {
				
				foreach ($shuf as $i) {
						$xi=$i-1;
						if ($acount%"2" == "1") $bgnd='FFFFFF';
							else $bgnd='DDDDDD';
						echo '<div style="margin:0 0 5px 20px;padding:0 3px;background:#'.$bgnd.';font-size:16"><input type="checkbox" name="o'.$counter_a.'-'.$i.'" value="1" style="margin-right:7px"/>'.$odgovori[$xi].'</div>';
						$acount++;
					}
				
				}
			}
			elseif ($odgovora!=0) {
				
				echo '<input type="text" name="o'.$counter_a.'" style="width:100%">';
				
			}
			
			$shuf=serialize($shuf);
			echo '<input type="hidden" name="ID'.$counter_a.'" value="'.$ID.'" />';
			echo '<input type="hidden" name="pitanje'.$counter_a.'" value="'.$pitanje.'" />';
			echo '<input type="hidden" name="odgovor'.$counter_a.'" value="'.$odgovor.'" />';
			echo '<input type="hidden" name="odgovora'.$counter_a.'" value="'.$odgovora.'" />';
			echo '<input type="hidden" name="tacnih'.$counter_a.'" value="'.$tacnih.'" />';
			echo '<input type="hidden" name="resenje'.$counter_a.'" value="'.$resenje.'" />';
			echo '<input type="hidden" name="redosled'.$counter_a.'" value="'.$shuf.'" />';
			
		echo '</div>';
		$counter_a++;
	}

echo '<div style="height:26px;background:#003366;padding-top:4px;margin-top:10px;color:#FFFFFF"><input type="submit" value="proveri" style="margin-left:587px;float:left;width:200px"></div>';
echo '<input type="hidden" name="stps" value="4" />';
echo '<input type="hidden" name="grace" value="0" />';
echo '<input type="hidden" name="greska" value="'.$greska.'" />';
echo '<input type="hidden" name="ime" value="'.$ime.'"/>';
echo '<input type="hidden" name="tel" value="'.$tel.'" />';
echo '<input type="hidden" name="email" value="'.$email.'" />';
echo '<input type="hidden" name="adr" value="'.$adr.'" />';

echo '</form>';


?>
<SCRIPT LANGUAGE='JavaScript'>
setTimeout('document.test.submit()',2700000);
</SCRIPT>
<?php
}
if ($sitepos==3) {
?>
<div id="header">
	<span style="float:left;margin:10px;color:#FFFFFF;font-size:20pt;font-weight:bold">Poslednja šansa</span>
	<div id="timer" style="float:right;color:#FFFFFF;font-size:20pt;font-weight:bold;margin:10px">
		<script type="text/javascript">
			window.onload = CreateTimer("timer", 270);
		</script>
	</div>
</div>
<?php

$counter_a=1;
echo '<form name="test" method="POST" action="kz.php">';
	$sql ='SELECT * FROM pitanja ORDER BY RAND() LIMIT 5';
	$result = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli).' - '.$sql);
	while($row = $result->fetch_assoc()){
		$ID=$row['ID'];
		$pitanje=$row['pitanje'];
		$odgovor=$row['odgovor'];
		$odgovora=$row['odgovora'];
		$tacnih=$row['tacnih'];
		$resenje=$row['resenje'];
		$odgovori=explode(" $##$ ",$odgovor);
		echo '<div>';

		if ($odgovora!=0) echo '<div style="font-weight:bold;padding:10px 5px 5px 5px;color:#000000;font-size:16pt">'.$counter_a.'. '.$pitanje.'</div>';
				else {
					echo '<div style="font-weight:bold;padding:10px 5px 5px 5px;color:#000000;font-size:16pt">'.$counter_a.'. ';
					$pit=explode("$#$",$pitanje);
					$i=1;
					if ($pit[0]!="") echo $pit[0];
					while ($i<=$tacnih) {
						echo ' <input style="font-weight:bold" type="text" name="o'.$counter_a.'-'.$i.'" />'.$pit[$i].' ';
						$i++;
					}
					echo '</div>';
				}
			
			$shuf = range (1, $odgovora);
			shuffle($shuf);
			$acount=0;
			
			if ($odgovora>1) {
				if ($tacnih==1) {
			
				foreach ($shuf as $i) {
						$xi=$i-1;
						if ($acount%"2" == "1") $bgnd='FFFFFF';
							else $bgnd='DDDDDD';
						echo '<div style="margin:0 0 5px 20px;padding:0 3px;background:#'.$bgnd.';font-size:16"><input type="radio" name="o'.$counter_a.'" value="'.$i.'" style="margin-right:7px"/>'.$odgovori[$xi].'</div>';
						$acount++;
					}
				}
				
				else {
				
				foreach ($shuf as $i) {
						$xi=$i-1;
						if ($acount%"2" == "1") $bgnd='FFFFFF';
							else $bgnd='DDDDDD';
						echo '<div style="margin:0 0 5px 20px;padding:0 3px;background:#'.$bgnd.';font-size:16"><input type="checkbox" name="o'.$counter_a.'-'.$i.'" value="1" style="margin-right:7px"/>'.$odgovori[$xi].'</div>';
						$acount++;
					}
				
				}
			}
			elseif ($odgovora!=0) {
				
				echo '<input type="text" name="o'.$counter_a.'" style="width:100%">';
				
			}
			
			$shuf=serialize($shuf);
			echo '<input type="hidden" name="ID'.$counter_a.'" value="'.$ID.'" />';
			echo '<input type="hidden" name="pitanje'.$counter_a.'" value="'.$pitanje.'" />';
			echo '<input type="hidden" name="odgovor'.$counter_a.'" value="'.$odgovor.'" />';
			echo '<input type="hidden" name="odgovora'.$counter_a.'" value="'.$odgovora.'" />';
			echo '<input type="hidden" name="tacnih'.$counter_a.'" value="'.$tacnih.'" />';
			echo '<input type="hidden" name="resenje'.$counter_a.'" value="'.$resenje.'" />';
			echo '<input type="hidden" name="redosled'.$counter_a.'" value="'.$shuf.'" />';
			
		echo '</div>';
		$counter_a++;
	}

echo '<div style="height:26px;background:#003366;padding-top:4px;margin-top:10px;color:#FFFFFF"><input type="submit" value="proveri" style="margin-left:587px;float:left;width:200px"></div>';
echo '<input type="hidden" name="stps" value="4" />';
echo '<input type="hidden" name="grace" value="1" />';
echo '<input type="hidden" name="greska" value="'.$greska.'" />';
echo '<input type="hidden" name="ime" value="'.$ime.'"/>';
echo '<input type="hidden" name="tel" value="'.$tel.'" />';
echo '<input type="hidden" name="email" value="'.$email.'" />';
echo '<input type="hidden" name="adr" value="'.$adr.'" />';

echo '</form>';


?>
<SCRIPT LANGUAGE='JavaScript'>
setTimeout('document.test.submit()',270000);
</SCRIPT>
<?php

}

?>
</body>
</html>