#!/usr/bin/perl
#modifica mi fichero xml del rss de la tira, annadiendo un elemento de titulo argv0 e imagne argv1.png
#y borrando la ultima linea

$titulo=$ARGV[0];
$imagen=$ARGV[1];

$/="\n\n";
$cont=0;
open(IN,"linuxhispano.xml");
open(OUT,">linuxhispano2.xml");
while(<IN>){
	print $cont++; print "\n";
}

close(IN);
open(IN,"linuxhispano.xml");
while(<IN>){
	if($cont>2){
		print OUT $_ if not /<\/rss>/g;
		print OUT "\t<item><title>$titulo</title><link>http://www.linuxhispano.net/tira/tira.php?tira=$imagen&db=$imagen.lhcmt</link><description><img src=\"http://www.linuxhispano.net/tira/$imagen.png\">$titulo</img></description></item>\n\n" if /<\/language>/;
		$cont--;
	}
}

print OUT "</channel></rss>\n";
close(IN);
close(OUT);
