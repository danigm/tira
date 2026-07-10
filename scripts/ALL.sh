#!/bin/bash

set -e

cp ../$1.png $1.png
./imagen.sh $1.png
mv $1.png ../$1.png
# ./ftp.sh ../$1.png
./ftp.sh ../vinieta.png

cat wordpress.html | sed "s/IMG/$1/g" | sed "s/YEAR/$(date +%Y)/g" | sed "s/MONTH/$(date +%m)/g"

echo "$1.png" >> ../lista.txt
