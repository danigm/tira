<?php

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

    print("<item>\n");
    print("<title>".$imagen."</title>\n");
    print("<link>http://www.linuxhispano.net/tira/com/tira.php?tira=".$imagen."&amp;db=".$imagen.".lhcmt</link>\n");
    print("<content:encoded>\n");
    print('<![CDATA[<p><img src="http://sugus.eii.us.es/~danigm/tira/'.$imagen.'.png" alt="'.$imagen.'" /></p>');
    print(']]>');

    print("</content:encoded>\n");
    print("</item>\n");

    $j++;
}

print('</channel></rss>');

?>
