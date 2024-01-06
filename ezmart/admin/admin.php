<?php
session_start();
if (!isset($_SESSION['emails'])&&$_SESSION['login']==!TRUE) {
    header("location: admin_login.php");
    exit;
}


include '../utilities/_dbconnection.php';
$update=FALSE;
$delete=FALSE;
if (isset($_GET['srdelete'])) {
    $srdelete=$_GET['srdelete'];
    // echo $srdelete;
   $sql="DELETE FROM `products` WHERE `product_id` = '$srdelete'";
   $result=mysqli_query($conn,$sql);
  
//    echo '<script>
//         window.location.href = "admin.php?'.$delete=TRUE.";
//       </script>';


}

if (isset($_POST['submitted'])) {
    $product_name=$_POST['product_name'];
    $product_description=$_POST['product_description'];
    $product_price=$_POST['product_price'];
    $product_category=$_POST['product_category'];
    $image_name=$_FILES['product_image']['name'];
    $image_tmp=$_FILES['product_image']['tmp_name'];
    $image_destination="product_images/".$image_name;
    move_uploaded_file($image_tmp,"product_images/".$image_name);
    // echo "<pre>";
    // print_r($product_image);
    // exit;

    $sql="INSERT INTO `products` (`product_image`,`product_name`,`product_description`,`price`,`foreign_category_name`)
    VALUES('$image_destination','$product_name','$product_description','$product_price','$product_category')";
    $result=mysqli_query($conn,$sql);
}
    if (isset($_POST['sredit'])) {

        if (empty($_POST['product_image'])) {
            $product_id=$_POST['sredit'];
            $pname=$_POST['product_name'];
            $pdescription=$_POST['product_description'];
            $pprice=$_POST['product_price'];
            $pcategory=$_POST['product_category'];
            // $pimage_name=$_FILES['product_image']['name'];
            // $pimage_tmp=$_FILES['product_image']['tmp_name'];
            // $pimage_destination="product_images/".$pimage_name;
            // move_uploaded_file($pimage_tmp,"product_images/".$pimage_name);
            $sql="UPDATE `products` SET product_name='$pname',product_description='$pdescription',price='$pprice',foreign_category_name='$pcategory' WHERE product_id='$product_id'";
            // exit;
            $result=mysqli_query($conn,$sql);
            $update=TRUE;
        } else {
            $product_id=$_POST['sredit'];
            $pname=$_POST['product_name'];
            $pdescription=$_POST['product_description'];
            $pprice=$_POST['product_price'];
            $pcategory=$_POST['product_category'];
            $pimage_name=$_FILES['product_image']['name'];
            $pimage_tmp=$_FILES['product_image']['tmp_name'];
            $pimage_destination="product_images/".$pimage_name;
            move_uploaded_file($pimage_tmp,"product_images/".$pimage_name);
            $sql="UPDATE `products` SET product_image='$pimage_destination',product_name='$pname',product_description='$pdescription',price='$pprice',foreign_category_name='$pcategory' WHERE product_id='$product_id'";
            // exit;
            $result=mysqli_query($conn,$sql);
            $update=TRUE;
        }
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/75daafee80.js" crossorigin="anonymous"></script>
    <title>Ez Mart | Admin panel </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
        <a class="navbar-brand" href="#">Ez Mart</a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/ezmart/admin/admin.php">Admin Panel<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_orders.php">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="queries.php">Queries</a>
            </li>
        </ul>
        <div class="form-inline">
            <a href="admin_logout.php" class="btn btn-danger">Logout</a> 
        </div>
    </nav>
    <?php
if ($update) {
    echo "Updated!";
}
if ($delete) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Deleted!</strong> Product has been deleted successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
   }
?>



    <div class="modal fade" data-backdrop="static" id="editmodal" tabindex="-1" aria-labelledby="editmodallabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmodallabel">Edit this Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="sredit" id="sredit">
                        <div class="form-group">
                            <label for="title">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name"
                                aria-describedby="emailHelp" Required>
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="2"
                                Required></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="product_price">Product Price</label>
                                <input type="number" maxlength="15" name="product_price" id="product_price"
                                    class="form-control" placeholder="Product Price">
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <div class="custom-file"> -->
                            <input type="file" name="product_image" id="product_image" value="sami">
                            <!-- <label for="product_image" class="custom-file-label">Choose Image</label> -->
                            <!-- </div> -->
                        </div>
                        <img class="rpimage eimage" src='' alt="productimage">
                        <div class="form-group">
                            <h6>Category</h6>
                            <!-- <label for="inputState">Country</label> -->
                            <select id="product_category" class="custom-select" name="product_category">
                                <option disabled selected>Choose Category</option>
                                <option value="Moniters">Moniters</option>
                                <option value="Cpu">Cpu</option>
                                <option value="Ram">Ram</option>
                                <option value="Gpu">Gpu</option>
                                <option value="Keyboard">Keyboard</option>
                                <option value="Mouse">Mouse</option>
                                <option value="Headset">Headset</option>
                                <option value="Speakers">Speakers</option>
                                <option value="Computercase">Computer Case</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" data-backdrop="static" id="deletemodal" tabindex="-1" aria-labelledby="deletemodallabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletemodallabel">Delete this Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="GET">
                    <div class="modal-body">
                        <input type="hidden" name="srdelete" id="srdelete">
                        <h5>Are you sure to delete this Product?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <h2 class="text-center my-4">Add Product </h2>
    <div class="container product-panel p-5">
        <form action="" method="POST" enctype="multipart/form-data">

            <!-- Username -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <!-- <label for="inputfirstname">Username</label> -->
                    <input type="text"  name="product_name" id="inputproduct_name" class="form-control"
                        placeholder="Product Name">
                </div>
            </div>

            <div class="form-group">
                <textarea class="form-control" name="product_description" id="inputproduct_description" cols="30"
                    rows="3" placeholder="Product Description"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="number" maxlength="15" name="product_price" id="inputproduct_price" class="form-control"
                        placeholder="Product Price">
                </div>
            </div>


            <div class="form-group">
                <!-- <div class="custom-file"> -->
                <input type="file" name="product_image" id="product_image">
                    <!-- <input type="file" name="product_image" id="" class="custom-file-input"> -->
                    <!-- <label for="" class="custom-file-label">Choose Image</label> -->
                <!-- </div> -->
            </div>
            <!-- Category -->
            <div class="form-row ml-1">
                <div class="form-group">
                    <h6>Category</h6>
                    <!-- <label for="inputState">Country</label> -->
                    <select id="inputState" class="custom-select" name="product_category">
                        <option disabled selected>Choose Category</option>
                        <option value="Moniters">Moniters</option>
                        <option value="Cpu">Cpu</option>
                        <option value="Ram">Ram</option>
                        <option value="Gpu">Gpu</option>
                        <option value="Keyboard">Keyboard</option>
                        <option value="Mouse">Mouse</option>
                        <option value="Headset">Headset</option>
                        <option value="Speakers">Speakers</option>
                        <option value="Computercase">Computer Case</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success" name="submitted">Add Product</button>
        </form>
    </div>
    <div class="container mt-5">

        <table id="myTable" class="table table-responsive table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sr.#</th>
                    <th scope="col">Product image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
              $sql2="SELECT * FROM `products`";
              $result2=mysqli_query($conn,$sql2);
              $sno=0;
              while ($row=mysqli_fetch_assoc($result2)) {
                $sno=$sno+1;
                $rpid=$row['product_id'];
                $rpimage=$row['product_image'];
                $rpname=$row['product_name'];
                $rpprice=$row['price'];
                $rpdescription=$row['product_description'];
                $rpcategory=$row['foreign_category_name'];
                echo'
                    <tr>
                      <th scope="row">'.$sno.'</th>
                      <td><img class="rpimage" src='.$rpimage.' alt="pimage"></td>
                      <td>'.$rpname.'</td>
                      <td>'.$rpdescription.'</td>
                      <td>'.$rpprice.'</td>
                      <td>'.$rpcategory.'</td>
                      <td><button class="edit btn btn-warning mb-2" id='.$rpid.'>Edit</button><button class="delete btn btn-danger" id='.$rpid.' name="delete">Delete</button></td>
                    </tr>
                    ';
              }
              ?>
            </tbody>
        </table>
    </div>

    <script src="../js/jquery-3.6.4.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/data_table.js"></script>
    <script src="../js/admin.js"></script>
</body>

</html>