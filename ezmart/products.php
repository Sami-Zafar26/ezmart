<?php
include 'utilities/_header.php';
include 'utilities/_dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/75daafee80.js" crossorigin="anonymous"></script>
    <title>Ez Mart | Products </title>
</head>
<body>

<div class="container">
      <div class="row">
<?php
$category_name=$_GET['category'];
$sql="SELECT * FROM `products` WHERE foreign_category_name='$category_name'";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
    $product_id=$row['product_id'];
    $product_image=$row['product_image'];
    $product_name=$row['product_name'];
    $product_description=$row['product_description'];
    $image="admin/".$product_image;
    $product_price=$row['price'];
    echo '
        <div class="col-md-3 my-3">
            <div class="card">
                <a href="item.php?product='.$product_id.'"><img src="'.$image.'" alt="product_image" class="img-fluid category-img"></a>
                <div class="card-body">
                    <h4 class="card-title"><a href="item.php?product='.$product_id.'" class="text-dark">'.$product_name.'</a></h4>
                    <p class="card-text">'.substr($product_description,0,50).'...</p>
                    <a href="item.php?product='.$product_id.'" class="card-link text-dark">Rs.'.number_format($product_price).'</a>
                </div>
            </div>
        </div>';
}
?>
</div>
</div>

      <?php include 'utilities/_footer.php'; ?>
      <script src="js/jquery-3.6.4.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>