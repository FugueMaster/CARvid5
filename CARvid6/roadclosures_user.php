<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
	session_start();
		
	if(!isset($_SESSION))
	{
		header('location:login_user.php');
		exit;
  }
?>

<html lang="en">
 <?php include 'header.inc'?>
<link rel="stylesheet" href="assets/css/display_data.css">
<?php
//assign required variables for db connection link
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ip_schema";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);//connection to database
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM enter_issue E, closure C where E.iid = C.iid";//for displaying of all road closures info for user in webpage
$result = $conn->query($sql);//send query to mysql server

if ($result->num_rows > 0) {
    echo "<h2><u><b>Road Closures</b></u></h2>";
    echo "<table><tr><th>IID</th><th>Time</th><th>Date</th><th>Comment</th><th>Location</th><th>Start Date(yyyy-mm-dd)</th><th>End Date(yyyy-mm-dd)</th></tr>";
    // output data of each row
    /* fetch associative array */
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["iid"]. "</td><td>" . $row["timestamp"]."</td><td>" . $row["r_date"]."</td><td>". $row["comments"]. " </td><td>". $row["location"]."</td><td>" . $row["s_date"]."</td><td>" . $row["e_date"]."</td></tr>";//retrieve attribute data from database into table
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
<?php include 'footer.inc'?>
  </body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

