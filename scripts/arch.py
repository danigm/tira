#!/usr/bin/python
#modifica el archivo.html actual aniadiendole la ultima entrada en la tabla de tiras, y si es necesario un nuevo mes o anio

import sys,os, calendar

def mesanocabe(meses, filenameR):
    print "mes ano cabe"

    fileR = open(filenameR, "r")

    mes, ano = 0, 0
    cabe = 0
    line = fileR.readline()
    line2 = None
    while line:
	if line2 != None and line2[0:10] == "<!--mes-->":
	    mes = line[0:-6].lstrip() #se guarda el mes
        if line2 != None and line2[0:10] == "<!--ano-->":
	   ano = line[0:-6].lstrip() #se guarda el ano
	if line2 != None and line2.lstrip()[0:11] == '<td>--</td>':
	    cabe = 1

	line2 = line
	line = fileR.readline()

    fileR.close()

    mes = meses.index(mes) + 1
    print mes, ano, cabe
    return mes, ano, cabe

def insertar(filenameR, filenameW):
    print "insertar"
    fileR = open(filenameR, "r")
    fileW = open(filenameW, "w")

    newline = '        <td><a href="com/tira.php?tira=%(imagen)s&amp;db=%(imagen)s.lhcmt" title="%(imagen)s">%(titulo)s</a></td>\n' %{'titulo':sys.argv[1], 'imagen':sys.argv[2]}
    puesta = 0
    line = fileR.readline()
    while line:
	if line != None and line.lstrip()[0:11] == '<td>--</td>' and not puesta:
	    fileW.write(newline)
	    puesta = 1

	else: fileW.write(line)
	line = fileR.readline()

    fileR.close()
    fileW.close()

#devuelve -- o * segun el numero de martes del mes
def cal(mes, ano):
    retcal = '*'
    sem = 0
    c = calendar.monthcalendar(int(ano), mes)
    for day in c:
	if day[1] != 0:
	    sem += 1
    print mes, ano, sem
    if sem == 5:
	retcal = '--'
    return retcal

    

#TODO comprobar el numero de semanas del mes
def nocabe(mes, ano, meses, filenameR, filenameW):
    print "nocabe"

    if mes == 12:
	print "nuevo ano", (int(ano) + 1)
	mes = 0
######newline#######
	newline = '      <tr>\n\
        <td class="ano" colspan="6">\n\
<!--ano-->\n\
        %(ano)d</td>\n\
      </tr>\n\
\n\
	<tr>\n\
        <td class="mes">\n\
<!--mes-->\n\
        %(mes)s</td>\n\
\n\
        <td>--</td>\n\
        <td>--</td>\n\
        <td>--</td>\n\
        <td>--</td>\n\
        <td>%(cal)s</td>\n\
\n\
</tr>\n\
\n\
<!--ultimo-->\n' %{'mes': meses[mes], 'ano': int(ano)+1, 'cal': cal(mes+1, ano)}
######newline#######

    else:
######newline#######
	    newline = '<tr>\n\
        <td class="mes">\n\
<!--mes-->\n\
        %(mes)s</td>\n\
\n\
        <td>--</td>\n\
        <td>--</td>\n\
        <td>--</td>\n\
        <td>--</td>\n\
        <td>%(cal)s</td>\n\
\n\
</tr>\n\
\n\
<!--ultimo-->\n' %{'mes': meses[mes], 'cal': cal(mes+1, ano)}
######newline#######

    fileR = open(filenameR, "r")
    fileW = open(filenameW, "w")

    line = fileR.readline()
    while line:
	if line.lstrip()[0:13] == '<!--ultimo-->':
	    fileW.write(newline)
	    print "ultimo", newline

	else: fileW.write(line)
	line = fileR.readline()

    fileR.close()
    fileW.close()

#programa
filenameR = os.path.join("..", "pub","archivo.html")
filenameW = os.path.join("archivo2.html")
filenameW2 = os.path.join("archivo3.html")


if len(sys.argv) != 3:
    print "modo de uso:"
    print sys.argv[0], "Titulo", "nombre_imagen"
    sys.exit(0)

meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre']

mes, ano, cabe = mesanocabe(meses, filenameR)
if cabe:
    insertar(filenameR, filenameW)
else:
    nocabe(mes, ano, meses, filenameR, filenameW2)
    insertar(filenameW2, filenameW)


