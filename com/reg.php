<!--
	reg.php?db=db.lhcmt
-->

<html>
<head><title>registrar</title></head>
<body>
<?php 

function getext($filename) {
 $ext = substr($filename, strrpos($filename,".") + 1);
 return $ext;
} 

function nicks($nick){
	$file_nick = file("../../../tira/nicks.txt");
	$size = count($file_nick);
	$i = 0;
	while($i < $size){
		if($nick."\n" == $file_nick[$i]){
			$nick = "0";
			break;
		}
		$i++;
	}
	return $nick;
}
//main
	$db = $_GET['db'];
	$db = basename($db);
	if(getext($db) != "lhcmt"){
		echo "<strong>db mal</strong>";
		echo "<br>";
		exit;
	}


	$nick = $_POST['nick'];
	$pass = $_POST['pass'];
	$pass = md5(sha1($pass));

//se mira para ver si ya esta
	$nick = nicks($nick);
	if($nick == "0"){
		echo "<strong>este nick ya existe</strong>";
		echo "<br>";
		echo "<a href=\"../index.php#com\">volver</a>";
	}
//si no esta se annade
	else{
		$nick_file = fopen ("../../../tira/nicks.txt", "a+");
		if(!fwrite($nick_file, $nick."\n".$pass."\n")){
			die("fallo al escribir");
		}
		fclose($nick_file);
//y se refresca la ventana
		echo "";
		echo "<strong>".$nick."</strong> registrado OK.";
		echo "<br>";
		echo "<a href=\"../index.php#com\">volver</a>";
	}
?>
</body>
</html>
