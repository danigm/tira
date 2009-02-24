<!--
	tira.php?db=db.lhcmt&tira=tira
-->

<?php
$lines = file("../pub/ultima.txt");
	$img1 = $lines[1];


function getext($filename) {
 $ext = substr($filename, strrpos($filename,".") + 1);
 return $ext;
} 

	$db = $_GET['db'];
	$db = basename($db);
	if(getext($db) != "lhcmt"){
		echo "<strong>db mal</strong>";
		echo "<br>";
		echo "<a href=\"../tira.html\">volver</a>";
		exit;
	}

	$tira = $_GET['tira'];
	$tira = basename($tira);
	$tira = rtrim($tira);
	$img1 = rtrim($img1);
	if($tira == $img1){
		echo '<script>window.location="../index.php";</script>';
		echo '<a href="../index.php">Comenta la tira</a><br>';
	}
?>

<!--
    Enlaces a anterior y siguiente
-->
<?php
    $lista = file("../pub/lista.txt");
    $i = 0;
    while ($i < count($lista)){
	if(rtrim($lista[$i]) == "$tira.png"){
	    $cad1 = substr($lista[$i-1], 0, -5);
	    $cad2 = substr($lista[$i+1], 0, -5);
	    break;
	}
	$i++;
    }
?>


<html>
<head><title><?php echo $tira;?></title>
<link rel="stylesheet" href="../tira.css" />
</head>
<body>
<center>
<?php

	echo "<img src=\"../".$tira.".png\" alt=\"".$tira."\"/>";
	echo "<br/>";
	if($cad1)
	   echo('<a href="tira2.php?tira='.$cad1.'&amp;db='.$cad1.'.lhcmt"><-anterior</a>');
	echo ' -- <a href="../index.php">actual</a> -- ';
	echo('<a href="tira2.php?tira='.$cad2.'&amp;db='.$cad2.'.lhcmt">siguiente-></a>');
?>
</center>
<br>
<table border="0" width="100%">
<th>Comentarios</th>
<?php
	$color[0] = "color0";
	$color[1] = "color1";
	
	if(is_file($db)){
		$lines = file($db);
		$c = 0;
		$i = 0;
		$num = count($lines);
		while( $i < $num ){
			echo "<tr class=\"".$color[$c]."\"><td>".$i."# ".$lines[$i]."</td></tr>";
			if($c == 1){
				$c--;
			}
			else{
				$c++;
			}
			$i++;
		}
	}
?>
</table>


</body>
</html>
