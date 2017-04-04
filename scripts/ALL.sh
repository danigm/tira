#!/bin/bash

./imagen.sh ../$1.png
scp ../vinieta.png danigm@danigm.net:www/tira/

scp ../$1.png lh:/var/www/html/tira/
scp ../vinieta.png lh:/var/www/html/tira/

cat wordpress.html | sed "s/IMG/$1/g"

echo "$1.png" >> ../lista.txt

