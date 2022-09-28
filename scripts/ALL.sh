#!/bin/bash

./imagen.sh ../$1.png
# ./ftp.sh ../$1.png
./ftp.sh ../vinieta.png

cat wordpress.html | sed "s/IMG/$1/g"

echo "$1.png" >> ../lista.txt

