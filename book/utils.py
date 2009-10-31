from __future__ import print_function
from datetime import datetime
from datetime import timedelta
from string import Template
import locale
import os
import sys
locale.setlocale(locale.LC_ALL, 'es_ES.UTF-8')

template = """

$title ($date)
$underline
.. image:: ../$image
    :align: center

"""

template = Template(template)


def all_tuesday(firstdate):
    while firstdate.weekday() != 1:
        firstdate += timedelta(1)

    today = datetime.now()
    all = []
    while firstdate < today:
        all.append(firstdate)
        firstdate += timedelta(7)

    return all

def get_all():
    first = datetime(2004, 9, 21)
    all = all_tuesday(first)

    tiras = open('../lista.txt').readlines()
    tiras = [x.strip() for x in tiras]
    all = [x.strftime("%d de %B de %Y") for x in all]
    tiras_dates = zip(tiras, all)
    return tiras_dates

def generate():
    for t, d in get_all():
        s = {'title': t.title(),
             'date': d,
             'underline': '='*(len(t)+len(d)+3),
             'image': t}
        print(template.substitute(s))

def generate_files(force=False):
    for i, (t, d) in enumerate(get_all()):
        s = {'title': t.title(),
             'date': d,
             'underline': '='*(len(t)+len(d)+3),
             'image': '../'+t}
        filename = 'all/%04d-%s.rst' % (i, t[0:-4])
        if force or not os.path.exists(filename):
            f = open(filename, 'w')
            f.write(template.substitute(s))
            f.close()
            print("fichero %s generado" % filename)
        else:
            print("el fichero %s ya existe, no se sobreescribe" % filename)

def main():
    for t, d in get_all():
        print(t, d)

if __name__ == '__main__':
    args = sys.argv[1:]
    force = False
    if '--force' in args or '-f' in args:
        force = True

    generate_files(force=force)
