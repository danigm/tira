#!/bin/bash
#crea la vinieta y asigna el mapa de colores a la tira
#recibe la tira en png.


#esto recorta la primera vinieta
#convert $1 -crop 224x226+0+4 vinieta.png
convert $1 -crop 227x227+1+1 vinieta.png
#esto rellena las esquinas de blanco
#convert vinieta.png -fill white -fuzz 15% -draw 'color 1,1 replace' vinieta.png
#y esto redimensiona la vinieta y le asigna la profundidad de color
convert vinieta.png -resize 170x171 vinieta.png
#convert vinieta.png -colors 255 -verbose +dither -depth 8 vinieta.png
echo "imagen vinieta.png creada"
cp -f vinieta.png ../vinieta.png

#luego se asigna la profundidad a la imagen principal
#convert $1 -colors 255 -verbose +dither -depth 8 $1
echo "imagen $1 modificada"
