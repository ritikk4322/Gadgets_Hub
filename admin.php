<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'gadget');
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $password=$_POST['password'];

    $s="select * from admin where name='$name' && password='$password'";
    $result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['name']=$name;
        header('location:adminpage.php');
    }
    else{
        echo"<script>aleart('Invalid Name or Password')</script>";
        hearder("refresh:0,url='index.html");
    }
}
