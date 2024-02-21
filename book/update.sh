#!/bin/bash

source ../scripts/.ENV
HOME_DOMAIN=ftp.cluster029.hosting.ovh.net

make all-tiras
make html

last=$(ls all/ | tail -1 | sed 's/.rst//')
last_img=$(echo $last | sed 's/[0-9]\+-//').png
prev=$(ls all/ | tail -2 | head -1 | sed 's/.rst//')

lftp -e "put -O www/tira/all _build/html/all/$last.html" -u $HOME_FTP_USER,$HOME_FTP_PASS $HOME_DOMAIN
lftp -e "put -O www/tira/_images _build/html/_images/$last_img" -u $HOME_FTP_USER,$HOME_FTP_PASS $HOME_DOMAIN

lftp -e "put -O www/tira/all _build/html/all/$prev.html" -u $HOME_FTP_USER,$HOME_FTP_PASS $HOME_DOMAIN
lftp -e "put -O www/tira _build/html/index.html" -u $HOME_FTP_USER,$HOME_FTP_PASS $HOME_DOMAIN
