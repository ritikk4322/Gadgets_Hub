<?php
require('vendor/autoload.php');
$con=mysqli_connect('localhost','root','','gadget');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$id = $_GET['id'];
$res = mysqli_query($con, "SELECT custmor_db.*, product.productname AS product_name , product.price AS product_price
                            FROM custmor_db 
                            LEFT JOIN product ON custmor_db.product = product.id 
                            WHERE custmor_db.id='$id'");

if(mysqli_num_rows($res) > 0) {
    $html = '<style>
                background-color:#fff2;
                table,td,tr {
                    border:1px solid black;
                    border-collapse:collapse;
                }
                table {
                    width:100%;
                    higth:80%;
                }
                h1 {
                    text-align:center;
                }
            </style>
            <h1>Receipt</h1>
            <table class="table">';

    while($row = mysqli_fetch_assoc($res)) {
        $html .= '<tr><td>Receipt No.</td><td>'.$row['id'].'</td></tr>
                  <tr><td>Name</td><td>'.$row['name'].'</td></tr>
                  <tr><td>Mobile No. </td><td>'.$row['number'].'</td></tr>
                  <tr><td>Product Name</td><td>'.$row['product_name'].'</td></tr>
                  <tr><td>Product Quantity</td><td>'.$row['quantity'].'</td></tr>
                  <tr><td>Total Price</td><td>'.$row['quantity'] * $row['product_price'] .'</td></tr>
                  <tr><td>Payment Mode </td><td>'.$row['payment'].'</td></tr>';
    }

    $html .= '</table>';
} else {
    $html = "Data not found";
}

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = 'media/'.time().'.pdf';
$mpdf->output($file, 'I');
?>
