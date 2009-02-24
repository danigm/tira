#!/usr/bin/perl
#mira el mes y el anno de la ultima tira, y el numero de martes de ese mes.
#y si cabe otra.
$mes=0;
$ano=0;
$puesta=0;
$cabe=0;
@meses=("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
open(IN,"tira.html");
open(OUT,">uno.txt");
#primero miramos el mes y el ano de la ultima puesta
#y si cabe alguna mas ese mes
while(<IN>){
	if (/<p align=\"center\">([\d]*) <!--ano--><\/p>/){
		$ano=$1;
	};
	if (/(.*)<!--mes-->/){
		$num=@meses;
		$i=0;
		while($i < $num){
			if ($meses[$i] eq $1){
				$mes=$i+1;
			};
			$i++;
		}
	};
	$cabe=1 if (/<center>(--)<\/center>/);
}
close(IN);
#se mira cuantos martes tiene el mes
system("cal -m $mes $ano | grep -v [A-z] | cut -c4-5 | wc -w > dias.tmp");
open(D,"dias.tmp");
$dias=<D>;
chomp($dias);
print OUT "$mes\n";
print OUT "$ano\n";
print OUT "$cabe\n";
#print "$dias martes\n";;
close(D);

