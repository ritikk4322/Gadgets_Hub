<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gadgets Hub</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container-fluid">

      <div class="logo">
        <div class="setlogo">

        </div>
      </div>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.html">Product</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:black;">
              <li><a class="dropdown-item" href="#">Smart Phone</a></li>
              <li><a class="dropdown-item" href="#">Smart TV</a></li>
              <li><a class="dropdown-item" href="#">Smart Watch</a></li>
              <li><a class="dropdown-item" href="#">Headphone</a></li>
              <li><a class="dropdown-item" href="#">Laptop</a></li>
              <li><a class="dropdown-item" href="#">PC Moniter</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="openbox()">Admin</a>
          </li>
        </ul>
        <form class="d-flex" id="search" method="POST" action="search.php">
          <input class="form-control me-2" type="text" name="search_data" id="search_data" placeholder="Search" aria-label="Search">
          <button type="text" class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
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
                            </div>
                    </div>
                       
                </div>
            </section>
        
<?php


        echo "<hr>";
    }
}
?>
  <!-- navbar -->
  <div class="popup" id="box">
    <img src="svg/cross.svg" onclick="closebox()">
    <h1>Admin Login</h1>
    <form action="admin.php" method="post">
      <input type="text" name="name" placeholder="Enter your username">
      <input type="password" name="password" placeholder="Enter your password">
      <button type="submit">Login</button>
    </form>
  </div>
  <script src="js/new.js">

  </script>
  <section id="footer">
          
    <div class="foot-container">
      <div class="left-foot">
        <div class="set-foot-logo">


        </div>

        <span class="email-text f-p1">Subscribe to our email alert</span>
        <input id="subscriber-email" placeholder="Enter Your Email Address" name="email" class="f-p1">
        <span class="foot-span"><i></i></span>
        
        

        
      </div>

      <div class="right-foot">
        <div class="Shop">
          <p>Shop</p>

          <ul class="foot-list">
            <li><a href="#"> Wireless Earbuds</a></li>
            <li><a href="#">Wired Headphones</a></li>
            <li><a href="#">Home Audio</a></li>
            <li><a href="#">Smart Watch</a></li>
            <li><a href="#">Pendrives</a></li>
          </ul>

        </div>

        <div class="help">
          <p>Help</p>

          <ul class="foot-list">
            <li><a href="#"> Your Order</a></li>
            <li><a href="#">Warranty & Support</a></li>
            <li><a href="#">Return Policy</a></li>
            <li><a href="#">Bulk Order</a></li>
            <li><a href="#">FAQs</a></li>
            <!-- <li><a href="#">Customer Support</a></li> -->
          </ul>
        </div>

        <div class="Company">
          <p>Company</p>
          <ul class="foot-list">
            <li><a href="#">Get in Touch</a></li>
            <li><a href="#">Read our blog</a></li>
            <li><a href="#">Carrer</a></li>
            <li><a href="#">Security</a></li>
            <li><a href="#">Fast delivery</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
