#!/usr/bin/python
#recibe el titulo de la tira y el nombre de la imagen sin png, y escribe el archivo /pub/ultima.txt
#tambien crea el archivo de comentarios
import os, sys

if len(sys.argv) != 3:
    print "modo de uso:"
    print sys.argv[0], "Titulo", "nombre_imagen"
    sys.exit(0)

filename = os.path.join("..","pub","ultima.txt")
filename = os.path.join("ultima.txt")
file = open(filename, "w")
titulo = sys.argv[1]+'\n'
imagen = sys.argv[2]+'\n'
file.writelines((titulo, imagen))
file.close()

print "ultima.txt echo"

filename = os.path.join("..","com",sys.argv[2] + ".lhcmt")
file = open(filename, "w")
file.close()
os.chmod(filename, 0666)
