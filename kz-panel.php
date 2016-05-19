<?php include 'connect.php'; ?>
<html>
<head profile="http://www.w3.org/2005/20/profile">
<link rel="icon"
	  type="image/png"
	  href="favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Klub zdravlja | Kontrolni panel</title>
<link type='text/css' rel='stylesheet' href='stylep.css' />
<script type="text/javascript" src="js/jscolor/jscolor.js"></script>
</head>
<body>
<?php
$parola="buonaroti";
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

if(isset($_POST['sifra'])) $sfr=mysqli_real_escape_string($mysqli,$_POST['sifra']);
else $sfr="";
if(isset($_POST['flag'])) {
	$flag=mysqli_real_escape_string($mysqli,$_POST['flag']);
	$ime=mysqli_real_escape_string($mysqli,$_POST['ime']);
	$tel=mysqli_real_escape_string($mysqli,$_POST['tel']);
	$email=mysqli_real_escape_string($mysqli,$_POST['email']);
	$adr=mysqli_real_escape_string($mysqli,$_POST['adr']);
	$IP=mysqli_real_escape_string($mysqli,$_POST['IP']);
	$flag_sql='INSERT INTO `flags` (`ime`,`tel`,`email`,`adr`,`IP`,`flag`,`info`) VALUES ("'.$ime.'","'.$tel.'","'.$email.'","'.$adr.'","'.$IP.'","'.$flag.'","0")';
	mysqli_query($mysqli,$sql)or die;;
	}
else $flag=0;
if(isset($_POST['sort'])) $sort=mysqli_real_escape_string($mysqli,$_POST['sort']);
else $sort=1;
if(isset($_POST['arhiva'])) $arhiva=mysqli_real_escape_string($mysqli,$_POST['arhiva']);
else $arhiva=0;
if(isset($_POST['stps'])) $sitepos=mysqli_real_escape_string($mysqli,$_POST['stps']);
else $sitepos=0;
if(isset($_POST['page'])) $page=mysqli_real_escape_string($mysqli,$_POST['page']);
else $page=1;
if ($sfr==$parola) {
	$sitepos=1;
}

if ($sitepos==0) {
?>
	<div style="position:relative;margin:200px auto;width:430px;height:220px;background:#003366;padding:10px 20px;color:#FFFFFF">
		<div style="text-align:center;width:430px"><h3>Dobrodošli na kontrolni panel Kluba Zdravlja</h3></div>
		<div style="text-align:center;width:430px">Da bi ste nastavili dalje, unesite vašu lozinku</div><br/>
		<form name="sif" method="POST" action="kz-panel.php">
			<div style="text-align:center;width:430px"><input type="text" style="width:150px;font-size:20pt;font-weight:bold;color:#003366;text-align:center" name="sifra" /></div>
			<input type="hidden" name="bio" value="1"/>
			<div style="text-align:center;width:430px"><input type="submit" value="unesi" style="margin-top:10px"/></div>
		</form>
	</div>
<?php
}
if ($sitepos==1) {
?>

<div id="wrapper">
	<div id="header">
		<div style="padding:20px;font-size:28px;font-weight:bold;text-shadow: #555555 2px 2px 2px;">Kontrolni panel Kluba Zdravlja
		</div>
		<div style="float:right;color:#FFFFFF;font-size:20pt;font-weight:bold;text-shadow: #555555 2px 2px 2px;margin:20px 20px 0 0">Današnja lozinka: "<?php echo $pas; ?>"</div>
	</div>
	<div id="toolbar">
		<div style="margin-left:190px">
		<form method="POST" style="float:left;margin-right:50px"><input type="submit" value="dešavanja" style="width:150px"/><input type="hidden" name="stps" value="1"/><input type="hidden" name="page" value="1"/><input type="hidden" name="sort" value="1"/></form>
		<form method="POST" style="float:left;margin-right:50px"><input type="submit" value="profili" style="width:150px"/><input type="hidden" name="stps" value="1"/><input type="hidden" name="page" value="2"/><input type="hidden" name="sort" value="1"/></form>
		<form method="POST" style="float:left"><input type="submit" value="zastavice"  style="width:150px"/><input type="hidden" name="stps" value="1"/><input type="hidden" name="page" value="3"/><input type="hidden" name="sort" value="1"/></form>
		</div>
	</div>

<?php
	if ($page==1) {
	
		echo '<div style="height:26px;padding:3px;background:#59bce9">
				<div style="float:left;padding-left:7px;color:#FFFFFF;text-shadow: #555555 2px 2px 2px;font-size:18pt;font-weight:bold">Dešavanja</div>
				<form method="POST" style="float:left;margin-left:10px">
					<input type="hidden" name="stps" value="1"/>
					<input type="hidden" name="page" value="1"/>
					<input type="hidden" name="sort" value="1"/>
					<input type="hidden" name="arhiva" value="0"/>
					<input type="submit" value="Najnovija" />
				</form>
				<form method="POST" style="float:left;margin-left:5px">
					<input type="hidden" name="stps" value="1"/>
					<input type="hidden" name="page" value="1"/>
					<input type="hidden" name="sort" value="1"/>
					<input type="hidden" name="arhiva" value="1"/>
					<input type="submit" value="Arhiva" />
				</form>
				<form method="POST" style="float:right">
					<input type="hidden" name="stps" value="1"/>
					<input type="hidden" name="page" value="1"/>
					<input type="hidden" name="sort" value="3"/>
					<input type="hidden" name="arhiva" value="1"/
					<input type="submit" value="Sortiraj po IP adresi" />
				</form>
					<form method="POST" style="float:right;margin-right:5px">
					<input type="hidden" name="stps" value="1"/>
					<input type="hidden" name="page" value="1"/>
					<input type="hidden" name="sort" value="2"/>
					<input type="hidden" name="arhiva" value="1"/>
					<input type="submit" value="Sortiraj po imenu i prezimenu" />
				</form>
			</div>
			<div style="height:26px;padding:3px;background:#59bce9">
				<div style="float:left;padding-left:7px;color:#FFFFFF;text-shadow: #555555 2px 2px 2px;font-size:14pt;font-weight:bold">
				<span style="margin-left:8px">ID</span>
				<span style="margin-left:62px">datum</span>
				<span style="margin-left:98px">lične informacije</span>
				<span style="margin-left:100px">IP</span>
				<span style="margin-left:165px">strana</span>
				<span style="margin-left:100px">greška</span>
				</div>
			</div>';
		
		$sql='SELECT * FROM `log` ORDER BY ';
		if ($sort==1) $sql.='`timestamp` DESC';
		elseif ($sort==2) $sql.='`ime` ASC, `timestamp` DESC';
		elseif ($sort==3) $sql.='`IP` ASC, `timestamp` DESC';
		if ($arhiva==0) $sql.=' LIMIT 100';
		$result = mysqli_query($mysqli,$sql)or die;
		$count=1;
		while($row = $result->fetch_assoc()){
			$ID=$row['ID'];
			$IP=$row['IP'];
			$ime=$row['ime'];
			$tel=$row['tel'];
			$email=$row['email'];
			$adr=$row['adr'];
			$stps=$row['stps'];
			$greska=$row['greska'];
			$date=$row['timestamp'];
$year = substr($date, 0, 4);
$month = substr($date, 5, 2);
$day = substr($date, 8, 2);
$hour = substr($date, 11, 2);
$min = substr($date, 14, 2);
$sec = substr($date, 17, 2);
$fdate = date ('d.m.Y. H:i:s', mktime ($hour,$min,$sec,$month,$day,$year));
			switch ($stps) {
				case -1:
					$stpsx='zabranjen pristup';
					break;
				case 0:
					$stpsx='na stranici za unos lozinke';
					break;
				case 1:
					$stpsx='na stranici za unos ličnih informacija';
					break;
				case 2:
					$stpsx='radi test';
					break;
				case 3:
					$stpsx='radi dodatna pitanja';
					break;
				case 4:
					$stpsx='na stranici sa rezultatima';
					break;
			}

			if ($count%2==1) $bgnd='DDDDDD';
				else $bgnd='FFFFFF';
				echo '<div style="height:20px;margin:0 6px;padding:3px;width:914px;background:#'.$bgnd.';font-size:11pt">';
					echo '<div style="width:30px;float:left">'.$ID.'</div>';
					echo '<div style="width:175px;float:left"> &nbsp;&nbsp;|&nbsp;&nbsp; '.$fdate.'</div>';
					echo '<div style="width:225px;float:left" class="ToolText" onMouseOver="javascript:this.className=\'ToolTextHover\'" onMouseOut="javascript:this.className=\'ToolText\'"> &nbsp;&nbsp;|&nbsp;&nbsp; '.$ime.'<span>tel: '.$tel.' &nbsp;&nbsp;|&nbsp;&nbsp; e-mail: '.$email.' &nbsp;&nbsp;|&nbsp;&nbsp; adresa: '.$adr.' </span></div>';
					echo '<div style="width:147px;float:left"> &nbsp;&nbsp;|&nbsp;&nbsp; '.$IP.'</div>';
					echo '<div style="width:275px;float:left"> &nbsp;&nbsp;|&nbsp;&nbsp; '.$stpsx.'</div>';
					echo '<div style="width:40px;float:left"> &nbsp;&nbsp;|&nbsp;&nbsp; '.$greska.'</div>';
				echo '</div>';
				
			$count++;
		}
	
	}
	if ($page==2) {


	}
	if ($page==3) {

	
		echo '<div style="height:26px;padding:3px;background:#59bce9">
				<span style="float:left;padding-left:7px;color:#FFFFFF;text-shadow: #555555 2px 2px 2px;font-size:18pt;font-weight:bold">Zastavice</span>
				<form method="POST" style="float:left;margin-left:10px">
					<input type="hidden" name="stps" value="1"/>
					<input type="hidden" name="page" value="3"/>
					<input type="hidden" name="sort" value="1"/>
					<input type="hidden" name="arhiva" value="0"/>
					<input type="submit" value="Najnovije" />
				</form>
				<form method="POST" style="float:left;margin-left:5px">
					<input type="hidden" name="stps" value="1"/>
					<input type="hidden" name="page" value="3"/>
					<input type="hidden" name="sort" value="1"/>
					<input type="hidden" name="arhiva" value="1"/>
					<input type="submit" value="Arhiva" />
				</form>
				<form method="POST" style="float:right">
					<input type="hidden" name="stps" value="1"/>
					<input type="hidden" name="page" value="3"/>
					<input type="hidden" name="sort" value="4"/>
					<input type="hidden" name="arhiva" value="1"/>
					<input type="submit" value="Sortiraj po zastavici" />
				</form>
				<form method="POST" style="float:right">
					<input type="hidden" name="stps" value="1"/>
					<input type="hidden" name="page" value="3"/>
					<input type="hidden" name="sort" value="3"/>
					<input type="hidden" name="arhiva" value="1"/>
					<input type="submit" value="Sortiraj po IP adresi" />
				</form>
				<form method="POST" style="float:right;margin-right:5px">
					<input type="hidden" name="stps" value="1"/>
					<input type="hidden" name="page" value="3"/>
					<input type="hidden" name="sort" value="2"/>
					<input type="hidden" name="arhiva" value="1"/>
					<input type="submit" value="Sortiraj po imenu i prezimenu" />
				</form>';
		echo '</div>';
		
		$sql='SELECT * FROM `flags` ORDER BY ';
		if ($sort==1) $sql.='`timestamp` DESC';
		elseif ($sort==2) $sql.='`ime` ASC, `timestamp` DESC';
		elseif ($sort==3) $sql.='`IP` ASC, `timestamp` DESC';
		elseif ($sort==4) $sql.='`flag` ASC, `timestamp` DESC';
		if ($arhiva==0) $sql.=' LIMIT 100';
		$result = mysqli_query($mysqli,$sql)or die;
		$count=1;
		while($row = $result->fetch_assoc()){
			$ID=$row['ID'];
			$IP=$row['IP'];
			$ime=$row['ime'];
			$tel=$row['tel'];
			$email=$row['email'];
			$adr=$row['adr'];
			$flag=$row['flag'];
			$info=$row['info'];
			$date=$row['timestamp'];
$year = substr($date, 0, 4);
$month = substr($date, 5, 2);
$day = substr($date, 8, 2);
$hour = substr($date, 11, 2);
$min = substr($date, 14, 2);
$sec = substr($date, 17, 2);
$fdate = date ('d.m.Y. H:i:s', mktime ($hour,$min,$sec,$month,$day,$year));
if ($flag==1) {
	switch ($info) {
		case 0:
			$infox="Zabranjeno od administratora";
			break;
		case 1:
			$infox="Pet puta unešena pogrešna lozinka";
			break;
		case 2:
			$infox="Tri puta nedovoljno bodova na ispitu";
			break;
		case 3:
			$infox="Nedovoljno bodova i na bonus pitanjima";
			break;
		case 4:
			$infox="Moguće nedozvoljeno biranje pitanja";
			break;
		}
}
elseif ($flag==3) {
	switch ($info) {
		case 0:
			$infox="Položen test iz prvog pokušaja";
			break;
		case 1:
			$infox="Položen test iz drugog pokušaja";
			break;
		case 2:
			$infox="Položen test iz trećeg pokušaja";
			break;
		case 3:
			$infox="Položen test na bonus pitanjima";
			break;
		}
}
else $infox='Dozvoljeno od administratora';

			if ($count%2==1) {
				if ($flag==1) $bgnd='DDBBBB';
				elseif ($flag==2) $bgnd='BBDDBB';
				else $bgnd='AACCEE';
				}
				else {
				if ($flag==1) $bgnd='FFDDDD';
				elseif ($flag==2) $bgnd='DDFFDD';
				else $bgnd='CADCFF';
				}
				echo '<div style="height:20px;margin:0 6px;padding:3px;width:914px;background:#'.$bgnd.'">';
					echo '<div style="width:40px;float:left">'.$ID.'</div>';
					echo '<div style="width:175px;float:left"> &nbsp;&nbsp;|&nbsp;&nbsp; '.$fdate.'</div>';
					echo '<div style="width:200px;float:left" class="ToolText" onMouseOver="javascript:this.className=\'ToolTextHover\'" onMouseOut="javascript:this.className=\'ToolText\'"> &nbsp;&nbsp;|&nbsp;&nbsp; '.$ime.'<span>tel: '.$tel.' &nbsp;&nbsp;|&nbsp;&nbsp; e-mail: '.$email.' &nbsp;&nbsp;|&nbsp;&nbsp; adresa: '.$adr.' </span></div>';
					echo '<div style="width:147px;float:left"> &nbsp;&nbsp;|&nbsp;&nbsp; '.$IP.'</div>';
					echo '<div style="width:300px;float:left"> &nbsp;&nbsp;|&nbsp;&nbsp; '.$infox.'</div>';
					if ($flag==1) {
					echo '<div style="width:50px;float:left"> &nbsp;|&nbsp;
						<form method="POST" style="float:right">
							<input type="hidden" name="stps" value="1"/>
							<input type="hidden" name="page" value="3"/>
							<input type="hidden" name="sort" value="1"/>
							<input type="hidden" name="arhiva" value="0"/>
							<input type="hidden" name="flag" value="2"/>
							<input type="hidden" name="ime" value="'.$ime.'"/>
							<input type="hidden" name="tel" value="'.$tel.'"/>
							<input type="hidden" name="adr" value="'.$adr.'"/>
							<input type="hidden" name="email" value="'.$email.'"/>
							<input type="hidden" name="IP" value="'.$IP.'"/>
							<input type="submit" value="√" style="float:left;height:20px"/>
						</form>
					</div>';
					}
					else {
					echo '<div style="width:50px;float:left"> &nbsp;|&nbsp;
						<form method="POST" style="float:right">
							<input type="hidden" name="stps" value="1"/>
							<input type="hidden" name="page" value="3"/>
							<input type="hidden" name="sort" value="1"/>
							<input type="hidden" name="arhiva" value="0"/>
							<input type="hidden" name="flag" value="1"/>
							<input type="hidden" name="ime" value="'.$ime.'"/>
							<input type="hidden" name="tel" value="'.$tel.'"/>
							<input type="hidden" name="adr" value="'.$adr.'"/>
							<input type="hidden" name="email" value="'.$email.'"/>
							<input type="hidden" name="IP" value="'.$IP.'"/>
							<input type="submit" value="X" style="float:left;height:20px"/>
						</form>
					</div>';
					}
				echo '</div>';
			$count++;
		}
	}
echo '</div>';
}
?>
</body>
</html>