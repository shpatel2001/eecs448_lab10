<?php
include( 'CreatePosts.html' );
$Username = $_POST["user"];
$Content = $_POST["content"];
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
      //if user is found, make a post
        if($row["user_id"] == $Username)
        {
          $sql = "INSERT INTO Posts (author_id, content) VALUES ('$Username','$Content')";
          $mysqli->query($sql);
          echo '<script language="javascript">';
          echo 'alert("Post Saved")';
          echo '</script>';
          return true;
        }
    }
    
    echo '<script language="javascript">';
    echo 'alert("Username not found")';
    echo '</script>';
    return false;

}
 
    $result->free();

$mysqli->close();
?>