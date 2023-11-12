<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "datatable";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


function selectall($conn, $column = "*", $table, $where = null)
{
  $res = [];

  if ($where != null) {
    $sql = "SELECT $column FROM $table WHERE $where";
  } else {

    $sql = "SELECT $column FROM $table";
  }
  

  $result = $conn->query($sql);
  

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      array_push($res,$row);
    }
  } else {
    echo "0 results";
  }
  return $res;

}
