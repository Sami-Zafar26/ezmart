<?php
    include '../utilities/_dbconnection.php';
    $email_error=FALSE;
    $password_error=FALSE;

    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="SELECT * FROM `admin` WHERE admin_email='$email'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($result);
        if ($row==1) {
            while ($num=mysqli_fetch_assoc($result)) {
                // $id=$num['id'];
                $username=$num['admin_name'];
                $hashpassword=$num['admin_password'];
                if ($password==$hashpassword) {
                    session_start();
                    $_SESSION['login']=TRUE;
                    $_SESSION['admin_name']=$adminname;
                    // $_SESSION['user_id']=$id;
                    $_SESSION['emails']=$email;
                    header("location: /ezmart/admin/admin.php?adminlogin=TRUE");
                }else{
                    $password_error=TRUE;
                }
            }
        }else {
            $email_error=TRUE;
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
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/75daafee80.js" crossorigin="anonymous"></script>
    <title>Ez Mart | Admin Login</title>
</head>
<body>

    <?php
    if ($email_error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Invalid <b>Email</b>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>';
    }
    if ($password_error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Invalid <b>Password</b>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>';
    }
    ?>

    <h2 class="text-center my-3">Login to Admin Account</h2>
        <div class="container login-background p-5">
            <form action="" method="POST">
                <div class="form-group">
                    <!-- Email -->
                    <input type="email" maxlength="20" class="form-control" name="email" id="inputEmail4"
                        placeholder="Email">
                </div>
                <!-- Password -->
                <div class="form-group">
                    <input type="password" maxlength="15" class="form-control" name="password" id="inputPassword4"
                        placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>

    <script src="../js/jquery-3.6.4.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>