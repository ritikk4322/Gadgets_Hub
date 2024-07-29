
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <title>gadgets home</title>

</head>

<body>
        <div class="container">
            <nav class="navbar">
                <div class="logo"><img src="logo.png" alt="">
                <p>Admin Panel</p>
                
                <form class="d-flex" id="search" method="POST" action="adminsearch.php">
             <input class="form-control me-2" type="text" name="search_data" id="search_data" placeholder="Search" aria- 
               label="Search">
          <button type="text" class="btn btn-outline-success" type="submit">Search</button>
        </form>
                <a href="index.html">Log Out</a>
                </div>
            </nav>
        </div>
        <div class="section">
            <div class="sidebar">
                <ul>
                    <li><a href="adminpage.php" onclick="opendetails()">Add Custmor Details</a></li>
                    <li><a href="adminpage.php" onclick="opencustmor()">Custmor Details</a></li>
                    <li><a href="adminpage.php" onclick="openproduct()">Add Product</a></li>
                    <li><a href="adminpage.php"onclick="openproductdetails()">Product Details</a></li>
                </ul>
            </div>
            
            
            
            
            <div class="con">
             
    
            <?php
$con = mysqli_connect('localhost', 'root', '', 'gadget');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchQuery = mysqli_real_escape_string($con, $_POST['search_data']);

    // Split the search query into an array of words
    $words = explode(" ", $searchQuery);

    // Build the SQL query
    $query = "SELECT * FROM product WHERE ";

    foreach ($words as $index => $word) {
        if ($index > 0) {
            // Add 'AND' between each word
            $query .= " AND ";
        }

        // Append the condition for each word
        $query .= "productname LIKE '%$word%'";
    }

    // Run the query
    $run = mysqli_query($con, $query);

    // Fetch and display the results
    while ($row = mysqli_fetch_assoc($run)) {

?>

     <section class="food">
        <div class="showitem" id="showitem">
            
        <!-- <div class="productdetails" id="allproductdetails"> -->
                       
                    <div class="card-outer">
                        <div class="card">
                        <?php echo "<img src='" . $row['image'] . "' alt='Image'><br>";?>
                            <div class="order">
                            <h4 id="productDetails">
        
                                   <?php echo "" . $row['productname'] . "<br>"; ?>
                                  <?php echo " :" . $row['price'] . "<br>";?>
          
                                <!-- <button class="btn" onclick="openPopup()">Order Now</button> -->
                            </div>
                        </div>
                            <div class="card-inner">
                                 <h1>Description</h1>
                                 <?php echo "" . $row['discription'] . "<br>";?>
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
                            </div>
                    </div>
    
                </div>
    
            </section>
        
<?php


        echo "<hr>";
    }
}
?>

                </div>
</div>
            </section>
        


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