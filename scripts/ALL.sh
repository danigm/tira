#!/bin/bash

./imagen.sh ../$1.png
scp ../vinieta.png ovh:www/tira/
scp ../vinieta.png ovh:www/blog/

# ./ftp.sh ../$1.png
./ftp.sh ../vinieta.png

cat wordpress.html | sed "s/IMG/$1/g"

echo "$1.png" >> ../lista.txt

