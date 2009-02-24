#!/usr/bin/python
#modifica el fichero rss linuxhispano.xml, borrando la ultima entrada y aniadiendo la nueva.

import sys,os

if len(sys.argv) != 3:
    print "modo de uso:"
    print sys.argv[0], "Titulo", "nombre_imagen"
    sys.exit(0)

filenameR = os.path.join("..", "linuxhispano.xml") #xml actual
filenameW = os.path.join("linuxhispano.xml") #nuevo xml

fileR = open(filenameR, "r")
fileW = open(filenameW, "w")

#nueva entrada en el xml
newline = '<item><title>%(titulo)s</title><link>http://www.linuxhispano.net/tira/com/tira.php?tira=%(imagen)s&amp;db=%(imagen)s.lhcmt</link><description>%(titulo)s</description><content:encoded><![CDATA[<p><img src="http://sugus.eii.us.es/~danigm/tira/%(imagen)s.png" alt="%(imagen)s" /></p>]]></content:encoded></item>\n' %{'titulo':sys.argv[1], 'imagen':sys.argv[2]}

line = fileR.readline()
line2 = None
count = 0
while line:
    if line2 != None and line2[0:10] == "<language>": #se coloca la nueva linea detras de la linea de language
	fileW.write(newline)
	count += 1 #contador para borrar la ultima entrada

    if count != 10:
	fileW.write(line)
    if count:
	count += 1
    line2 = line
    line = fileR.readline()

fileR.close()
fileW.close()
