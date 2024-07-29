<?php
$con=mysqli_connect('localhost','root','','gadget');

if(isset($_POST['productname'])){
    $productname=$_POST['productname'];
    $discription=$_POST['discription'];
    $image=$_POST['image'];
    $price=$_POST['price'];
    $available=$_POST['available'];

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
    }elseif(empty($available)){
        $er5="Enter Available Product";
        header("Location: adminpage.php?er5=$er5");
        exit();
    }
        $reg="INSERT INTO product(productname,discription,image,price,available) VALUES ('$productname','$discription','$image','$price','$available')";

        mysqli_query($con,$reg);
        echo "<script> alert('Added Successful!'); window.location='adminpage.php'</script>";
        // header("Location:adminpage.php");
        // exit(); 
    }
?>