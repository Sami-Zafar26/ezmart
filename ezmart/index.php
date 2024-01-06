<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/75daafee80.js" crossorigin="anonymous"></script>
    <title>Ez Mart | Home </title>
</head>
<body>
    <?php include 'utilities/_header.php';?>

    <?php include 'utilities/_dbconnection.php'; ?>
    <div class="banner"></div>

    <?php
    // $value=$_GET['login'];
        if (isset($_GET['login'])) {
            echo '<div class="alert alert-primary alert-dismissible fade show up" role="alert">
                     <strong>Success!</strong> You are Successfully <b>Logined.</b>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }else {
            echo "";
        }
        ?>
        <div class="font">
            <h3 class="banner-font">Welcome to <b>Ez</b><span class="mart">Mart</span></h3>
        </div>

    <section id="about">
        <h4 class="text-center py-3 text-dark heading mt-4">About Us</h4>
        <div class="container about p-4">
            <p class="lead text-justify">Welcome to Ez Mart, your premier destination for top-quality computer components. We offer a wide range of reliable products from leading brands, including processors, graphics cards, motherboards, memory modules, storage drives, and more. With our intuitive interface, finding the right component is a breeze. Enjoy a secure and convenient shopping experience, backed by our knowledgeable customer support team. Build or upgrade your PC with confidence at Ezmart, your trusted source for computer components. Plus, we provide free home delivery, ensuring that your purchases are conveniently shipped directly to your doorstep.</p>
        </div>
    </section>

    <h4 class="text-center py-3 text-dark heading mt-4">Browse Categories</h4>
    <div class="container">
        <div class="row">

    <?php
        $sql="SELECT * FROM `categories`";
        $result=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_assoc($result)) {
        $category_id=$row['category_id'];
        $category_image=$row['category_image'];
        $category_name=$row['category_name'];
            echo '<div class="col-lg-3 col-md-4 col-sm-6 my-3">
                    <div class="card bounce">
                     <a href="products.php?category='.$category_name.'"><img src="'.$category_image.'" alt="category_image" class="card-img-top category-img"></a>
                    <div class="card-body">
                        <h5 class="card-title text-center"><a href="products.php?category='.$category_name.'" class="text-dark">'.$category_name.'</a></h5>
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