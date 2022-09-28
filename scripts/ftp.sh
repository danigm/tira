#!/bin/bash

FTP_DOMAIN=linuxhispano.net
HOME_DOMAIN=ftp.cluster029.hosting.ovh.net
source .ENV

lftp -u $FTP_USER,$FTP_PASS -e "cd tira; put $1; bye" $FTP_DOMAIN
lftp -u $HOME_FTP_USER,$HOME_FTP_PASS -e "cd www/tira; put $1; cd ../blog; put $1; bye" $HOME_DOMAIN
