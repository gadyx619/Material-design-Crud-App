<?php
 $conn= new mysqli('localhost','root','','crudapp') or die(mysqli_error($conn));

 if(!$conn){
     echo mysqli_error($conn);
 }
?>