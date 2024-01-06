<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/75daafee80.js" crossorigin="anonymous"></script>
    <title>Ez Mart | </title>
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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // session_start();
                    $ptotal=0;
                    $total=0;
                    $qty=0;
                    $sno=0;
                    if (isset($_SESSION['cart'])) {
                        foreach($_SESSION['cart'] as $key=>$value){
                            $sno=$sno+1;
                            $ptotal=$value['product_price']*$value['product_quantity'];
                            $total+=$value['product_price']*$value['product_quantity'];
                            $qty+=$value['product_quantity'];
                            echo'
                            <form action="insertcart.php" method="POST">
                            <tr>
                                <th scope="row">'.$sno.'</th>
                                <td>'.$value['product_name'].'</td>
                                <td>'.number_format($value['product_price']).'</td>
                                <td>'.$value['product_quantity'].'</td>
                                <td>'.number_format($ptotal).'</td>
                                <td><button name="remove" class="btn btn-outline-danger">remove</button></td>
                                <td><input type="hidden" name="item" value="'.$value['product_name'].'" id=""></td>
                            </tr>
                        </form>
                            ';
                    }
                }
                
                $total=number_format($total);
                // $ptotal+=200;
                // $ctotal_format=number_format($ptotal);
                // $ctotal

                    ?>
            </tbody>
        </table>
    </div>

    <?php
    $customer_id=$_SESSION['user_id'];
    if (isset($_POST['placeorder'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $product_name=$value['product_name'];
            $product_price=$value['product_price'];
            $product_quantity=$value['product_quantity'];
            $total_price = $product_quantity*$product_price;
            $sql="INSERT INTO `orders`(product_name,product_price,order_qty,total_price,customer_id)
            VALUES('$product_name',$product_price,'$product_quantity','$total_price','$customer_id')";
            $result=mysqli_query($conn,$sql);
            unset($_SESSION['cart']);
            echo "<script>window.location='/ezmart/orderplaced.php'</script>";
        }
    
    }
    if (isset($_POST['cancel'])) {
        unset($_SESSION['cart']);
        echo "<script>window.location='/ezmart/index.php'</script>";    
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Price Details</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title"><?php echo "Price ($qty items) Rs.$total"?></h5>
                        <h6 class="card-title">Delivery Charges <span class="text-success">Free</span></h6>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulkof the card's content.</p> -->
                    </div>
                    <div class="card-footer bg-transparent ">
                        <p>Amount Payable Rs.<?php echo $total ?></p>
                        <form action="" method="POST">
                        <button name="cancel" class="btn btn-danger mt-2">Cancel</button>
                            <button name="placeorder" class="btn btn-primary mt-2">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'utilities/_footer.php'; ?>
    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        var pprice=document.getElementsByClassName("pprice");
        var pqty=document.getElementsByClassName("pqty");

        function subtotal() {
            for ( i = 0; i < pprice.length; i++) {
                ptotal[i].innnerText=(pprice[i].value)*(pqty[i].value);
                
            }
        }
            </script> -->
</body>

</html>