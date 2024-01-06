<?php
    include '_dbconnection.php';
    $email_error=FALSE;
    $password_error=FALSE;

    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="SELECT * FROM `users` WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($result);
        if ($row==1) {
            while ($num=mysqli_fetch_assoc($result)) {
                $id=$num['id'];
                $username=$num['username'];
                $hashpassword=$num['password'];
                if (password_verify($password,$hashpassword)) {
                    session_start();
                    $_SESSION['loggedin']=TRUE;
                    $_SESSION['username']=$username;
                    $_SESSION['user_id']=$id;
                    $_SESSION['email']=$email;
                    header("location: /ezmart/index.php?login=TRUE");
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
    <title>Ez Mart | Login</title>
</head>
<body>
    <?php include '_header.php'; ?>
    <?php
    // $value=$_GET['signup'];
    if (isset($_GET['signup'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                   <strong>Success!</strong> Your account has been created Now you have to <b>Login</b>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
             </div>';  
    }else {
        echo "";
    }
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

    <h2 class="text-center my-3">Login to Account</h2>
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