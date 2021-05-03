<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "shayenpatel", "jae3ieW3", "shayenpatel");

if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query))
{
  echo "<table border='1'><h1>Users<tr>";

    while ($row = $result->fetch_assoc())
    {
      echo "<tr>" . "<td>" . $row["user_id"] . "</td></tr>";
    }
    echo "</table>";
}

    $result->free();

$mysqli->close();
?>
