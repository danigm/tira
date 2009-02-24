<!--
	index.php?db=db.lhcmt
-->
<table class="com" width="100%">
<th>Comentarios</th>
<?php

function isUTF8($str) {
       if ($str === mb_convert_encoding(mb_convert_encoding($str, "UTF-32", "UTF-8"), "UTF-8", "UTF-32")) {
           return true;
       } else {
           return false;
       }
}

function getext($filename) {
 $ext = substr($filename, strrpos($filename,".") + 1);
 return $ext;
} 

//main devuelve el codigo html en el cual coloca en una tabla cada comentario en una linea.
	$color[0] = "color0";
	$color[1] = "color1";
	$db = basename($db);
	rtrim($db);
	if(getext($db) == "lhcmt"){
		$lines = file("com/$db");
		$c = 0;
		$i = 0;
		$num = count($lines);
		while( $i < $num ){
			$texto2 = $lines[$i];
			if(isUTF8($texto2))
				echo "<tr class=\"".$color[$c]."\"><td>".$i."# ".utf8_decode($lines[$i])."</td></tr>";
			else
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
	else{
		echo "db mal";
		echo "<br>";
		exit;
	}

		
?>
</table>
