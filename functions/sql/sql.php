<?php
/**
 * knitial connection to SQL
 */
function sql_connect()
{
    global $mysqli;
    if ($mysqli == null) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = mysqli_connect("localhost:3307", "root", "", "phh-22-10-18");
    }
    return $mysqli;
}
