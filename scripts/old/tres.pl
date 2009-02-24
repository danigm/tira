#!/usr/bin/perl
#modifica mi la pagina de la tira, annadiendo un elemento de titulo argv0 e imagne argv1.png

$titulo=$ARGV[0];
$imagen=$ARGV[1];
$mes=0;
$ano=0;
$puesta=0;
$cabe=0;
@meses=("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
#annade la tira.
open(IN,"tira2.html");
open(OUT,">tira3.html");
while (<IN>){
	if (/<!--titulo-->/g){
		print OUT "\"$titulo\"<!--titulo-->\n";
	}elsif (/<!--imagen-->/g){
		print OUT "<!--imagen--><img src=\"$imagen.png\" alt=\"$imagen\"\n";
	}elsif (/<!--com-->/g){
		print OUT "<!--com--><iframe src=\"com/index.php?db=$imagen.lhcmt\"\n";
	}elsif (/<center>(--)<\/center>/ and $puesta==0){
		$puesta=1;
		print OUT "<center><a href=\"com/tira.php?tira=$imagen&db=$imagen.lhcmt\" title=\"$imagen\">$titulo</a></center>";

		#print OUT "<center><a href=\"$imagen.png\" title=\"$imagen\">$titulo<\/a><\/center>\n";
		print "puesta\n";
	}else {
		print OUT $_;
	}
	
#	print "$1\n" if /<center>(--)<\/center>/;

}
#print "$ano $meses[$mes-1]\n";

close(IN);
close(OUT);
#system("cp -f tira3.xml tira2.xml");
