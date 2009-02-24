#!/bin/bash

todo=false;
port=22;

for par in $@; do
    if [ $par == "-a" ]; then
        todo=true;
    fi;
    if [ $par == "-p" ]; then
        port=22;
    fi;
done;

USER="linuxhis"
read -s -p "Password:" PASS
echo ""

img=$1
tira="ftp://linuxhispano.net/public_html/tira/"
pub="ftp://linuxhispano.net/public_html/tira/pub/"
com="ftp://linuxhispano.net/public_html/tira/com/"

lftp -u $USER,$PASS $tira -e "put ../$img.png ../vinieta.png; exit"
if [ $todo == true ]
then
    echo "subiendo todo"
    lftp -u $USER,$PASS $pub -e "put ../pub/ultima.txt ../pub/archivo.html ../pub/lista.txt ../pub/traduccion.txt; chmod 666 traduccion.txt; exit"
    lftp -u $USER,$PASS $com -e "put ../com/$img.lhcmt; chmod 666 $img.lhcmt; exit"
else
    echo "imagenes"
fi
scp -oPort=$port ../$img.png root@danigm.net:/var/www/tira/
scp -oPort=$port ../vinieta.png root@danigm.net:/var/www/tira/
echo "=== TODO SUBIDO ==="
