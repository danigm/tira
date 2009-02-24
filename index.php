<?php
	$lines = file("pub/ultima.txt");
	$titulo = $lines[0];
	$img = $lines[1];

?>

<html>
<head>
  <title>Tira LinuxHispano</title>
<meta http-equiv="content-type" content="text-html; charset=ISO-8859-1">
<link rel="stylesheet" href="tira.css" />
  <LINK REL="alternate" TITLE="RSS de la tira" HREF="feeds.php" TYPE="application/rss+xml">
<LINK REL="shortcut icon" HREF="logo.png" TYPE="image/x-icon">
</head>

<body>

<div id="nifty">

<a href="/index.php"><img
 src="/joomla/templates/linux_hispano/images/logo.gif"
 alt="Bienvenido a Linux Hispano"></a>
 <div class="head3">
Bienvenido a la tira de Linux Hispano &nbsp;&nbsp;&nbsp;&nbsp;
Esta semana: "<span id="head2"> <?php echo $titulo; ?></span>"<!--titulo-->
</div>

</div>


<div id="tira">
<!--imagen--><img src="http://sugus.eii.us.es/~danigm/tira/<?php echo "$img"; ?>.png"
alt="<?php echo "$img"; ?>">
</div>
<?php
$size = GetImageSize(trim($img).".png"); 

$lines = file("pub/traduccion.txt");
$count = count($lines);
$i = 0;
$trad = "";
while ($i < $count){
	if($lines[$i][0] == '!'){
		$trad = "";
		$i++;
		continue;
	}

	$trad = $trad.$lines[$i];
	$i++;
}

if($size[1] < 270){
	echo '<a name="trad"></a>';
	echo '<div class="head"> Traduce la Tira </div>';
	echo '<form action="traduccion.php" method="post">';
	echo '<textarea class="completo2" name="traduccion" cols="60" rows="10">'.$trad.'</textarea>';
	echo '<button class="completo3" type="submit" value="Traducir">Traducir</button>';
	echo '</form>';
	echo '<div class="completo3">';
	echo 'Ahora puedes traducir la tira, en vivo y en directo. Si hay una traducci&oacute;n puedes corregirla, como si fuera un wiki. Solo tienes que introducir la traducci&oacute;n en este campo.<br/>';
	echo '</div>';
}
echo '<div class="completo3">';
echo '<a href="pub/traduccion.txt">Aqu&iacute; est&aacute; el archivo con todas las versiones de la traducci&oacute;n</a>';
echo '</div>';
?>
<a name="com"></a>
<div class="head"> Comenta la Tira </div>
<div id="tablaCom">
<?php 
	$img = substr($img, 0, strlen($img)-1);
	$db = "$img.lhcmt";
	include "com/index2.php";
?>
</div>

<div id="form">
<!--formularios-->
<table  width="100%" class="formTable">
<?php
	echo "<form action=\"com/accion2.php?db=".$img.".lhcmt\" method=\"post\">";
?>
<tr>
<td width="80%">
	<input class="completo" type="text" name="nick" maxleng="20" value="nick">
</td>
<td width="20%">
	<button class="completo" type="submit" value="Comentar">Comentar</button>
</td>
</tr>
<tr>
<td colspan="2">
	<textarea class="completo" name="text" cols="60" rows="5">texto</textarea>
</td>
</tr>
<tr>
<td colspan="2" id="left">
	password: <input type="password" name="pass" size="15" maxleng="15" >
	S&oacute;lo si el nick esta registrado.
</td>
</tr>
	</form>
<tr>
<td colspan="2" id="center">
	<br>
<?php
	echo "<form action=\"com/reg.php?db=".$img.".lhcmt\" method=\"post\">";
?>
	nick <input type="text" name="nick" size="15" maxleng="15" value="nick">
	pass <input type="password" name="pass" size="15" maxleng="15" value="pass">
	<button type="submit" value="registrar nick">registrar nick</button>
	</form>
</td>
</tr>
</table>
<!--fin formularios-->
</div>

<p>
<p>
<div id="archivo">
<?php
	readfile("pub/archivo.html");
?>
</div>

<br>


<table id="otras">
  <tbody>
    <tr>
      <th colspan="5" rowspan="1" class="head">
      <h3>Otras Tiras</h3>
      </th>
    </tr>
    <tr class="otras">
      <td>
<a href="http://www.tiraecol.net/"><img src="http://www.tiraecol.net/modules/comic/cache/shots/tiraecol-icon-160px.png" alt="Tira Ecol" /></a>
 <br>
      </td>
      <td
 ><a
 href="http://recurrente.afraid.org/myblog/?q=ultima"><img
 alt="tira recurrente"
 src="http://recurrente.afraid.org/myblog/tira/minitira.png"
 ></a><br>
      </td>
<td>
<div style="text-align:center; font-size:8pt;
   padding:2px 4px 1px 4px; margin:2px 0px 2px 0px;">
<div><a href="http://www.legiondelespacio.com">
 <b>La Legi&oacute;n del Espacio</b>
</a></div>
<a href="http://www.legiondelespacio.com">
 <img src="http://www.legiondelespacio.com/link/minitira.jpg" 
  alt="La Legi&oacute;n del Espacio" title="La Legi&oacute;n del Espacio"
  style="width:125px; height:125px; margin:0px 3px 0px 2px; border:2px;" />
</div>
</td>
<td><a href="http://tira.emezeta.com/"><img alt="bit &amp; byte" src="http://tira.emezeta.com/tiras/tiramin.png"></a><br></td>
<td>
    <a href="http://penti-atlo.blogspot.com"><img
       src="http://davidasorey.net/wp-content/ultima-mini.png"
       alt="Penti y Atlo"/>
    </a>
</td>
    </tr>
    <tr>
      <td>la tira ecol, que me sirvi&oacute; de inspiraci&oacute;n</td>
      <td>tira bastante friki</td>
      <td>La tira de la legion del espacio</td>
	<td>dos personajes bastante peculiares</td>
	<td>Penti y Atlo, han vuelto despu&eacute;s de su retirada</td>
</tr>
<!--
<tr>
      <th colspan="3" rowspan="1" class="head">Tiras que se actualizan m&aacute;s bien poco...</th>
</tr>
<tr>
<td><a href="http://penti-atlo.blogspot.com/"><img alt="penti &amp; atlo" src="http://www.geocities.com/forodejazz/ultima_mini.png"></a><br></td>
<td><a href="http://shock.hamsterdoris.com/tira"><img alt="Lika y Neord" src="http://shock.hamsterdoris.com/tira/mini.png"></a><br></td>
</tr>
<tr>
	<td>tira sobre dos ordenadores, un pentium y un athlon</td>
	<td>Lika es maquera y Neord linuxero, y de vez en cuando surge alg&uacute;n conflicto...</td>
    </tr>
-->
    <tr id="blog">
      <td colspan="1" rowspan="1"><a
 title="dibulog" href="http://danigm.wordpress.com">blog de danigm</a><br>
      </td>
      <td rowspan="1" colspan="5"
 >mis
dem&aacute;s ideas y tonterias que no est&aacute;n relacionadas con la
inform&aacute;tica, est&aacute;n dibujadas aqu&iacute;.<br>
      </td>
    </tr>
  </tbody>
</table>

<p>

<br />
Ahora tambi&eacute;n tenemos la tira en RSS.
<br>
<a href="feeds.php"><img src="rsslogo.png" alt="rss" border="0"/></a>
</p>
<br>
<div id="enlazar">
<p>
Para enlazar esta
tira igual que la tenemos en nuestra p&aacute;gina deber&aacute;s
copiar el siguiente
c&oacute;digo en tu web:</p>
<form name="form1" method="post" action="">
  <textarea name="textarea" cols="52" rows="6">&lt;a
href="http://www.linuxhispano.net/tira/" target="_blank"&gt;
&lt;img src="http://www.linuxhispano.net/tira/vinieta.png" alt="Tira
Linux Hispano" border="0" width="127"
height="130"&gt;&lt;/a&gt;&lt;br&gt;Tira LH&lt;br&gt; </textarea> 
</form>
Si usas phpnuke
deber&aacute;s ir a la
secci&oacute;n de
administraci&oacute;n/bloques y bajas hacia abajo y ver&aacute;s donde
hay un cuadro
de texto para poner el T&iacute;tulo, ah&iacute; pones Tira
LinuxHispano, y luego en
Contenido pegas el c&oacute;digo que hay arriba. Le das a crear bloque
y ya
tendr&aacute;s nuestra tira en tu web.
</div>



<div class="foot">
<p>Si hay un * en el
5&ordm; Martes significa que
ese mes solo tiene 4 Martes.<br>
Si hay un -- en algun Martes significa que ese martes no se ha
publicado tira.<br>
Si hay varios enlaces en un mismo Martes significa que ese martes se
han publicado mas de una tira, por algun motivo, el especial llevara
asteriscos. ejemplo **foo**.</p>
<p>Esta tira es
totalmente libre, se puede
copiar, distribuir y publicar sin permiso de nadie, aunque se
agradeceria que se pusiera la procedencia de la tira asi como sus
autores. La venta de esta tira se considera totalmente legal tanto en
formato digital como en papel escrito (se agradeceria una notificacion
al autor). Para cualquier interesado, se pueden conseguir los .svg,
para ello hay que ponerse en contacto con el autor: danigm en gmail . com<br>
Esta creada totalmente con software libre, <a
 href="http://www.inkscape.org">inkscape</a> (dibujo vectorial) para
dibujar a los personajes y todo lo demas, y retocado con <a
 href="http://www.gimp.org">gimp</a>.</p>
<p>
Guion original equipo de Linux Hispano, dibujos por parte de <a
 href="mailto:danigm@linuxhispano.net">danigm</a>.<br>
Se aceptan guiones, y sugerencias por mail o en los comentarios</p>
<p>
 <a href="http://jigsaw.w3.org/css-validator/check/referer">
  <img style="border:0;width:88px;height:31px"
       src="http://jigsaw.w3.org/css-validator/images/vcss" 
       alt="Valid CSS!">
 </a>
</p>
</div>
</body>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1752374-1";
urchinTracker();
</script>
</html>
