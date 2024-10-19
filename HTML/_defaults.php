<?php
    try{
        # set current timezone
        date_default_timezone_set("Europe/Berlin");

        $rn = "\r\n";

        # define path to database
        $db = new SQLite3('/srv/GameTracker/GameTracker.sqlite', SQLITE3_OPEN_READWRITE);

        # enable error messages for SQLite errors
        $db->enableExceptions(true);
    } catch (Exception $e) {
        echo 'Caught exception: ' . $e->getMessage();
    }
?>