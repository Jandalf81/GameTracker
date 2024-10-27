#!/bin/bash

# set variables
DATADIR="/srv/GameTracker"
SRCDIR="/home/pi/GameTracker"

# remove old file
rm $DATADIR/GameTracker.sqlite

# create new file
sqlite3 $DATADIR/GameTracker.sqlite < $SRCDIR/SQLite3/1.CreateDatabase.sql
sqlite3 $DATADIR/GameTracker.sqlite < $SRCDIR/SQLite3/2.InsertData.sql

# set permissions
chmod 777 $DATADIR
chmod 777 $DATADIR/GameTracker.sqlite

# list folder and file
ls $DATADIR/.. -l
ls $DATADIR -l