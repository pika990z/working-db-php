<?php
// start the session
session_start();

// check if the user is not logged in, then redirect the user to login ldap_control_paged_result
if(!isset($_SESSION['userid']) || $SESSION['userid'] != true){
  header("location: login.php");
}
?>

<!DOCTYPE html>
