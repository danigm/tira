#!/bin/bash

FTP_DOMAIN=linuxhispano.net
source .ENV

lftp -u $FTP_USER,$FTP_PASS -e "cd tira; put $1; bye" $FTP_DOMAIN
