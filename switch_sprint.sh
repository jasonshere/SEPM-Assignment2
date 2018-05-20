#!/bin/bash

sprint=$1

unlink index.php
unlink web
unlink assets

rm -rf /tmp/sess_*

ln -s $1/web/index.php index.php
ln -s $1/web web
ln -s $1/web/assets assets

setfacl -m u:www:rwx -R ./$1
