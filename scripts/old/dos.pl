#!/usr/bin/perl
#annade un nuevo mes en la tabla.
open(U,"uno.txt");
$mes=<U>;
chomp($mes);
$mes2=$mes+1;
$ano=<U>;
chomp($ano);
$puesta=0;
$cabe=<U>;
chomp($cabe);
close(U);
print "$mes $ano $cabe\n";
@meses=("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
system("cal -m $mes2 $ano | grep -v [A-z] | cut -c4-5 | wc -w > dias.tmp");
open(D,"dias.tmp");
$dias=<D>;
chomp($dias);
close(D);
open(IN,"tira.html");
open(OUT,">tira2.html");
#si no cabe, tenemos que annadir un nuevo mes #falla al contar el numero de dias del mes
#y si el mes es diciembre un nuevo ano ##esto todavia no esta
if($cabe == 0){
print "no cabe, nuevo mes!!\n";
while (<IN>){
	if (/<!--ultimo-->/g){
		if ($mes==12){
			print "se acabo el anno\n";
			print OUT "<tr style=\"color: rgb(255, 255, 255); font-weight: bold;\">\n";
			print OUT "<td style=\"background-color: rgb(0, 0, 255);\" colspan=\"6\">\n";
			print OUT "<p align=\"center\">",++$ano," <!--ano--></p>\n";
			print OUT "</td>\n";
			print OUT "</tr>\n";
			$mes=0;
		
		}
		print "$mes mes...\n";
		print OUT "<tr>\n";
		print OUT "<td style=\"background-color: rgb(0, 0, 255); color: rgb(255, 255, 255); font-weight: bold;\">\n";
		print OUT "$meses[$mes]<!--mes-->\n";
		print OUT "</td>\n";
      		print OUT "<td>\n";
		print OUT "<center>--<\/center>\n";
		print OUT "</td>\n";
      		print OUT "<td>\n";
		print OUT "<center>--<\/center>\n";
		print OUT "</td>\n";
      		print OUT "<td>\n";
		print OUT "<center>--<\/center>\n";
		print OUT "</td>\n";
		print OUT "<td>\n";
		print OUT "<center>--<\/center>\n";
		print OUT "</td>\n";
		if ($dias==5) {
			print "mes de 5 martes\n";
			print OUT "<td>\n";
			print OUT "<center>--<\/center>\n";
			print OUT "</td>\n";
      		}else{

			print OUT "<td>\n";
			print OUT "<center>*<\/center>\n";
			print OUT "</td>\n";
		}
		print OUT "<\/tr>\n";
		print OUT "<!--ultimo-->\n";
	}else{
		print OUT $_;
	};
}
}
else{
	print "cabe!!\n";
	system("cp tira.html tira2.html");
}
