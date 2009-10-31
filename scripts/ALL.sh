#!/bin/bash

./imagen.sh ../$1.png
scp ../vinieta.png ../$1.png root@danigm.net:/var/www/tira/

pub="ftp://linuxhispano.net/public_html/tira/"
USER="linuxhis"
#read -s -p "linuxhis - Password:" PASS
#lftp -u $USER,$PASS $pub -e "put ../vinieta.png ../$1.png; exit"

cat wordpress.html | sed "s/IMG/$1/g"

echo "$1.png" >> ../lista.txt

