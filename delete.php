<?php
$con = mysqli_connect('localhost', 'root', '', 'gadget');
// Handle the delete action on the same page
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $deleteId = $_POST['id'];

        // Perform the delete operation in the database
        $deleteQuery = "DELETE FROM product WHERE id = '$deleteId'";
        mysqli_query($con, $deleteQuery);
        header('Location: adminpage.php');
        exit();
        
    }
}
?>
<?php

