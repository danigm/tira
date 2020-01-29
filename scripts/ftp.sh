#!/bin/bash

FTP_DOMAIN=linuxhispano.net
source .ENV

toolbox run -c fedora-toolbox-30 lftp -u $FTP_USER,$FTP_PASS -e "cd tira; put $1; bye" $FTP_DOMAIN
