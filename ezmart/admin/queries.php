<?php
// session_start();
// if (!isset($_SESSION['email'])&&$_SESSION['loggedin']==!TRUE) {
//     header("location: admin_login.php");
//     exit;
// }
include '../utilities/_dbconnection.php';
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
    <title>Ez Mart | view orders </title>
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

    <div class="container my-4">
        <table id="myTable" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sr.#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Message</th>
                    <th scope="col">Time</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                // $customer_id=$_SESSION['user_id'];
                $sql="SELECT queries.*, users.username FROM `queries` JOIN `users` ON queries.query_by=users.id";
                $result=mysqli_query($conn,$sql);
                $sno=0;
                while ($row=mysqli_fetch_assoc($result)) {
                    $name=$row['name'];
                    $query_by=$row['query_by'];
                    $email=$row['email'];
                    $phone_number=$row['phone_number'];
                    $message=$row['message'];
                    $time=$row['time'];
                    $user = $row['username'];
                    $formatted_time = date('d-m-Y h:i:s A', strtotime($time));


                    $sno=$sno+1;
                    echo'
                    <tr>
                        <th scope="row">'.$sno.'</th>
                        <td>'.$user.'</td>
                        <td>'.$email.'</td>
                        <td>'.$phone_number.'</td>
                        <td>'.$message.'</td>
                        <td>'.$formatted_time.'</td>
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