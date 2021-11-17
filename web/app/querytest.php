<?php
include("connection.php");
include("sessions.php");

$sql = "select * from users";
$results = $con->query($sql);
if($results->num_rows>0){
  //output data from each ibase_affected_rows
  echo $results;
}else{
  echo "0 results";
}
$con->close();
?>
