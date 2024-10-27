#!/bin/bash

# set variables
DATADIR="/srv/GameTracker"
SRCDIR="/home/pi/GameTracker"

# update views
sqlite3 $DATADIR/GameTracker.sqlite < $SRCDIR/SQLite3/3.UpdateViews.sql