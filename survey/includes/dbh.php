<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ccc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successsssfully";


// $sql = "INSERT INTO surveyReponses (email, L1Q1, L1Q2, L1Q3, L1Q4) VALUES ('john@example.com', '$l1q1', '$l1q2', '$l1q3', '$l1q4')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }

?> 