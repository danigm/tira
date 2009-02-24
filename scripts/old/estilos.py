import re
import sys

archivo = open(sys.argv[1],'r')
salida = open(sys.argv[2],'w')
pe = re.compile('style.*"', re.IGNORECASE)
center = re.compile('</?center>',re.IGNORECASE)
for line in archivo:
	if not pe.search(line):
		salida.write(re.sub(center,'',line))
	else :
		salida.write(re.sub(pe, '', line))
archivo.close()
salida.close()
