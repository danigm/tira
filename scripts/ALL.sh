#!/bin/bash

./imagen.sh ../$1.png
scp ../vinieta.png danigm@danigm.net:www/tira/
scp ../vinieta.png danigm@danigm.net:danigm.net/output/

# ./ftp.sh ../$1.png
./ftp.sh ../vinieta.png

cat wordpress.html | sed "s/IMG/$1/g"

echo "$1.png" >> ../lista.txt

