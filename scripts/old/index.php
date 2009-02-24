<?php
	$lines = file("pub/ultima.txt");
	$titulo = $lines[0];
	$img = $lines[1];

?>

<html>
<head>
  <title>Tira LinuxHispano</title>
<link rel="stylesheet" href="tira.css" />
  <LINK REL="alternate" TITLE="RSS de la tira" HREF="linuxhispano.xml" TYPE="application/rss+xml">
<LINK REL="shortcut icon" HREF="logo.png" TYPE="image/x-icon">
</head>
<body leftmargin="0" topmargin="0"
 style="color: rgb(0, 0, 0); background-color: rgb(102, 153, 204);"
 alink="#d5ae83" link="#363636" marginheight="0" marginwidth="0"
 vlink="#363636">
<table width="100%">
<tr>
<td style="background-color: rgb(255, 255, 255);" colspan="2">
<a href="/index.php"><img
 src="/themes/Linuxhispano/images/logo.gif"
 alt="Bienvenido a Linux Hispano" align="left" border="0"></a>
</td>
</tr>
<tr>
<td style="background-color: rgb(255, 102, 0);">
<font color="#ffffff">
<b>
Bienvenido a la tira de Linux Hispano
</b>
</font>
<td style="background-color: rgb(255, 102, 0);">
<font color="#ffffff">
<b>
Esta semana:
" <?php echo $titulo; ?>"<!--titulo-->
</font>
</b>
</td>
</font>
</tr>
</td>
</table>
<div align="center"><br>
<!--imagen--><img src="<?php echo "$img"; ?>.png" alt="<?php echo "$img"; ?>"
style="border: 0px solid ;"><br>
<font color="#0000ff"><strong><a href="http://tira.panreyes.com">Ahora
tambi&eacute;n en Ingl&eacute;s</a><br>
gracias a <a
 href="http://www.linuxhispano.net/modules.php?name=Your_Account&amp;op=userinfo&amp;username=PiXeL">PiXeL</a><br>
<br>
Por lo visto la versi&oacute;n en ingl&eacute;s est&aacute; estancada.
El traductor est&aacute; bastante ocupado.<br>
The english version is stopped.
<p>
<br />
<center><strong>Comenta la tira</strong><br/>
<!--com--><iframe src="com/index.php?db=<?php echo "$img"; ?>.lhcmt"
width="80%" height="400" frameborder="0" border="0" style="border: 1px dotted #000000;"></iframe></center>
<br />
Ahora tambi&eacute;n tenemos la tira en RSS.
<br>
<a href="linuxhispano.xml"><img src="rsslogo.png" alt="rss" border="0"/></a>
</p>
</strong></font><br>
<font color="#0000ff"><strong><br>
</strong></font></div>
<p><font color="#000099">
<font color="#ffffff"><strong><font color="#ff0000">Para enlazar esta
tira igual que la tenemos en nuestra p&aacute;gina deber&aacute;s
copiar el siguiente
c&oacute;digo en tu web:</font></strong></font></font></p>
<form name="form1" method="post" action="">
  <center><textarea name="textarea" cols="52" rows="6">&lt;a
href="http://www.linuxhispano.net/tira/tira.html" target="_blank"&gt;
&lt;img src="http://www.linuxhispano.net/tira/vinieta.png" alt="Tira
Linux Hispano" border="0" width="127"
height="130"&gt;&lt;/a&gt;&lt;br&gt;Tira LH&lt;br&gt; </textarea> </center>
</form>
<div><font color="#000099">Si usas phpnuke
deber&aacute;s ir a la
secci&oacute;n de
administraci&oacute;n/bloques y bajas hacia abajo y ver&aacute;s donde
hay un cuadro
de texto para poner el T&iacute;tulo, ah&iacute; pones Tira
LinuxHispano, y luego en
Contenido pegas el c&oacute;digo que hay arriba. Le das a crear bloque
y ya
tendr&aacute;s nuestra tira en tu web.</font></div>
<p> </p>
<p>
</p>
<center>
<?php
	readfile("pub/archivo.html");
?>

<br>
</center>
<center>
<table
 style="width: 881px; height: 276px; text-align: left; margin-left: auto; margin-right: auto;"
 border="1" cellpadding="2" cellspacing="2">
  <tbody>
    <tr align="center">
      <td colspan="5" rowspan="1" style="vertical-align: top; background-color: rgb(255, 102, 0);">
      <h3 style="background-color: rgb(255, 102, 0);"><span
 style="color: rgb(255, 255, 255); font-weight: bold;">Otras Tiras</span></h3>
      </td>
    </tr>
    <tr>
      <td
 style="vertical-align: top; text-align: center; background-color: rgb(255, 255, 255);"><a
 href="http://mirror1.escomposlinux.org/tira"><img
 alt="tira escomposlinux"
 src="http://tira.escomposlinux.org/icono-mini.png"
 style="border: 0px solid ; width: 163px; height: 172px;"></a><br>
      </td>
      <td
 style="vertical-align: top; text-align: center; background-color: rgb(255, 255, 255);"><a
 href="http://recurrente.afraid.org/myblog/?q=ultima"><img
 alt="tira recurrente"
 src="http://recurrente.afraid.org/myblog/tira/minitira.png"
 style="border: 0px solid ; width: 166px; height: 171px;"></a><br>
      </td>
      <td
 style="vertical-align: top; text-align: center; background-color: rgb(255, 255, 255);"><a
 href="http://tira.emezeta.com/"><img alt="bit &amp; byte"
 src="http://tira.emezeta.com/tiras/tiramin.png"
 style="border: 0px solid ; width: 166px; height: 172px;"></a><br>
      </td>
      <td
 style="vertical-align: top; text-align: center; background-color: rgb(255, 255, 255);"><a
 href="http://penti-atlo.blogspot.com/"><img alt="penti &amp; atlo"
 src="http://www.geocities.com/forodejazz/ultima_mini.png"
 style="border: 0px solid ; width: 165px; height: 166px;"></a><br>
      </td>
	<td
 style="vertical-align: top; text-align: center; background-color: rgb(255, 255, 255);"><a
 href="http://shock.hamsterdoris.com/tira"><img alt="Lika y Neord"
 src="http://shock.hamsterdoris.com/tira/mini.png"
 style="border: 0px solid ; width: 165px; height: 166px;"></a><br>
      </td>

    </tr>
    <tr>
      <td
 style="vertical-align: top; color: rgb(255, 255, 255); text-align: center; background-color: rgb(255, 102, 0);">la
tira ecol, que me
sirvi&oacute; de inspiraci&oacute;n</td>
      <td
 style="vertical-align: top; color: rgb(255, 255, 255); text-align: center; background-color: rgb(255, 102, 0);">tira
bastante friki</td>
      <td
 style="vertical-align: top; color: rgb(255, 255, 255); text-align: center; background-color: rgb(255, 102, 0);">dos
personajes bastante
peculiares</td>
      <td
 style="vertical-align: top; color: rgb(255, 255, 255); text-align: center; background-color: rgb(255, 102, 0);">tira
sobre dos ordenadores, un
pentium y un athlon</td>
	<td
 style="vertical-align: top; color: rgb(255, 255, 255); text-align: center; background-color: rgb(255, 102, 0);">Lika es maquera y Neord linuxero, y de vez en cuando surge alg&uacute;n conflicto...
</td>

    </tr>
    <tr align="center">
      <td colspan="3" rowspan="1"
 style="vertical-align: top; background-color: rgb(255, 153, 0);"><span
 style="font-weight: bold; color: rgb(255, 255, 255);"><a
 title="dibulog" href="http://danigm.blogspot.com">blog de danigm</a></span><br>
      </td>
      <td rowspan="1" colspan="2"
 style="vertical-align: top; color: rgb(0, 0, 255); background-color: rgb(255, 153, 0);">mis
dem&aacute;s ideas y tonterias que no est&aacute;n relacionadas con la
inform&aacute;tica, est&aacute;n dibujadas aqu&iacute;.<br>
      </td>
    </tr>
  </tbody>
</table>
</center>
<p><font color="#000099"><br>
</font></p>
<p><font color="#000099">Si hay un * en el
5&ordm; Martes significa que
ese mes solo tiene 4 Martes.<br>
Si hay un -- en algun Martes significa que ese martes no se ha
publicado tira.<br>
Si hay varios enlaces en un mismo Martes significa que ese martes se
han publicado mas de una tira, por algun motivo, el especial llevara
asteriscos. ejemplo **foo**.</font></p>
<p><font color="#000099">Esta tira es
totalmente libre, se puede
copiar, distribuir y publicar sin permiso de nadie, aunque se
agradeceria que se pusiera la procedencia de la tira asi como sus
autores. La venta de esta tira se considera totalmente legal tanto en
formato digital como en papel escrito (se agradeceria una notificacion
al autor). Para cualquier interesado, se pueden conseguir los .svg,
para ello hay que ponerse en contacto con el autor: danigm en gmail.<br>
Esta creada totalmente con software libre, <a
 href="http://www.inkscape.org">inkscape</a> (dibujo vectorial) para
dibujar a los personajes y todo lo demas, y retocado con <a
 href="http://www.gimp.org">gimp-2.2</a>.</font></p>
<p><font color="#000099">
Guion original equipo de Linux Hispano, dibujos por parte de <a
 href="mailto:danigm@linuxhispano.net">danigm</a>.<br>
Se aceptan guiones, y sugerencias en el <a
 href="http://www.linuxhispano.net/modules.php?name=Forums&amp;file=viewforum&amp;f=15">foro</a></font></p>

</body>
</html>
