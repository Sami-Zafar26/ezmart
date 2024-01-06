<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/75daafee80.js" crossorigin="anonymous"></script>
    <title>Ez Mart | My orders</title>
</head>

<body>
    <?php include 'utilities/_header.php';?>
    <?php include 'utilities/_dbconnection.php';?>

    <div class="container my-4">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sr.#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Order Time</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    $customer_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `orders` WHERE customer_id='$customer_id'";
                    $result = mysqli_query($conn, $sql);
                    // $sno = mysqli_num_rows($result);
                    $sno = 0;
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sno++;
                        $product_name = $row['product_name'];
                        $product_price = number_format($row['product_price']);
                        $order_qty = $row['order_qty'];
                        $total_price = number_format($row['total_price']);
                        $order_time = $row['order_time'];
                        $formatted_time = date('d-m-Y h:i:s A', strtotime($order_time));
                        
                        // $display_sno = ($sno == 0) ? 1 : $sno;
                        echo '
                        <tr>
                            <th scope="row">'.$sno.'</th>
                            <td>'.$product_name.'</td>
                            <td>'.$product_price.'</td>
                            <td>'.$order_qty.'</td>
                            <td>'.$total_price.'</td>
                            <td>'.$formatted_time.'</td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>


    <?php include 'utilities/_footer.php'; ?>
    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>