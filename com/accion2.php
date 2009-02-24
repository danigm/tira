<!--
	accion2.php?db=db.lhcmt
-->

<html>
<head><title>accion</title></head>
<body>
<?php 

//borra un comentario del fichero
function del($n, $db){
    $lines = file("../com/$db");
    $fdb = fopen ($db, "w");
    
    $i = 0;
    $num = count($lines);
    while( $i < $num ){
	if($i != $n)
	    if(!fwrite($fdb, $lines[$i])) die("fallo al escribir");
	$i++;

    }
    fclose($fdb);

}

//pasa un comentario a minusculas
function minusculas($n, $db){
    $lines = file("../com/$db");
    $fdb = fopen ($db, "w");
    
    $i = 0;
    $num = count($lines);
    while( $i < $num ){
	if($i != $n){
	    if(!fwrite($fdb, $lines[$i])) die("fallo al escribir");
	}
	else{ 
	    if(!fwrite($fdb, strtolower($lines[$i]))) die("fallo al escribir");
	}
	$i++;

    }
    fclose($fdb);

}


//el fichero nicks.txt tiene el nick y el md5 del pass
//de cada usuario registrado. En una linea el nick, y en
//la siguiente el md5 del pass.
function nicks($nick, $pass){
	$file_nick = file("../../../tira/nicks.txt");
	$size = count($file_nick);
	$i = 0;
	while($i < $size){
		if($nick."\n" == $file_nick[$i]){
			if($pass."\n" != $file_nick[$i+1])
				$nick = "0";
			break;
  		}
		$i++;
	}
	return $nick;
}

function getext($filename) {
 $ext = substr($filename, strrpos($filename,".") + 1);
 return $ext;
} 


//main
	$nick = $_POST['nick'];
	$texto = $_POST['text'];
	$pass = $_POST['pass'];
    $capcha = $_POST['texto'];
    echo $capcha;
    exit;
	$ip = $_SERVER['REMOTE_ADDR'];
	$db = $_GET['db'];
	$db = basename($db);
	if(getext($db) == "lhcmt"){
		$pass = md5(sha1($pass));

//filtrando el titulo para evitar html (hack por no tener esto)
		$nick = htmlspecialchars($nick, ENT_NOQUOTES);
		$nick = eregi_replace("\n", " ", $nick);
		$nick = eregi_replace("\r", "", $nick);

//filtrando el mensaje para evitar html
		$texto = htmlspecialchars($texto, ENT_NOQUOTES);
		$texto = eregi_replace("\n", "<br>", $texto);
		$texto = eregi_replace("\r", "", $texto);


//evitamos la inclusion de urls para evitar el spam
                if(stristr($texto, "http")){
			echo "<strong>No al SPAM!!!</strong>";
			exit;
		}
        if($capcha != ""){
            echo "<strong>Formulario mal rellenado!!</strong>";
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
		if($nick == ""){
			$nick = "Null identifier";
		}
		
//comprobar si la ip esta en la lista negra
		foreach(file("listaNegra.txt") as $key => $value){
			$value = trim($value);
			if($ip == $value){
				echo "<strong>esta ip $ip est&aacute; bloqueada, porque he visto que me han hecho spam desde aqu&iacute; si tienes alg&uacute;n problema mandame un correo o algo. <br>
Si t&uacute; no me has mandado spam lo mismo t&uacute; maquina es zombie. Y si est&aacute;s seguro de que no es posible, lo mismo el fallo es mio, y &eacute;ste script est&aacute; mal.</strong>";
				exit;
			}
		}

//se comprueba si es un usuario registrado
		$nick = nicks($nick, $pass);
		if($nick == "0"){
			echo "<strong>Passwd incorrecto</strong>";
			echo "<br>";
			echo "<a href=\"../index.php#com\">volver</a>";
		}
//se mira si es un comando
		else if($nick == 'danigm'){
		    if(substr($texto, 0, 3) == 'del'){
			$n = substr($texto, 4);
			del($n, $db);
			echo "<script>window.location='../index.php#com';</script>";
		    }
		    else if(substr($texto, 0, 3) == 'min'){
			$n = substr($texto, 4);
			minusculas($n, $db);
			echo "<script>window.location='../index.php#com';</script>";
		    }
		    else{
			$fdb = fopen ($db, "a+");
			if(!fwrite($fdb, '<strong class="danigm">'.$nick.'</strong>: '.stripslashes($texto)."\n")){
				die("fallo al escribir");
			}
			fclose($fdb);
			echo "<script>window.location='../index.php#com';</script>";
		    }
		}


		else{
//se escribe en el fichero el comentario
			$fdb = fopen ($db, "a+");
			if(!fwrite($fdb, "<strong>".$nick."</strong>: ".stripslashes($texto)."\n")){
				die("fallo al escribir");
			}
			fclose($fdb);
//y se refresca la ventana
			echo "<script>window.location='../index.php#com';</script>";
		}
	}
	else{
		echo "<strong>db mal</strong>";
		echo "<br>";
		exit;
	}
?>
</body>
</html>
