<?php
session_start();
if (isset($_SESSION['email'])&& $_SESSION==TRUE) {
    $username=$_SESSION['username'];
    $show=TRUE;
}else{
    $show=FALSE;
}
$count=0;
if (isset($_SESSION['cart'])) {
    $count=sizeof($_SESSION['cart']);
}

  echo  '<nav class="navbar navbar-light bg-light navbar-expand-md sticky-top" >
            <a href="/ezmart/index.php" class="navbar-brand"><b>Ez Mart</b></a>
            
            <button class="navbar-toggler" data-toggle="collapse" data-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-lg-between" id="mynavbar">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="/ezmart/index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        Categories</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Option-1</a>
                            <a href="#" class="dropdown-item">Option-2</a>
                            <a href="#" class="dropdown-item">Option-3</a>
                        </div>
                        </li>';
            if (isset($_SESSION['email'])&& $_SESSION['loggedin']==TRUE) {
             echo  '<li class="nav-item"><a href="/ezmart/cart.php" class="nav-link"><i class="fa-solid fa-cart-shopping cart"></i><span class="cart_count">('.$count.')</span></a></li></ul>';
             }else {
             echo  '<li class="nav-item"><a href="/ezmart/utilities/_login.php" class="nav-link"><i class="fa-solid fa-cart-shopping cart"></i><span class="cart_count">('.$count.')</span></a></li></ul>';
                 }

        if(!$show){

        echo  '<div class="form-inline">
                  <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="submit">Search</button>
                  </form>
                  <a href="/ezmart/utilities/_signup.php" class="btn btn-dark mr-2">Signup</a>
                  <a href="/ezmart/utilities/_login.php" class="btn btn-dark">Login</a>
              </div>';
        }        
        if($show){   
        echo   '<div class="form-inline">
                    <form class="form-inline">
                       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle text-dark" data-toggle="dropdown">'.$username.'</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Profile</a>
                            <a href="/ezmart/myorders.php" class="dropdown-item">My Orders</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="/ezmart/utilities/_logout.php" class="dropdown-item text-danger">Logout</a>
                        </div>
                        </li>
                    </ul>
                </div>';
        }
            echo '</div>
        </nav>';
?>