<?php
session_start();
include('conn.php');
$id=0;
$name='';
$location='';
$update='false';
if(isset($_POST['save'])){
   $name=$_POST['dname'];
   $loc=$_POST['dlocation'];
        $_SESSION['message']="Record has been Saved!";
        $_SESSION['msg_type']="success";
        header("Location:index.php");
// Crud Insert
$query="INSERT INTO data(dname,dlocation) VALUES('$name','$loc')";
$weka=mysqli_query($conn,$query);
}
// Crud Delete
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$query2="DELETE FROM data where did=$id";
$futa=mysqli_query($conn,$query2);
        $_SESSION['message']="Record has been Deleted!";
        $_SESSION['msg_type']="danger";
        header("Location:index.php");
}

if(isset($_GET['edit'])){
$id=$_GET['edit'];
$update=true;
$query3="SELECT * FROM data WHERE did=$id ";
$ed=mysqli_query($conn,$query3);
$check=mysqli_num_rows($ed);
if($check==1){
        $row = mysqli_fetch_array($ed);
        $name=$row['dname'];
        $location=$row['dlocation'];
}
}
if(isset($_POST['update'])){
        $id=$_POST['id'];
        $name=$_POST['dname'];
        $loca=$_POST['dlocation'];
$query5="UPDATE data SET dname='$name', dlocation='$loca' WHERE did=$id";
$res=mysqli_query($conn,$query5);
$_SESSION['message']="Record has been Update!";
$_SESSION['msg_type']="warning";
header("Location:index.php");
}
?>
