#!/bin/sh

# use like: qrcode http://google.com

DT=$(date +"%Y-%m-%d_%I-%M-%S%P");

FILE_NAME="$1";
QR_CONTENT="$2";

FILE_PATH="/qrs/$FILE_NAME-$DT.png";

qrencode -o ".$FILE_PATH" -s15 -d300 "$QR_CONTENT";
#qrencode -o "$FILE_PATH" -s15 -d300 "$QR_CONTENT";

echo "$FILE_PATH";

#eog "$FILE_PATH";
