<!--
	traduccion
-->

<html>
<head><title>traduccion</title></head>
<body>
<?php 

//main
	$texto = $_POST['traduccion'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$db = "pub/traduccion.txt";
	$lines = file($db);
	$v = $lines[count($lines)-1];
	$v = (int)ltrim($v, "@#");
	$v++;

//evitamos la inclusion de urls para evitar el spam
                if(stristr($texto, "http")){
			echo "<strong>No al SPAM!!!</strong>";
			exit;
		}
                if(stristr($nick, "http")){
			echo "<strong>No al SPAM!!!</strong>";
			exit;
		}
//ahora evitamos que no se ponga nada
                if($texto == "texto" || $texto == ""){
			echo "<strong>Escribe algo desgraciao</strong>";
			exit;
		}

		else{
//se escribe en el fichero la traduccion
			$fdb = fopen ($db, "a+");
			if(!fwrite($fdb, "\n\n!nueva version [[".$v."]]\n".str_replace("\'","'",$texto)."\n@#".$v)){
				die("fallo al escribir");
			}
			fclose($fdb);
//y se refresca la ventana
			echo "<script>window.location='index.php#trad';</script>";
		}
	
?>
</body>
</html>
