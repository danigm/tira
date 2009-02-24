#!/bin/bash
echo "creando el html"
./uno.pl
./dos.pl
./tres.pl $1 $2
echo "html creado tira3.html"
echo " "
echo "creando el xml"
./xml.pl $1 $2
echo "xml creado linuxhispano2.xml"

echo "creando db"
touch $2.lhcmt
chmod 666 $2.lhcmt
echo "creando $2.lhcmt creado."
