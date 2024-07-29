
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>gadgets home</title>

</head>

<body>
        <div class="container">
            <nav class="navbar">
                <div class="logo"><img src="logo.png" alt="">
                <p>Admin Panel</p>

                <form class="d-flex" id="search" method="POST" action="adminsearch.php">
          <input class="form-control me-2" type="text" name="search_data" id="search_data" placeholder="Search" aria-label="Search">
          <button type="text" class="btn btn-outline-success" type="submit">Search</button>
        </form>
                <a href="index.html">Log Out</a>
                </div>
            </nav>
        </div>
        <div class="section">
            <div class="sidebar">
                <ul>
                    <li><a href="#addcustmor" onclick="opendetails()">Add Custmor Details</a></li>
                    <li><a href="#alluserdetails" onclick="opencustmor()">Custmor Details</a></li>
                    <li><a href="#addproduct" onclick="openproduct()">Add Product</a></li>
                    <li><a href="#allproductdetails"onclick="openproductdetails()">Product Details</a></li>
                </ul>
            </div>
            <div class="con">
                <!-- Add custmor Details -->
            <div class="content" id="addcustmor">
                <img src="svg/cross.svg" onclick="closedetails()">
                <form action="custmor.php" method="POST">
                    <input type="text" name="name" placeholder="Enter your username">
                    <input type="text" name="number" placeholder="Enter your phone number" minlength="10" maxlength="10">
                    <!-- <input type="text" name="product" placeholder="Product Details"> -->
                    <select name="product" id="product">
                        <?php
                        // Connect to your database
                        $con = mysqli_connect('localhost', 'root', '', 'gadget');

                        // Check connection
                        if (!$con) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Fetch products from the database
                        $query = "SELECT id, productname FROM product";
                        $result = mysqli_query($con, $query);

                        // Check if any products are available
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['productname'] . '</option>';
                            }
                        } else {
                            echo '<option value="" disabled>No products available</option>';
                        }

                        // Close the database connection
                        mysqli_close($con);
                        ?>
                    </select>
                    
                    
                    <input type="number" name="quantity" placeholder="Product Quantity">
                    
                    <div class="payment">
                    <h3>Payment Method</h3>
                        <div class="method">
                        <input type="radio" id="offline" name="payment" value="Cash ">
                        <label for="offline">Cash</label>
                        <input type="radio" id="online" name="payment" value="Online Mode">
                        <label for="online">Online</label>  
                        </div>    
                    </div>
                    
                    <button type="submit">Add </button>
                </form>
                </div>
<!--- --------------------------check custmor details ------------------------------------------->
                <div class="userdetails" id="alluserdetails">
                <img src="svg/cross.svg" onclick="closecustmor()">
                <?php
                    $con = mysqli_connect('localhost', 'root', '', 'gadget');
                    /* if($con){
                        echo "connected";
                    } */
                    $query = "SELECT * FROM custmor_db";
                    $run = mysqli_query($con, $query);
                    ?>
                    <table>
                        <caption><h1>All User Details</h1></caption>
                        <tr>
                            
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Amount</th>
                            <!-- <th>Payment Method</th> -->
                            <th>Receipt</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM custmor_db";
                        $run = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($run)) {
                            $id = $row['id'];
                        ?>
                            <tr>
                                
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['number']; ?></td>
                                <td><?php echo $row['product']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['payment']; ?></td>
                                <td><button ><a href="index.php?action=download&id=<?php echo $row['id'];?>">Download Receipt</a></button></td>
                    
                                <td>
                                    <a href="edit_or_delete.php?action=edit&id=<?php echo $id; ?>">Edit</a>
                                    |
                                    <form method="POST" action="">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        <?php } ?>
                    </table>
                </div>
<!-- ----------------------------------------Add product------------------------------------ -->
                <div class="addproduct" id="addproduct">
                <img src="svg/cross.svg" onclick="closeproduct()">
                <form action="product.php" method="POST">
                    <input type="text" name="productname" placeholder="Enter your product name">
                    <input type="text" name="discription" placeholder="Enter your product discription">
                    <input type="file" name="image" placeholder="Product Image">
                    <input type="number" name="price" placeholder="Product Price">
                    <input type="text" name="available" placeholder="Available Product">
                    <button type="submit">Add </button>
                </form>
                </div>
<!------------------------------------ All Product Details ---------------------------------->
<div class="productdetails" id="allproductdetails">
                <img src="svg/cross.svg" onclick="closeproductdetails()">
                <?php
               $con=mysqli_connect('localhost','root','','gadget');
          /*   if($con){
             echo "connected";
              } */
                   $query="SELECT * FROM product";
                   $run=mysqli_query($con,$query);
                  ?>  
                 <!-- <table> -->
                       <h1>All Product Details</h1>
                  <?php
                  $query="SELECT * FROM product";
                   $run=mysqli_query($con,$query);
                   while($row=mysqli_fetch_array($run)){
                      	$id=$row['id'];
                   ?>

                <div class="card-outer">
                <div class="card">
                  <img id="card-img" src="<?php echo $row['image']; ?>" >
                  <div class="order">
                           <h4><?php echo $row['id']; ?><br><?php echo $row['productname']; ?><br> <span><?php echo 
                             $row['price']; ?>/-</span></h4>
                         <!-- <button class="btn">Add To Cart</button> -->
                 </div> 
            </div>
                    <div class="card-inner">
                      <h1>Description</h1>
                       <p><?php  echo $row['discription']; ?></P>
        



                         <form method="POST" action="delete.php">
                         <input type="hidden" name="action" value="delete">
                           <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <button type="submit" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>.
                       <div class="mainbox">
                            <p>Total Product</p>
                            <div class="tablebox">
                                <?php echo $row['available']; ?>
                            </div>

                            <p>Sold Product</p>
                            <div class="tbox">
                                <span><?php echo $row['sold']; ?></span>
                            </div>
  
                        </div>
                          
                          
                        </form>
                        
                    </div>
                </div>
                <?php } ?>
                <!-- </table> -->
            </div>
            </div>
        </div>
    </div>
    
</div>




        <script src="js/admin.js">

</script>
</body>

</html>

<?php
// Handle the delete action on the same page
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $deleteId = $_POST['id'];

        // Perform the delete operation in the database
        $deleteQuery = "DELETE FROM custmor_db WHERE id = '$deleteId'";
        mysqli_query($con, $deleteQuery);
        exit();
        
    }
}
?>
<?php

