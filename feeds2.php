<?php

function superReplace($string){
    $com = $string;
    $com = eregi_replace("á", "&aacute;", $com);
    $com = eregi_replace("í", "&iacute;", $com);
    $com = eregi_replace("é", "&eacute;", $com);
    $com = eregi_replace("ó", "&oacute;", $com);
    $com = eregi_replace("ú", "&uacute;", $com);
    $com = eregi_replace("¿", "&iquest;", $com);
    $com = eregi_replace("¡", "&iexcl;", $com);
    $com = eregi_replace("ñ", "&ntilde;", $com);
    $com = eregi_replace("Ñ", "&Ntilde;", $com);
    $com = eregi_replace("Á", "&Aacute;", $com);
    $com = eregi_replace("Í", "&Iacute;", $com);
    $com = eregi_replace("É", "&Eacute;", $com);
    $com = eregi_replace("Ó", "&Oacute;", $com);
    $com = eregi_replace("Ú", "&Uacute;", $com);
    return $com;

}

$lines = file("pub/lista.txt");
$i = 0;
$n = count($lines);

$i = 10;
$j = 1;

print('<?xml version="1.0" encoding="UTF-8"?>
<rss version="0.91" xmlns:content="http://purl.org/rss/1.0/modules/content/">
<channel>
<title>Tira linuxHispano</title>
<link>http://www.linuxhispano.net/tira/tira.html</link>
<description>Tira linuxHispano</description>
<language>es-es</language>');

while($j <= $i){
    $imagen = substr(rtrim($lines[$n - $j]),0,-4);
    $lines2 = file("com/".$imagen.".lhcmt");
    $i2 = 0;
    $n2 = count($lines2);

    print("<item>\n");
    print("<title>".$imagen."</title>\n");
    print("<link>http://www.linuxhispano.net/tira/com/tira.php?tira=".$imagen."&amp;db=".$imagen.".lhcmt</link>\n");
    print("<content:encoded>\n");
    print('<![CDATA[<p><img src="http://sugus.eii.us.es/~danigm/tira/'.$imagen.'.png" alt="'.$imagen.'" /></p>');
    while($i2 <= $n2){
	$com = $lines2[$i2];
	$com = superReplace($com);
	print("<p>".$com."</p>");
	$i2++;
    }
    print(']]>');

    print("</content:encoded>\n");
    print("</item>\n");

    $j++;
}

print('</channel></rss>');

?>
