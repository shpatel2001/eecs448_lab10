<?php
include( 'CreateUser.html' );
$Username = $_POST["user"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "shayenpatel", "jae3ieW3", "shayenpatel");


if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query))
{

   
    while ($row = $result->fetch_assoc())
    {
        if($row["user_id"] == $Username)
        {
          echo '<script language="javascript">';
          echo 'alert("Username already taken")';
          echo '</script>';
          return false;
        }
    }

    $sql = "INSERT INTO Users (user_id) VALUES ('$Username')";
    $mysqli->query($sql);
    echo '<script language="javascript">';
    echo 'alert("User Added")';
    echo '</script>';
}

    $result->free();

$mysqli->close();
?>