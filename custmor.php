<?php
$con=mysqli_connect('localhost','root','','gadget');

if(isset($_POST['name'])){
    $name=$_POST['name'];
    $number=$_POST['number'];
    $product=$_POST['product'];
    $quantity=$_POST['quantity'];
    $payment=$_POST['payment'];

    if(empty($name)){
        $er1= "Enter user name";
        header("Location: adminpage.php?er1=$er1");
        exit();
    }
    elseif(empty($number)){
        $er2= "Enter Phone number";
        header("Location: adminpage.php?er2=$er2");
        exit();
    }
    elseif(empty($product)){
        $er3= "Enter Product Name";
        header("Location: adminpage.php?er3=$er3");
        exit();
    }
    elseif(empty($quantity)){
        $er4= "Enter Product Quantity";
        header("Location: adminpage.php?er4=$er4");
        exit();
    }
    elseif(empty($payment)){
        $er5= "Enter Product payment method";
        header("Location: adminpage.php?er5=$er5");
        exit();
    }
        $reg="INSERT INTO custmor_db(name,number,product,quantity,payment) VALUES ('$name','$number','$product','$quantity','$payment')";
        mysqli_query($con,$reg);
        $user = "UPDATE product SET available = available - $quantity, sold = sold + $quantity WHERE id = '$product'";
        mysqli_query($con, $user);

        echo "<script> alert('Added Successful!'); window.location='adminpage.php'</script>";
        // header("Location:adminpage.php");
    }      // exit(); 
      
?>