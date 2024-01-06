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
    <title>Ez Mart | View product </title>
</head>

<body>

    <?php
        $product_id=$_GET['product'];
        $sql="SELECT * FROM `products` WHERE product_id='$product_id'";
        $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result)) {
            $product_name=$row['product_name'];
            $product_image=$row['product_image'];
            $product_description=$row['product_description'];
            $product_price=$row['price'];
            // $row['product_name'];
        }
    ?>

    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $product_id=$_GET['product'];
        $question_bye=$_POST['id'];
        $question_content=$_POST['question_content'];
        $sql="INSERT INTO `questions`(question_content,foreign_product_id,question_by)
        VALUES('$question_content','$product_id','$question_bye')";
        $result=mysqli_query($conn,$sql);
    }
    
    ?> 

    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="admin/<?php echo $product_image; ?>" alt="" class="img-fluid item-image">
                </div>
                <div class="col-7">
                    <h2 class=" my-0"><?php echo $product_name; ?></h2>
                    <div class="product-info my-2">
                        <small>
                            <img src="images/star.png" alt="" class="img-fluid rating">
                            <img src="images/star.png" alt="" class="img-fluid rating">
                            <img src="images/star.png" alt="" class="img-fluid rating">
                            <img src="images/star.png" alt="" class="img-fluid rating">
                            <img src="images/star.png" alt="" class="img-fluid rating">
                            <a href="#" class="product-text">242 Ratings</a>
                            <p class="d-inline"> | </p>
                            <a href="#" class="product-text">1080 Answered Questions</a>
                            <p>Brand: <a href="#" class="product-text">AMD</a><span> | </span><a href="#"
                                    class="product-text">More products from AMD</a></p>
                        </small>
                        <hr>
                        <h4 class="product-price"><?php echo "Rs.".number_format($product_price); ?></4>
                    </div>
                    <form action="insertcart.php" method="POST">
                        <div class="quantity">
                            <span>Quantity</span>
                            <div class="wrapper">
                                <span class="minus">-</span>
                                <input type="number" name="product_quantity" id="quantity" value="1">
                                <span class="plus">+</span>
                            </div>
                        </div>
                        <input type="hidden" name="product_name" value="<?php echo $product_name ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product_price ?>">
                        <div class="form-row my-3">
                        <button name="buynow" value="<?php echo $product_id ?>" class="btn btn-outline-dark mr-1">Buy Now</button>
                            <button class="btn btn-outline-dark" name="addtocart" value="<?php echo $product_id ?>"  type="submit">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="my-4">
    </div>

    <div class="container-fliud">
        <div class="row">
            <div class="col-md-6">

                <div class="tab">
                    <button class="tablink" data-tab="tab1">Descritpion</button>
                    <button class="tablink" data-tab="tab2">About Seller</button>
                    <button class="tablink" data-tab="tab3">Contact Seller</button>
                </div>
                <div id="tab1" class="tabcontent">
                    <h4>About this Product</h4>
                    <p><?php echo $product_description; ?></p>
                </div>
                <div id="tab2" class="tabcontent">
                    <h4>About Seller</h4>
                    <h6 class="my-2">Emmet Shop</h6>
                    <p>As a seller in e-commerce, I pride myself on offering high-quality products that cater to the unique needs and preferences of my customers. With a wide range of products to choose from, I strive to provide an exceptional shopping experience, ensuring prompt delivery and excellent customer service. By prioritizing customer satisfaction and maintaining a seamless online shopping process, I aim to establish long-lasting relationships and become a trusted destination for all their shopping needs.</p>
                </div>
                <div id="tab3" class="tabcontent">
                    <h4>Contact to Seller</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet dolorum reiciendis, excepturi
                        quos hic porro
                        quis repudiandae fugit esse voluptates, quibusdam in doloribus fuga similique nobis veniam
                        facilis dolor
                        commodi!</p>
                        <!-- <?php
                        if (isset($_POST['query'])) {
                            if (isset($_SESSION['email']) && $_SESSION['loggedin'] == TRUE) {
                            $query_by=$_SESSION['user_id'];
                            $name=$_POST['name'];
                            $email=$_POST['email'];
                            $phone_number=$_POST['phone_number'];
                            $msg=$_POST['msg'];
                            $sqli="INSERT INTO `queries`(`query_by`,`name`,`email`,`phone_number`,`message`)
                            VALUES ('$query_by','$name','$email','$phone_number','$msg')";
                            $resulti=mysqli_query($conn,$sqli);
                            echo '<script>window.location.href="/ezmart/item.php?product='.$product_id.'"</script>';
                            
                        } else {
                            echo '<script>window.location.href="utilities/_login.php"</script>';
                        }
                        }

                        ?>
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="inputname" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" id="inputemail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone_number" class="form-control" id="inputphone" placeholder="Phone  No.">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="msg" id="inputaddress" cols="30" rows="3"
                                placeholder="Address"></textarea>
                        </div>
                        <button type="submit" name="query" class="btn btn-success">Send</button>
                    </form> -->
                </div>
            </div>
            <div class="col-md-6">

                 <?php 
                if(isset($_SESSION['email'])&& $_SESSION['loggedin']==TRUE){
                    $qid=$_SESSION['user_id'];
                  echo '<details>
                            <summary class="font-weight-bold">Post a Comment</summary>
                            <form action="" method="POST">
                                <label for="question_content">Post your Comment</label>
                                <div class="form-group">
                                    <textarea name="question_content" id="question_content" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                                <input type="hidden" name="id" value="'.$qid.'">
                                <button type="submit" class="btn btn-success">Send</button>
                            </form>
                        </details>';
                    }else {
                  echo '<details>
                            <summary class="font-weight-bold">Post a Comment</summary>
                            <p class="lead">Please loggined to post a comment</p>
                        </details>';
                    }
                ?>

                <div class="background-media"> 
                    <?php
                $product_id=$_GET['product'];
                if (isset($_GET['page'])) {
                    $page=$_GET['page'];
                }else {
                    $page=1;
                }
                $limit=4;
                $offset=($page-1)*$limit;
                $sql="SELECT * FROM `questions` WHERE foreign_product_id=$product_id LIMIT $offset,$limit";
                $result=mysqli_query($conn,$sql);
                $no_question=TRUE;
                while ($row=mysqli_fetch_assoc($result)) {
                    $no_question=FALSE;
                    $question_contente=$row['question_content'];
                    $question_by=$row['question_by'];
                    $question_time=$row['question_time'];
                    $sql2="SELECT username FROM `users` WHERE id='$question_by'";
                    $result2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_assoc($result2);
                    $username=$row2['username'];
                 echo  '<div class="media">
                                <img src="images/profile-user.png" class="mr-3 user-image" alt="User-image">
                            <div class="media-body">
                                <h6 class="mt-0 d-inline">'.$username.'</h6><span class="text-muted"> at '.$formatted_time = date('d-m-Y h:i:s A', strtotime($question_time)).'</span>
                                <p>'.$question_contente.'</p>
                            </div>
                        </div>';
                }
                echo '<hr>';
                $sql="SELECT * FROM `questions` WHERE foreign_product_id=$product_id";
                $result3=mysqli_query($conn,$sql);
                $row=mysqli_num_rows($result3);
                if ($row>0) {
                    $total_record=$row;
                    $total_pages=ceil($total_record/$limit);
                    echo '.';
                    echo '<nav aria-label="Page navigation example" class="page-box">
                              <ul class="pagination">';
                        if ($page>1) {
                            echo '<li class="page-item"><a class="page-link" href="/ezmart/item.php?product='.$product_id.'&page='.($page-1).'">Previous</a></li>';
                        }
                    for ($p=1; $p <=$total_pages ; $p++) { 
                        if ($page==$p) {
                            $active="active";
                        }else {
                            $active="";
                        }
                        echo '<li class="page-item '.$active.'"><a class="page-link" href="/ezmart/item.php?product='.$product_id.'&page='.$p.'">'.$p.'</a></li>';
                    }
                        if ($total_pages>$page) {
                             echo '<li class="page-item"><a class="page-link" href="/ezmart/item.php?product='.$product_id.'&page='.($page+1).'">Next</a></li>';
                        }
                        echo '  </ul>
                            </nav>';
                }
                if ($no_question) {
                    echo '<div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h4>No Questions Found</h4>
                                <p class="lead">You are the first person to ask a question on that Product</p>
                            </div>
                         </div>';
                }
                ?>

            </div>
        </div>
    </div>
    </div>
    <?php include 'utilities/_footer.php'; ?>
    <script src="js/script.js"></script>
    <script src="js/jquery-3.6.4.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>