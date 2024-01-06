<?php
    include '_dbconnection.php';

    $email_error=FALSE;
    $password_error=FALSE;

    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $date=$_POST['date'];
        $month=$_POST['month'];
        $year=$_POST['year'];
        $gender=$_POST['gender'];
        $city=$_POST['city'];
        $checkbox=$_POST['checkbox'];

        $sql="SELECT * FROM `users` WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($result);
        if ($row>0) {
            $email_error=TRUE;
        }else {
            if ($password==$password) {
                $hash=password_hash($password, PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (username,email,password,date,month,year,gender,city,checkbox)
                VALUES ('$username','$email','$hash','$date','$month','$year','$gender','$city','$checkbox')";
                $result=mysqli_query($conn,$sql);
                echo "<script>window.location='_login.php?signup=TRUE';</script>";
            }else {
                $password_error=TRUE;
            }

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
    <title>Ez Mart | SignUp </title>
</head>

<body>

    <?php include '_header.php'; ?>

    <?php
    if($email_error){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Error!</strong> <b>Email</b> Already in used!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
             </div>';
    }
    if ($password_error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> <b>Password</b> Do not match!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>';
    }
    ?>

    <h2 class="text-center my-4">SignUp for an Account</h2>
    <div class="container signup-background p-5">
        <form action="" method="POST">

            <!-- Username -->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <!-- <label for="inputfirstname">Username</label> -->
                    <input type="text" maxlength="15" name="username" id="inputusername" class="form-control"
                        placeholder="Username" required>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <!-- <label for="inputEmail4">Email</label> -->
                <input type="email" maxlength="20" class="form-control" name="email" id="inputEmail4"
                    placeholder="Email" required>
            </div>

            <!-- Passowrd -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <!-- <label for="inputPassword4">Password</label> -->
                    <input type="password" maxlength="15" class="form-control" name="password" id="inputPassword4"
                        placeholder="Password" required>
                </div>
                <div class="form-group col-md-6">
                    <!-- <label for="inputPassword4">Password</label> -->
                    <input type="password" maxlength="15" class="form-control" name="cpassword" id="inputPassword4"
                        placeholder="Confirm Password" required>
                </div>

            </div>

            <!-- Date -->
            <h6>Date of Birth</h6>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <select name="date" id="" class="form-control">
                        <option disabled selected>Date</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>

                <!-- Month -->
                <div class="form-group col-md-4">
                    <select name="month" id="" class="form-control">
                        <option disabled selected>Month</option>
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                    </select>
                </div>

                <!-- Year -->
                <div class="form-group col-md-4">
                    <select name="year" id="" class="form-control">
                        <option disabled selected>Year</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
            </div>

            <!-- Gender -->
            <!-- <h6>Gender</h6> -->
            <div class="form-row">
                <div class="form-group pl-1">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gender" id="Male" class="custom-control-input" value="male" required>
                        <label for="Male" class="custom-control-label">Male</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="gender" id="Female" class="custom-control-input" value="female"
                            required>
                        <label for="Female" class="custom-control-label">Female</label>
                    </div>
                </div>
            </div>

            <!-- Country -->
            <div class="form-row ml-1">
                <div class="form-group">
                    <h6>City</h6>
                    <!-- <label for="inputState">Country</label> -->
                    <select id="inputState" class="custom-select" name="city">
                        <option disabled selected>Choose Your City</option>
                        <option value="Multan">Multan</option>
                        <option value="Lahore">Lahore</option>
                        <option value="Khanewal">Khanewal</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="Karachi">Karachi</option>
                    </select>
                </div>
            </div>

            <!-- Checkbox -->
            <div class="form-row ml-1">
                <div class="form-group">
                    <div class="custom-checkbox custom-control">
                        <input class="custom-control-input" type="checkbox" id="gridCheck" name="checkbox" value="yes">
                        <label class="custom-control-label" for="gridCheck">
                            I agree with this<a href="#"> Terms&Conditions</a>.
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submitted">Sign Up</button>

        </form>
    </div>

    <script src="../js/jquery-3.6.4.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>