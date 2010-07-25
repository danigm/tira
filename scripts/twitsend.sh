#!/bin/bash

SERVER="http://twitter.com"
SERVER2="http://sweetter.net/api"
SERVICE="/statuses/update.json"

URL=$SERVER$SERVICE
URL2=$SERVER2$SERVICE

USER=fooLH
read -s -p "twitter/sweetter password: " PASSWD

MSG=$1

#curl -u $USER:$PASSWD -d status="$MSG" $URL
curl -u $USER:$PASSWD -d status="$MSG" $URL2
