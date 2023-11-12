<?php
require_once("db_conn.php");
$sel = selectall($conn, "*", "users");

$response = array(
    // "draw" => intval($draw),
    // "iTotalRecords" => $totalRecords,
    // "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $sel
 );

$response = json_encode($response);
echo $response;
?>