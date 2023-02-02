<?php
$servername = "localhost";
$username = "root";
$password = "toor";

// Create connection
$connection = mysqli_connect($servername, $username, $password);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


// mysqli_close($connection);

echo "Hurray! Connected Successfully";


// $sql = "CREATE DATABASE IF NOT EXISTS produce";
// $result = mysqli_query($connection,$sql) or die("Query Failed");

$db_selected = mysqli_select_db($connection,"login");

if (!$db_selected)
  {
  die ("Can\'t use test_db : " . mysql_error());
  }


// else{
//   echo "DB selected";
// }

// $sql = "CREATE TABLE fruit (name VARCHAR(20),number VARCHAR(20))";
// $result = mysqli_query($connection , $sql) or die("Query Failed");
//
//     if ($result) {
//         echo "Table Fruits is created successfully";
//         echo " ";
//     } else {
//         echo "Error creating table: " . mysqli_error($connection);
//     }
//
//
//
// $sql = "INSERT INTO registered VALUES ('Arun','Anshu', 'arunanshug2002@gmail.com', '1234')";
// //
// if (mysqli_query($connection, $sql)) {
//     echo "New record created successfully"."\n";
//     echo " ";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($connection);
// }
//
// $sql = "INSERT INTO fruit (name, number) VALUES ('oranges','3329')";
//
// if (mysqli_query($connection, $sql)) {
//     echo "New record created successfully"."\n";
//     echo " ";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($connection);
// }
//
// $sql = "INSERT INTO fruit (name, number) VALUES ('bananas','8582')";
//
// if (mysqli_query($connection, $sql)) {
//     echo "New record created successfully"."\n";
//     echo " ";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($connection);
// }
//
// $sql = "INSERT INTO fruit (name, number) VALUES ('pears','235')";
//
// if (mysqli_query($connection, $sql)) {
//     echo "New record created successfully"."\n";
//     echo " ";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($connection);
// }
//
// $query = "SELECT * FROM registered";
// $result = mysqli_query($connection,$query) or die("Query Failed");

// $row = mysqli_fetch_array($result);
// echo $row[0];

// echo "<table border='1'>";
// echo "<tr>";
// echo "<th> FirstName </th><th> LastName </th><th> EmailAddress </th><th> Password </th>";
// echo "</tr>";
//
// while ($row = mysqli_fetch_array($result)){
//     echo "<tr>";
//     echo "<td>",$row['fName'], "</td> <td>" ,$row['lName'], "</td> <td>", $row['email'], "</td> <td>", $row['pwd'], "</td>";
//     echo "</tr>";
// }
// echo "</table>";
//
//
//
//
// --------------- UPDATING DATABASE -----------------------
//
//
// $connection = mysqli_connect($servername, $username, $password);
//
// // Check connection
// if (!$connection) {
//     die("Connection failed: " . mysqli_connect_error());
// }
//
// $db_selected = mysqli_select_db($connection,"produce");
//
// if (!$db_selected)
//   {
//   die ("Can\'t use test_db : " . mysql_error());
//   }
//
  // $query = "UPDATE fruit SET number = 234 where name = 'pears'";
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $query = "SELECT pwd from registered WHERE email = '" . $email . "';";
    // $query = "INSERT INTO registered VALUES('" . $fName . "', '" . $lName . "', '" . $email . "', '" . $pwd . "')";
    $result = mysqli_query($connection,$query) or die("Query Failed");
    $row = mysqli_fetch_array($result);
    if ($row[0] == $pwd){
      // echo "Validated";
      header("Location: first_page.html");
    }
    else{
      // echo "Register yourself first";
      header("Location: failure.html");
    }
  }
  // $sql = "INSERT INTO registered VALUES('Arun', 'Anshu', 'arunanshug2002@gmail.com', '1234')"
//
//
//   $query = "SELECT * FROM fruit";
//   $result = mysqli_query($connection,$query) or die("Query Failed : ".mmysqli_error());
//
// echo "<table border='1'>";
// echo "<tr>";
// echo "<th> Name </th><th> Number </th>";
// echo "</tr>";
//
// while ($row = mysqli_fetch_array($result)){
//     echo "<tr>";
//     echo "<td>",$row['name'], "</td> <td>" ,$row['number'], "</td>";
//     echo "</tr>";
// }
//
// echo "</table>";


?>
