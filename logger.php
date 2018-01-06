<?php

//-----------------------------------------------
//|                                             |
//|           Coded by : Wannes Van Dorpe       |
//|                                             |
//-----------------------------------------------

function writelog($name, $job, $email, $gsm) {

    $file = "log.txt";
    // Get time of request
    if (($time = $_SERVER['REQUEST_TIME']) == '') {
        $time = time();
    }

    // Get IP address
    if (($remote_addr = $_SERVER['REMOTE_ADDR']) == '') {
        $remote_addr = "REMOTE_ADDR_UNKNOWN";
    }

    // Get requested script
    if (($request_uri = $_SERVER['REQUEST_URI']) == '') {
        $request_uri = "REQUEST_URI_UNKNOWN";
    }

    // Format the date and time
    $date = date("Y-m-d H:i:s", $time);

    // Append to the log file
    if ($fd = @fopen($file, "a")) {
        $result = fputcsv($fd, array($date, $remote_addr, $name, $job, $email, $gsm));
        fclose($fd);

    }
    else {
        
    }
}
