#!/bin/bash

#$1 titulo $2 imagen{-.ext}
if [ $# -lt 2 ]
then
    echo "sintaxis:"
    echo "$0 titulo imagen{-.ext} [opciones]"
    echo " -r -> recortar la imagen "
    echo " -p -> publicar (subir al ftp) "
    exit 1
fi

RECORTAR=false
PUBLICAR=false
for par in $@; do
    if [ $par == "-r" ]; then
        RECORTAR=true;
    elif [ $par == "-p" ]; then
        PUBLICAR=true;
    fi;
done;

if [ $RECORTAR == true ]
then
    echo "recortando..."
    ./recortar.sh "../$2.png"
fi

echo "comenzando..."

./imagen.sh "../$2.png"
echo ""
echo "Imagen OK"
echo ""
./ultima.py "$1" "$2"
cp ultima.txt ../pub/ultima.txt
echo "$2.png" >> ../pub/lista.txt
echo ""
echo "ultima OK"
echo ""
./arch.py "$1" "$2"
cp archivo2.html ../pub/archivo.html
echo ""
echo "archivo OK"
echo ""

chmod 666 ../com/$2.lhcmt

echo ""
echo "All OK"

if [ $PUBLICAR == true ]
then
    echo "publicando..."
    ./conexionftp.sh "$2" -a
fi
