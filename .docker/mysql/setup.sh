#!/bin/sh

echo "Creating database $MYSQL_DATABASE"

mysql -u root $MYSQL_DATABASE < /usr/local/bin/setup.sql

