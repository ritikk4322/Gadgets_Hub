<?php
$con=mysqli_connect('localhost','root','','gadget');

if(isset($_POST['productname'])){
    $productname=$_POST['productname'];
    $discription=$_POST['discription'];
    $image=$_POST['image'];
    $price=$_POST['price'];

    if(empty($productname)){
        $er1= "Enter Your Product name";
        header("Location: adminpage.php?er1=$er1");
        exit();
    }
    elseif(empty($discription)){
        $er2= "Enter Product Discription";
        header("Location: adminpage.php?er2=$er2");
        exit();
    }
    elseif(empty($image)){
        $er3= "Enter Image";
        header("Location: adminpage.php?er3=$er3");
        exit();
    }elseif(empty($price)){
        $er4= "Enter Product Price";
        header("Location: adminpage.php?er4=$er4");
        exit();
    }
        $reg="DELETE FROM  product(productname,discription,image,price) VALUES ('$productname','$discription','$image','$price')";

        mysqli_query($con,$reg);
        header("Location:adminpage.php");
        exit(); 
        echo "<script> alert('Added Successful!')</script>";
    }
?>