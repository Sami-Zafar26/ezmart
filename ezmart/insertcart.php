<?php
session_start();
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_quantity = $_POST['product_quantity'];
$product_id = $_POST['addtocart'];

if (isset($_SESSION['email']) && $_SESSION['loggedin'] == TRUE) {
    if (isset($_POST['buynow'])) {
        $_SESSION['cart'][] = array(
            "product_name" => $product_name,
            "product_price" => $product_price,
            "product_quantity" => $product_quantity
        );
        header("location: cart.php");
    }

    if (isset($_POST['addtocart'])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $check_product = array_column($_SESSION['cart'], 'product_name');
        if (in_array($product_name, $check_product)) { 
            echo '<script>
                     alert("Product is already added in your cart.");
                     window.location.href = "item.php?product='.$product_id.'";
                  </script>';

        } else {
            $_SESSION['cart'][] = array(
                "product_name" => $product_name,
                "product_price" => $product_price,
                "product_quantity" => $product_quantity
            );
            header("location: item.php?product=".$product_id);
        }
    }

    // remove button
    if (isset($_POST['remove'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_name'] === $_POST['item']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header("location: cart.php");
            }
        }
    }
} else {
    header("location: utilities/_login.php");
}
?>
