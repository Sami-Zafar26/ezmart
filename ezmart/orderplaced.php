<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/75daafee80.js" crossorigin="anonymous"></script>
    <title>Ez Mart | purchased </title>
</head>

<body>
    <?php include 'utilities/_header.php';?>
    <?php include 'utilities/_dbconnection.php';?>

    <div class="jumbotron">
        <h1 class="display-4">Hello,<?php echo $_SESSION['username'];?>!</h1>
        <p class="lead">Thank you for your purchase! Your order has been successfully placed. We will send you a confirmation email shortly. If you have any questions or need assistance, please don't hesitate to contact our customer support.</p>
        <hr class="my-4">
    </div>
    <div class="container my-4">
    </div>

    <?php include 'utilities/_footer.php'; ?>
    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>