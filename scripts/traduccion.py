

import os

def reread(file):
    size = os.stat(file)[6]
    f = open(file)
    all = f.read(size)
    all2 = all.split('@#')
    all3 = []
    for t in all2:
        t = t.replace('\r\n', '\n')
        all3.append(t.split('\n'))

    return all3

def diff(all2, n1, n2=0):
    if n2 == 0: n2 = n1 + 1
    for l1, l2 in zip(all2[n1], all2[n2]):
        if l1 != l2:
            print '-----'
            print str(n1) + ': ' + l1
            print str(n2) + ':' + l2
            print '-----\n'

